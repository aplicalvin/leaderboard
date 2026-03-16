<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mentor</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-black/50">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <h1 class="text-4xl font-bold mb-4">Mentor</h1>
        <p class="text-lg">Welcome to the Mentor page.</p>
        <div class="mt-8">
            <a href="/" class="text-blue-500 hover:underline">Back to Home</a>
        </div>
    </div>
</body>
</html>
