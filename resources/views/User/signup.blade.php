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
        <div class="bg-teal-400 w-80 h-40 rounded-tr-3xl rounded-br-3xl shadow-lg"></div>
        <h1 class="absolute top-8 left-6 text-6xl font-bold text-teal-800 drop-shadow-lg">
            BookShelf
        </h1>
    </div>


    <!-- RIGHT FORM -->
    <div class="bg-teal-600 w-[480px] rounded-3xl shadow-xl p-12">

        <h2 class="text-4xl text-white font-bold text-center mb-10">
            Sign Up
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
            <input type="password"
                   name="password"
                   placeholder="Password"
                   required
                   class="w-full rounded-xl px-5 py-3 bg-gray-200 focus:outline-none">

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
                    Sign Up
                </button>
            </div>
        </form>

    </div>

</body>
</html>
