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
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- <x-guest-layout> --}}
        <div class="_form" id="register_form">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- register form --}}
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Register</h1>

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Account Nmae -->
                <div>
                    <x-input-label for="acc_name" :value="__('Account Name')" />
                    <x-text-input id="acc_name" class="block mt-1 w-full" type="text" name="acc_name"
                        :value="old('acc_name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('acc_name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            {{-- login logo and title --}}
            <div class="logo_slider" id="register_slider">
                <div class="logo_title">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex" id="logo_container">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">
                    </div>
                    <p>Eclipse</p>
                </div>
                <div class="cinema_icon">
                    <img src="{{asset('images/register_icon.png')}}" alt="">
                </div>
                <p>Register with Eclipse—your gateway to moments that move, thrill, and inspire. Because cinema should
                    feel personal</p>
            </div>

        </div>
        {{--
    </x-guest-layout> --}}
</body>

</html>