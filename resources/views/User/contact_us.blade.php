@extends('User.Layout.layout')

@section('content')

<div class="px-10 py-16 min-h-[70vh]">

    <!-- title -->
    <h1 class="text-3xl font-semibold mb-10">
        Hubungi Kami
    </h1>

    <!-- card container -->
    <div class="grid md:grid-cols-2 gap-10">

        <!-- email -->
        <div class="bg-gray-100 rounded-xl shadow-md p-6 flex items-start gap-4">

            <!-- icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                class="w-6 h-6 mt-1 text-black" viewBox="0 0 24 24">
                <path d="M2 4h20v16H2z" fill="none"/>
                <path d="M22 6.5l-10 7-10-7V6l10 7 10-7z"/>
            </svg>

            <!-- text -->
            <div>
                <h2 class="text-lg font-semibold">Email</h2>
                <p class="text-gray-500">csbookshelf@gmail.com</p>
            </div>

        </div>

        <!-- whatsapp -->
        <div class="bg-gray-100 rounded-xl shadow-md p-6 flex items-start gap-4">

            <!-- icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                class="w-6 h-6 mt-1 text-black" viewBox="0 0 24 24">
                <path d="M20.52 3.48A11.77 11.77 0 0012.05 0C5.52 0 .24 5.28.24 11.81c0 2.08.54 4.1 1.56 5.89L0 24l6.46-1.68a11.8 11.8 0 005.59 1.42h.01c6.53 0 11.81-5.28 11.81-11.81 0-3.15-1.23-6.11-3.35-8.45zM12.06 21.3c-1.79 0-3.55-.48-5.09-1.39l-.36-.21-3.83 1 1.02-3.73-.23-.38a9.38 9.38 0 01-1.44-5.01c0-5.19 4.23-9.42 9.42-9.42 2.51 0 4.86.98 6.64 2.76a9.33 9.33 0 012.76 6.64c0 5.19-4.23 9.42-9.42 9.42zm5.16-7.07c-.28-.14-1.65-.81-1.91-.9-.26-.09-.45-.14-.64.14-.19.28-.73.9-.9 1.08-.17.19-.34.21-.62.07-.28-.14-1.18-.43-2.25-1.37-.83-.74-1.39-1.65-1.55-1.93-.16-.28-.02-.43.12-.57.13-.13.28-.34.42-.5.14-.17.19-.28.28-.47.09-.19.05-.36-.02-.5-.07-.14-.64-1.55-.88-2.12-.23-.55-.47-.47-.64-.48h-.55c-.19 0-.5.07-.76.36-.26.28-1 1-.1 2.44.9 1.44 1.29 1.99 2.78 3.22 1.49 1.23 2.06 1.37 2.82 1.53.76.16 1.45.14 2-.09.55-.23 1.65-.67 1.88-1.32.23-.64.23-1.19.16-1.32-.07-.12-.26-.19-.55-.33z"/>
            </svg>

            <!-- text -->
            <div>
                <h2 class="text-lg font-semibold">Whatsapp</h2>
                <p class="text-gray-500">+62 000-0000-0000</p>
            </div>

        </div>

    </div>

</div>

@endsection
