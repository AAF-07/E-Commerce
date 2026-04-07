{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
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
            Daftar
        </h2>

        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email -->
            <input type="email"
                   name="email"
                   placeholder="Email"
                   required
                   class="w-full rounded-xl px-5 py-3 bg-gray-200 focus:outline-none">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!-- Nama -->
            <input type="text"
                   name="name"
                   placeholder="Nama Lengkap"
                   required
                   class="w-full rounded-xl px-5 py-3 bg-gray-200 focus:outline-none">

            <!-- Password -->
            <div>
                <input type="password"
                   name="password"
                   placeholder="Password"
                   required
                   class="w-full rounded-xl px-5 py-3 bg-gray-200 focus:outline-none">

                <p class="text-sm text-gray-300 mt-2">
                    Password harus terdiri dari minimal 8 karakter, termasuk huruf besar, huruf kecil, angka, dan simbol khusus.
                </p>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>


            <!-- Confirm Password -->
            <input type="password"
                   name="password_confirmation"
                   placeholder="Confirm Password"
                   required
                   class="w-full rounded-xl px-5 py-3 bg-gray-200 focus:outline-none">

            <!-- Button -->
            <div class="text-center pt-4">
                <button type="submit"
                        class="bg-teal-200 px-10 py-2 rounded-xl hover:bg-teal-300 transition">
                    Daftar
                </button>
                <p class="text-white">Sudah punya akun? <a href="{{ route('login') }}" class="underline hover:text-teal-200">Masuk di sini</a></p>
            </div>

        </form>

    </div>

</body>
</html>
