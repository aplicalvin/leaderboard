<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'DNCC Leaderboard')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600,700,800|poppins:400,600,700,800&display=swap" rel="stylesheet" />
    <!-- Tailwind CSS (CDN as requested) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'neon-blue': '#00f3ff',
                        'neon-purple': '#b537f2',
                        'deep-navy': '#030712',
                        'glass-bg': 'rgba(255, 255, 255, 0.03)',
                        'glass-border': 'rgba(255, 255, 255, 0.1)',
                    },
                    backgroundImage: {
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                        'podium-1': 'linear-gradient(180deg, rgba(234, 179, 8, 0.3) 0%, rgba(234, 179, 8, 0) 100%)',
                        'podium-2': 'linear-gradient(180deg, rgba(148, 163, 184, 0.3) 0%, rgba(148, 163, 184, 0) 100%)',
                        'podium-3': 'linear-gradient(180deg, rgba(217, 119, 6, 0.3) 0%, rgba(217, 119, 6, 0) 100%)',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #030712;
            background-image: 
                radial-gradient(circle at 15% 50%, rgba(0, 243, 255, 0.08), transparent 25%),
                radial-gradient(circle at 85% 30%, rgba(181, 55, 242, 0.08), transparent 25%);
            color: #f3f4f6;
            min-height: 100vh;
        }

        /* Common Glassmorphism utility */
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
    @stack('styles')
</head>
<body class="antialiased font-sans flex flex-col min-h-screen selection:bg-neon-purple selection:text-white bg-slate-950">

    <!-- Navbar Component -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="flex-grow w-full relative z-10">
        @yield('content')
    </main>

    <!-- Footer Component -->
    @include('components.footer')

    @stack('scripts')
</body>
</html>
