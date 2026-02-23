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

        <form action="{{ route('user.signup.post') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email -->
            <input type="email"
                   name="email"
                   placeholder="Email"
                   required
                   class="w-full rounded-xl px-5 py-3 bg-gray-200 focus:outline-none">

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
                <p class="text-white">Sudah punya akun? <a href="{{ route('user.login') }}" class="underline hover:text-teal-200">Masuk di sini</a></p>
            </div>

        </form>

    </div>

</body>
</html>
