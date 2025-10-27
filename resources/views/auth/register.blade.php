<x-guest-layout>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-600 via-purple-600 to-pink-500">
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg backdrop-blur-lg bg-opacity-50">
            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <x-application-logo class="w-20 h-20" />
            </div>

            <h2 class="text-2xl font-bold text-center mb-8 text-gray-700 dark:text-gray-300">
                Create Your Account
            </h2>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}" class="space-y-6" id="registerForm">
                @csrf

                <!-- Name -->
                <div class="relative">
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus
                        class="peer w-full p-4 pt-6 font-light bg-white dark:bg-gray-700 border dark:border-gray-600 rounded-lg placeholder-transparent focus:outline-none focus:border-purple-500"
                        placeholder="Full Name" />
                    <label for="name"
                        class="absolute top-2 left-4 text-gray-500 dark:text-gray-400 text-xs transition-all duration-200 peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:top-2 peer-focus:text-xs">
                        Full Name
                    </label>
                    <div class="hidden mt-1 text-sm text-green-500" id="nameValid">
                        <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Looks good!
                    </div>
                </div>

                <!-- Email Address -->
                <div class="relative">
                    <input id="email" type="email" name="email" :value="old('email')" required
                        class="peer w-full p-4 pt-6 font-light bg-white dark:bg-gray-700 border dark:border-gray-600 rounded-lg placeholder-transparent focus:outline-none focus:border-purple-500"
                        placeholder="Email" />
                    <label for="email"
                        class="absolute top-2 left-4 text-gray-500 dark:text-gray-400 text-xs transition-all duration-200 peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:top-2 peer-focus:text-xs">
                        Email Address
                    </label>
                    <div class="hidden mt-1 text-sm text-green-500" id="emailValid">
                        <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Valid email format
                    </div>
                </div>

                <!-- Password -->
                <div class="relative">
                    <input id="password" type="password" name="password" required
                        class="peer w-full p-4 pt-6 font-light bg-white dark:bg-gray-700 border dark:border-gray-600 rounded-lg placeholder-transparent focus:outline-none focus:border-purple-500"
                        placeholder="Password" />
                    <label for="password"
                        class="absolute top-2 left-4 text-gray-500 dark:text-gray-400 text-xs transition-all duration-200 peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:top-2 peer-focus:text-xs">
                        Password
                    </label>
                    <!-- Password Strength Indicator -->
                    <div class="mt-2 flex gap-2">
                        <div class="h-1 flex-1 rounded-full bg-gray-200" id="strength1"></div>
                        <div class="h-1 flex-1 rounded-full bg-gray-200" id="strength2"></div>
                        <div class="h-1 flex-1 rounded-full bg-gray-200" id="strength3"></div>
                        <div class="h-1 flex-1 rounded-full bg-gray-200" id="strength4"></div>
                    </div>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400" id="passwordStrengthText">Password strength
                    </p>
                </div>

                <!-- Confirm Password -->
                <div class="relative">
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="peer w-full p-4 pt-6 font-light bg-white dark:bg-gray-700 border dark:border-gray-600 rounded-lg placeholder-transparent focus:outline-none focus:border-purple-500"
                        placeholder="Confirm Password" />
                    <label for="password_confirmation"
                        class="absolute top-2 left-4 text-gray-500 dark:text-gray-400 text-xs transition-all duration-200 peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:top-2 peer-focus:text-xs">
                        Confirm Password
                    </label>
                    <div class="hidden mt-1 text-sm text-green-500" id="passwordMatch">
                        <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Passwords match
                    </div>
                </div>

                <!-- Terms and Privacy Policy -->
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox" required
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-purple-300">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light text-gray-500 dark:text-gray-400">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="font-medium text-purple-600 hover:underline">Terms of Service</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="font-medium text-purple-600 hover:underline">Privacy Policy</a>',
                                ]) !!}
                            </label>
                        </div>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit"
                        class="ml-4 inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Register') }}
                    </button>
                </div>

                <!-- Social Login Buttons -->
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white dark:bg-gray-800 text-gray-500">Or continue with</span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <a href="#"
                            class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-700 text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 0C4.477 0 0 4.477 0 10c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.341-3.369-1.341-.454-1.156-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0110 4.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C17.137 18.163 20 14.418 20 10c0-5.523-4.477-10-10-10z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        <a href="#"
                            class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-700 text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Password Strength and Validation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registerForm');
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const passwordConfirm = document.getElementById('password_confirmation');
            const nameValid = document.getElementById('nameValid');
            const emailValid = document.getElementById('emailValid');
            const passwordMatch = document.getElementById('passwordMatch');
            const strength1 = document.getElementById('strength1');
            const strength2 = document.getElementById('strength2');
            const strength3 = document.getElementById('strength3');
            const strength4 = document.getElementById('strength4');
            const strengthText = document.getElementById('passwordStrengthText');

            // Name validation
            name.addEventListener('input', function() {
                if (this.value.length >= 2) {
                    nameValid.classList.remove('hidden');
                } else {
                    nameValid.classList.add('hidden');
                }
            });

            // Email validation
            email.addEventListener('input', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailRegex.test(this.value)) {
                    emailValid.classList.remove('hidden');
                } else {
                    emailValid.classList.add('hidden');
                }
            });

            // Password strength
            password.addEventListener('input', function() {
                const value = this.value;
                let strength = 0;

                if (value.length >= 8) strength++;
                if (value.match(/[a-z]/) && value.match(/[A-Z]/)) strength++;
                if (value.match(/\d/)) strength++;
                if (value.match(/[^a-zA-Z\d]/)) strength++;

                strength1.className = 'h-1 flex-1 rounded-full transition-colors ' + (strength >= 1 ?
                    'bg-red-500' : 'bg-gray-200');
                strength2.className = 'h-1 flex-1 rounded-full transition-colors ' + (strength >= 2 ?
                    'bg-yellow-500' : 'bg-gray-200');
                strength3.className = 'h-1 flex-1 rounded-full transition-colors ' + (strength >= 3 ?
                    'bg-blue-500' : 'bg-gray-200');
                strength4.className = 'h-1 flex-1 rounded-full transition-colors ' + (strength >= 4 ?
                    'bg-green-500' : 'bg-gray-200');

                const texts = ['Very Weak', 'Weak', 'Medium', 'Strong', 'Very Strong'];
                strengthText.textContent = texts[strength];
            });

            // Password match
            passwordConfirm.addEventListener('input', function() {
                if (this.value === password.value && this.value !== '') {
                    passwordMatch.classList.remove('hidden');
                } else {
                    passwordMatch.classList.add('hidden');
                }
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                if (password.value !== passwordConfirm.value) {
                    e.preventDefault();
                    alert('Passwords do not match!');
                }
            });
        });
    </script>
</x-guest-layout>
