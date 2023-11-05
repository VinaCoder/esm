<?php

use function Livewire\Volt\{state};

?>

<section class="bg-gray-50">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
            <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
            ESM
        </a>
        <div
            class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    {{ __('Đăng nhập vào hệ thống') }}
                </h1>
                <form class="space-y-4 md:space-y-6" wire:submit.prevent="login">
                    <div>
                        <label for="login_id" class="block mb-2 text-sm font-medium text-gray-900">
                            {{ __('Tài khoản') }}
                        </label>
                        <input type="text" id="login_id" wire:model.debounce="form.login_id"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               placeholder="{{ __('Tài khoản hoặc email') }}" required>
                        @error('form.login_id')
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                            {{ __('Mật khẩu') }}
                        </label>
                        <input type="password" name="password" id="password" placeholder="{{ __('Mật khẩu') }}"
                               wire:model.debounce="form.password" required
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        >
                        @error('form.password')
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox"
                                       wire:model.debounce="form.remember"
                                       class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500">
                                    {{ __('Nhớ tài khoản') }}
                                </label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium text-blue-600 hover:underline">
                            {{ __('Quên mật khẩu') }}
                        </a>
                    </div>
                    <button type="submit" wire:loading.class="hidden" wire:target="form"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <span>{{ __('Đăng nhập') }}</span>
                    </button>
                    <button type="submit" disabled wire:loading wire:target="form"
                            class="w-full text-white bg-blue-300 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin"
                             viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB"/>
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor"/>
                        </svg>
                        <span>{{ __('Đang xử lý') }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
