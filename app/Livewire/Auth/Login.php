<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Throwable;

class Login extends Component
{
    public LoginForm $form;

    public function render(): Renderable
    {
        return view('livewire.auth.login')->title(__('Đăng nhập'))->layout('components.layouts.base');
    }

    /**
     * @throws Throwable
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectRoute('home', navigate: true);
    }
}
