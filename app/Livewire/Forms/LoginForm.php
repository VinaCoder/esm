<?php

namespace App\Livewire\Forms;

use App\Domain\Account\Requests\LoginRequest;
use App\Livewire\Contracts\WithFormRequest;
use App\Livewire\Traits\HasFormRequest;
use Illuminate\Validation\ValidationException;
use Livewire\Form;
use Throwable;

class LoginForm extends Form implements WithFormRequest
{
    use HasFormRequest;

    public mixed $login_id;

    public mixed $password;

    public mixed $remember = false;

    public function useFormRequest(): string
    {
        return LoginRequest::class;
    }

    public function authenticate(): void
    {
        try {
            $this->getFormRequest()->authenticate($this->all());
        } catch (ValidationException $validationException) {
            foreach ($validationException->errors() as $key => $messages) {
                foreach ($messages as $message) {
                    throw ValidationException::withMessages([
                        $this->propertyName.'.'.$key => $message,
                    ]);
                }
            }
        } catch (Throwable $throwable) {
            throw $throwable;
        }
    }
}
