<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex">
            <!-- Left side - Login Form -->
            <div class="flex-1 flex flex-col justify-center items-center">
                <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Log in to your Account</h2>
                    <p class="text-sm text-gray-600 mb-6">Welcome back! Good to see you again.</p>

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
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="mt-4">
                            <x-primary-button class="w-full justify-center">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <p class="mt-6 text-center text-sm text-gray-600">
                        {{ __("Don't have an account?") }}
                        <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            {{ __('Create an account') }}
                        </a>
                    </p>
                </div>
            </div>

            <!-- Right Side - Feature Showcase -->
            <div class="hidden lg:flex flex-1 bg-indigo-600 items-center justify-center">
                <div class="max-w-md text-center px-6">
                    <h2 class="text-3xl font-extrabold text-white">Connect with every application.</h2>
                    <p class="mt-4 text-lg text-indigo-200">Everything you need in one easily customizable dashboard.</p>
                    
                    <div class="mt-8 flex justify-center space-x-2">
                        <div class="w-2 h-2 rounded-full bg-white opacity-50"></div>
                        <div class="w-2 h-2 rounded-full bg-white"></div>
                        <div class="w-2 h-2 rounded-full bg-white opacity-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>