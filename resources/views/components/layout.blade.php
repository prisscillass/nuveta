<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css" />

    @vite('resources/css/app.css')

    <title>Nuveta</title>
</head>
<body class="bg-primary">
    {{-- Navbar --}}
    @include('components.navbar')

    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    @include('components.footer')
</body>
</html>