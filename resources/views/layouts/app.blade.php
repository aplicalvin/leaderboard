<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'DNCC Leaderboard')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600,700,800|poppins:400,600,700,800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Iosevka+Charon:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS (CDN as requested) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- html2canvas for Image Export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"PT Sans"', 'sans-serif'],
                        poppins: ['"PT Sans"', 'sans-serif'],
                    },
                    colors: {
                        'mariner': {
                            '50': '#edf9ff',
                            '100': '#d6f0ff',
                            '200': '#b5e7ff',
                            '300': '#83daff',
                            '400': '#48c3ff',
                            '500': '#1ea3ff',
                            '600': '#0684ff',
                            '700': '#0063e2',
                            '800': '#0855c5',
                            '900': '#0d4b9b',
                            '950': '#0e2e5d',
                        },
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
            background-color: #edf9ff; /* mariner-50 */
            color: #0e2e5d; /* mariner-950 */
            min-height: 100vh;
        }

        /* Common Glassmorphism utility for light theme */
        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(214, 240, 255, 0.5); /* mariner-100 */
            box-shadow: 0 10px 30px rgba(6, 132, 255, 0.05); /* mariner-600 */
        }
    </style>
    @stack('styles')
</head>
<body class="antialiased font-sans flex flex-col min-h-screen selection:bg-mariner-500 selection:text-white">

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
