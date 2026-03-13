<!DOCTYPE html>
<html>
<head>
    <title>DNCC Leaderboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

@include('components.navbar')

<div class="flex">

    @include('components.sidebar')

    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>