<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce</title>
    @vite('resources/css/app.css')
</head>
<body>


    <div class="container mx-auto mt-4">
       <div class="min-h-screen flex flex-col items-center justify-center bg-white">

           {{-- Logo / Title --}}
            <h1 class="text-5xl font-bold text-teal-600 mb-10">
                Book<span class="text-teal-400">Shelf</span>
            </h1>

            {{-- Card --}}
            <div class="w-full max-w-md bg-[#FAF5F5] border border-teal-500 rounded-lg p-8">

                <h2 class="text-2xl font-bold text-center mb-6">
                Sign In
            </h2>

        <form action="{{ url('/staff') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Username --}}
            <input
                type="text"
                name="username"
                placeholder="Username"
                required
                class="w-full px-4 py-2 border border-teal-400 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
            >

            {{-- Password --}}
            <input
                type="password"
                name="password"
                placeholder="Password"
                required
                class="w-full px-4 py-2 border border-teal-400 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
            >

            {{-- Button --}}
            <div class="flex justify-center pt-4">
                <button
                    type="submit"
                    class="bg-[#3BC1A8] hover:bg-teal-500 text-white px-6 py-2 rounded-md transition"
                >
                    Sign in
                </button>
            </div>
        </form>

    </div>
</div>


    </div>

</body>
</html>
<
