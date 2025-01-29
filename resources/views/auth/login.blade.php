<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('CSS/login.css') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    {{--
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- <x-guest-layout> --}}
        <div class="_form">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />


            {{-- login logo and title --}}
            <div class="logo_slider" id="login_slider">
                <div class="logo_title">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex" id="logo_container">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">
                    </div>
                    <p>Eclipse</p>
                </div>
                <div class="cinema_icon">
                    <img src="{{asset('images/cinema_icon.png')}}" alt="">
                </div>
                <p>Feel the magic at Eclipse—where every film unveils like a premiere, and each moment lingers beyond
                    the screen.</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Login</h1>
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" name="email" :value="old('email')" required
                        autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif --}}
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('register') }}">
                        {{ __("Don't have an account?") }}
                    </a>

                    <x-primary-button class="ms-3" id="login_btn">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        {{--
    </x-guest-layout> --}}
</body>

</html>