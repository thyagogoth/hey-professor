<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('google.login') }}"
               class="ml-2 inline-flex items-center px-4 py-2 bg-white dark:bg-red-800 border
               border-red-300 dark:border-red-500 rounded-md font-semibold text-xs text-red-700 dark:text-red-300
               uppercase tracking-widest shadow-sm hover:bg-red-50 dark:hover:bg-red-700
               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
               dark:focus:ring-offset-red-800 disabled:opacity-25 transition ease-in-out duration-150"
            >
                <svg class="fill-current w-4 h-4 mr-2" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg">
                    <path d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z" fill="#4285f4"/>
                    <path d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z" fill="#34a853"/>                        <path d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z" fill="#fbbc04"/>                        <path d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z" fill="#ea4335"/>
                </svg>
                Google
            </a>

            <a href="{{ route('github.login') }}"
                   class="ml-2 inline-flex items-center px-4 py-2 bg-white dark:bg-red-800 border
               border-red-300 dark:border-red-500 rounded-md font-semibold text-xs text-red-700 dark:text-red-300
               uppercase tracking-widest shadow-sm hover:bg-red-50 dark:hover:bg-red-700
               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
               dark:focus:ring-offset-red-800 disabled:opacity-25 transition ease-in-out duration-150"
                >
                <svg class="fill-current w-4 h-4 mr-2" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                    <path d="M512 0C229.222 0 0 229.222 0 512c0 223.17 143.786 412.061 343.013 478.68 25.11 4.645 34.355-10.896 34.355-24.122 0-11.937-.434-43.67-.697-85.398-139.785 30.325-168.956-38.603-168.956-38.603-22.792-57.934-55.599-73.49-55.599-73.49-45.446-31.073 3.448-30.464 3.448-30.464 50.244 3.53 76.694 51.694 76.694 51.694 44.61 76.452 117.103 54.372 145.464 41.588 4.514-32.438 17.468-54.372 31.724-66.996-110.817-12.575-227.777-55.406-227.777-247.14 0-54.587 19.597-99.107 51.694-134.025-5.207-12.582-22.405-63.447 4.93-132.105 0 0 41.857-13.395 137.09 51.137 39.737-11.076 82.487-16.613 125.048-16.834 42.561.221 85.311 5.758 125.048 16.834 95.233-64.532 137.076-51.137 137.076-51.137 27.36 68.658 10.143 119.523 4.93 132.105 32.148 34.918 51.645 79.438 51.645 134.025 0 191.018-117.135 234.828-228.198 246.805 17.982 15.52 34.01 46.153 34.01 93.185 0 67.246-.603 121.296-.603 137.882 0 13.249 9.189 28.868 34.636 23.904 199.194-66.624 342.971-255.515 342.971-478.68 0-282.778-229.222-512-512-512z"/>
                </svg>
                Github
            </a>

        </div>
    </form>
</x-guest-layout>
