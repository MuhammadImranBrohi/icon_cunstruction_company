<x-guest-layout>
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Left Column (Welcome Section) -->
        <div
            class="hidden md:flex w-1/2 items-center justify-center bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 text-white rounded-r-[50px]">
            <div class="text-center px-8">
                <img src="{{ asset('cuns_admin/dist/assets/img/login_avatar.jpeg') }}" alt="CUNS Logo"
                    class="w-24 h-24 mx-auto rounded-full shadow-lg border-4 border-white" />

                <h2 class="text-4xl font-bold mt-6">Welcome to Icon Construction</h2>
                <p class="text-blue-100 mt-4 text-lg">Join our community and experience the future of construction
                    management.</p>

                <ul class="mt-6 text-left text-blue-200 space-y-2">
                    <li>✔ Streamlined Project Tracking</li>
                    <li>✔ Secure User Management</li>
                    <li>✔ Real-time Communication</li>
                </ul>
            </div>
        </div>

        <!-- Right Column (Registration Form) -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8 bg-gray-50">
            <div class="max-w-md w-full bg-white shadow-lg rounded-2xl p-8 space-y-6">
                <!-- Logo -->
                <div class="flex justify-center mb-4">
                    <a href="{{ url('/cus_register') }}">
                        <img src="{{ asset('cuns_admin/dist/assets/img/cunstruction.png') }}" alt="CUNS Logo"
                            class="w-24 h-24 rounded-full shadow-md">
                    </a>
                </div>

                <!-- Title -->
                <h2 class="text-3xl font-bold text-center text-gray-800">Create an Account</h2>

                <!-- Validation Errors -->
                <x-validation-errors class="mb-4" />

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                            type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                            type="email" name="email" :value="old('email')" required />
                    </div>

                    <div>
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                            type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div>
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                            type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <x-button
                        class="w-full justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                        {{ __('Register') }}
                    </x-button>
                </form>

                <!-- Divider -->
                <div class="flex items-center justify-center my-4">
                    <span class="border-t w-1/5"></span>
                    <span class="text-gray-500 mx-2 text-sm">or sign up with</span>
                    <span class="border-t w-1/5"></span>
                </div>

                <!-- Social Register Buttons -->
                <div class="flex justify-center space-x-4">
                    <a href="{{ url('auth/facebook') }}"
                        class="flex items-center justify-center w-10 h-10 rounded-full bg-[#1877F2] hover:bg-[#166fe0] text-white shadow-md transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ url('auth/google') }}"
                        class="flex items-center justify-center w-10 h-10 rounded-full bg-[#DB4437] hover:bg-[#c33d2f] text-white shadow-md transition">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="{{ url('auth/twitter') }}"
                        class="flex items-center justify-center w-10 h-10 rounded-full bg-[#1DA1F2] hover:bg-[#1a91da] text-white shadow-md transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>

                <!-- Login Link -->
                <p class="text-center text-sm text-gray-600 mt-6">
                    Already have an account?
                    <a href="{{ url('/cus_login') }}" class="text-blue-600 hover:underline font-semibold">Login</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
