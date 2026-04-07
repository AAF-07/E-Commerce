{{-- <x-guest-layout>
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
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-teal-900 min-h-screen flex items-center justify-between px-24">

    <!-- LEFT LOGO -->
    <div class="relative">
        <img src="{{ asset('image/Logo-text.png') }}" alt="Logo" ></img>
    </div>


    <!-- RIGHT FORM -->
    <div class="bg-teal-600 w-[480px] rounded-3xl shadow-xl p-12">

        <h2 class="text-4xl text-white font-bold text-center mb-10">
            Masuk
        </h2>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email -->
            <input type="email"
                   name="email"
                   placeholder="Email"
                   required
                   class="w-full rounded-xl px-5 py-3 bg-gray-200 focus:outline-none">

            <!-- Password -->
            <input type="password"
                   name="password"
                   placeholder="Password"
                   required
                   class="w-full rounded-xl px-5 py-3 bg-gray-200 focus:outline-none">

            <!-- Button -->
            <div class="text-center pt-4">
                <button type="submit"
                        class="bg-teal-200 px-10 py-2 rounded-xl hover:bg-teal-300 transition">
                    Masuk
                </button>
                <p class="text-white text-sm mt-4 margin-0 padding-0">
                    {{-- @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="underline text-sm text-gray-200">
                        Lupa password?
                    </a>
                    @endif --}}
                </p>
                <p class="text-white text-sm mt-4 margin-0 padding-0">
                    Belum punya akun?
                    <a href="/register" class="underline">
                        Daftar
                    </a>
                </p>
            </div>
        </form>

    </div>

</body>
</html>
