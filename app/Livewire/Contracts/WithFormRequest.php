<?php

namespace App\Livewire\Contracts;

use Illuminate\Foundation\Http\FormRequest;

interface WithFormRequest
{
    /**
     * @return class-string
     */
    public function useFormRequest(): string;

    public function getFormRequest(): ?FormRequest;
}
