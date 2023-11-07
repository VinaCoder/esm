<div class="bg-gradient-to-r from-rose-100 to-teal-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">
    <div class="h-screen w-screen flex justify-center items-center">
        <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
            <div class="card overflow-hidden sm:rounded-md rounded-none">
                <div class="p-6">

                    <div class="block mb-8">
                        <img class="h-12 lg:h-16 mx-auto"
                             src="{{ asset('images/logo.png') }}" alt="Logo">
                    </div>

                    <form method="POST" action="#" wire:submit.prevent="login">

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                                   for="login_id">
                                {{ __('Tài khoản') }}
                            </label>
                            <input id="login_id" class="form-input" placeholder="{{ __('Tài khoản hoặc email') }}"
                                   require wire:model="form.login_id" autofocus>
                            @error('form.login_id')
                            <span class="pristine-error text-help">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                                   for="password">
                                {{ __('Mật khẩu') }}
                            </label>
                            <input id="password" class="form-input" type="password" placeholder="{{ __('Mật khẩu') }}"
                                   required wire:model="form.password">
                            @error('form.password')
                            <span class="pristine-error text-help">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <input type="checkbox" class="form-checkbox rounded" id="remember"
                                       wire:model="form.remember">
                                <label class="ms-2" for="remember">
                                    {{ __('Nhớ mật khẩu') }}
                                </label>
                            </div>
                            <a href="#" class="text-sm text-primary border-b border-dashed border-primary">
                                {{ __('Quên mật khẩu?') }}
                            </a>
                        </div>

                        <div class="flex justify-center mb-6">
                            <button wire:loading.remove type="submit" class="btn w-full text-white bg-primary">
                                {{ __('Đăng nhập') }}
                            </button>
                            <button wire:loading.target="login" wire:loading.flex disabled type="button"
                                    class="btn w-full text-white bg-info">
                                <x-icons::circle class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"/>
                                {{ __('Xin chờ') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
