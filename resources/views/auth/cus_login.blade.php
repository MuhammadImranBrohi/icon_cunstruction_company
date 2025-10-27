<x-guest-layout>
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Left Column (Login Form) -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8 bg-gray-50">
            <div class="max-w-md w-full bg-white shadow-lg rounded-2xl p-8 space-y-6">
                <!-- Logo -->
                <div class="flex justify-center mb-4">
                    <a href="{{ url('/cus_login') }}">
                        <img src="{{ asset('cuns_admin/dist/assets/img/cunstruction.png') }}" alt="CUNS Logo"
                            class="w-24 h-24 rounded-full shadow-md">
                    </a>
                </div>

                <!-- Title -->
                <h2 class="text-3xl font-bold text-center text-gray-800">Login to your account</h2>

                <!-- Validation Errors -->
                <x-validation-errors class="mb-4" />

                <!-- Session Status -->
                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ $value }}
                    </div>
                @endsession

                <!-- Login Form -->
                <form method="POST" action="{{ route('cus_login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                            type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username" />
                    </div>

                    <div>
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                            type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <x-button
                        class="w-full justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                        {{ __('Log in') }}
                    </x-button>
                </form>

                <!-- Divider -->
                <div class="flex items-center justify-center my-4">
                    <span class="border-t w-1/5"></span>
                    <span class="text-gray-500 mx-2 text-sm">or continue with</span>
                    <span class="border-t w-1/5"></span>
                </div>

                <!-- Register Link -->
                <p class="text-center text-sm text-gray-600 mt-6">
                    Don't have an account?
                    <a href="{{ route('cus_register') }}"
                        class="text-blue-600 hover:underline font-semibold">Register</a>
                </p>
            </div>
        </div>

        <!-- Right Column (Gradient) -->
        <div
            class="hidden md:flex w-1/2 items-center justify-center bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 text-white rounded-l-[50px]">
            <div class="text-center px-8">
                <h2 class="text-4xl font-bold mb-4">connect with us to make a better world </h2>
                <p class="text-lg text-blue-100">Secure and seamless login experience built just for you.</p>
                {{-- outline our commitments  --}}
                <ul class="mt-4 text-left text-blue-200 space-y-2">
                    <li>✔ Commitment to Data Privacy</li>
                    <li>✔ 24/7 Customer Support</li>
                    <li>✔ Regular Security Updates</li>
                    <li>✔ User-Friendly Interface</li>
                </ul>
            </div>
        </div>
    </div>
</x-guest-layout>
