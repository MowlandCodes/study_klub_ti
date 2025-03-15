<!DOCTYPE html>
<html lang="en" class="bg-gray-100 h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Study Klub | TI UNIDA Gontor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full w-full">
    <x-nav-bar></x-nav-bar>
    <main>
        {{ $slot }}
    </main>
</body>

</html>
