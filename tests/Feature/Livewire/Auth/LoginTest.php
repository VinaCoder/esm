<?php

use App\Livewire\Auth\Login;
use App\Models\User;

use function Pest\Laravel\get;

it('The login page should be displayed', function () {
    get(route('login'))->assertSuccessful()->assertSeeLivewire(Login::class);
    Livewire::test(Login::class)->assertSee(__('Đăng nhập'));
})->group('auth');

it('Required login_id and password', function () {
    // empty
    Livewire::test(Login::class)
        ->set('form', [
            'login_id' => null,
            'password' => null,
        ])->call('login')->assertHasErrors([
            'form.login_id' => ['required'],
            'form.password' => ['required'],
        ]);

    // not defined
    Livewire::test(Login::class)
        ->call('login')->assertHasErrors([
            'form.login_id' => ['required'],
            'form.password' => ['required'],
        ]);
})->group('auth');

it('Login id and password not match', function () {
    $user = User::factory()->create();
    // username
    $actual = Livewire::test(Login::class)
        ->set('form', [
            'login_id' => $user->username,
            'password' => '123',
        ])->call('login');
    $actual->assertSee(__('auth.failed'));

    // email
    $actual = Livewire::test(Login::class)
        ->set('form', [
            'login_id' => $user->email,
            'password' => '123',
        ])->call('login');
    $actual->assertSee(__('auth.failed'));
})->group('auth');

it('Redirect after login', function () {
    $user = User::factory()->create();
    // username
    $actual = Livewire::test(Login::class)
        ->set('form', [
            'login_id' => $user->username,
            'password' => 'password',
        ])->call('login');
    $actual->assertRedirect(route('home'));

    // email
    $actual = Livewire::test(Login::class)
        ->set('form', [
            'login_id' => $user->email,
            'password' => 'password',
        ])->call('login');
    $actual->assertRedirect(route('home'));
})->group('auth');
