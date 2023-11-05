<?php

namespace App\Domain\Account\Requests;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'login_id' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ];
    }

    public function attributes(): array
    {
        return [
            'login_id' => $this->loginByEmail() ? __('email') : __('tài khoản'),
            'password' => __('mật khẩu'),
        ];
    }

    public function loginByEmail(mixed $data = null): bool
    {
        return Str::isEmail($data ?: $this->get('login_id'));
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws ValidationException
     */
    public function authenticate(array $data = null, mixed $guard = null): void
    {
        $this->ensureIsNotRateLimited();
        $credentials = $this->getCredentials($data);
        $remember = $this->boolean('remember');
        if (! empty($data)) {
            $remember = data_get($data, 'remember', false);
        }

        if (! Auth::guard($guard)->attempt($credentials, $remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'login_id' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), config('auth.max_attempts', 5))) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'login_id' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('login_id').'|'.$this->ip()));
    }

    public function getCredentials(array $data = null): array
    {
        if (! empty($data)) {
            return [
                $this->getColumnLoginId($loginId = data_get($data, 'login_id')) => $loginId,
                'password' => data_get($data, 'password'),
            ];
        }

        return [
            $this->getColumnLoginId() => $this->get('login_id'),
            'password' => $this->get('password'),
        ];
    }

    public function getColumnLoginId(mixed $data = null): string
    {
        return $this->loginByEmail($data) ? 'email' : 'username';
    }
}
