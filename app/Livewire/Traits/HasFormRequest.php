<?php

namespace App\Livewire\Traits;

use Illuminate\Foundation\Http\FormRequest;

trait HasFormRequest
{
    protected ?FormRequest $formRequest = null;

    protected function rules(): array
    {
        return $this->getMethodOrReturnArray('rules');
    }

    protected function getMethodOrReturnArray(string $method): array
    {
        $formRequestClass = $this->getFormRequest();
        if (! $formRequestClass) {
            return [];
        }

        return method_exists($formRequestClass, $method) ? $formRequestClass->{$method}() : [];
    }

    public function getFormRequest(): ?FormRequest
    {
        if ($this->formRequest) {
            return $this->formRequest;
        }
        $formRequest = $this->useFormRequest();
        if (! $formRequest) {
            return null;
        }

        return $this->formRequest = new $formRequest();
    }

    public function useFormRequest(): string
    {
        return '';
    }

    protected function validationAttributes(): array
    {
        return $this->getMethodOrReturnArray('attributes');
    }

    protected function messages(): array
    {
        return $this->getMethodOrReturnArray('messages');
    }
}
