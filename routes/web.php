<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('login', Login::class)->name('login');
});

Route::middleware(['auth'])->group(function () {
    Volt::route('/', 'index')->name('home');
});
