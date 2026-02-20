<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce</title>
    @vite('resources/css/app.css')
</head>
<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    }

    // klik luar nutup dropdown
    window.addEventListener('click', function(e) {
        const dropdown = document.getElementById('profileDropdown');
        if (!e.target.closest('.relative')) {
            dropdown.classList.add('hidden');
        }
    });
</script>
<body>
    @include('User.Layout.header')

    <div class="container mx-auto mt-4">
        @yield('content')
    </div>

    @include('User.Layout.footer')

</body>
</html>
