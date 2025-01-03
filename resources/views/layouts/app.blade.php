<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=B612:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Figtree:400,400i|Adamina:400|spline-sans-mono:300|aldrich:400|audiowide:400|engagement:400|alumni-sans-inline-one:400" rel="stylesheet"/>
        <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0-alpha.1/dist/trix.css"/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [data-trix-button-group="file-tools"] {
                display: none !important;
            }
        </style>
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="m-10">
                {{ $slot }}
                <p>{{ config('app.name') }}</p>
            </main>
        </div>

        @livewireScripts
        <script>
            document.addEventListener('alpine:init', () => {
                // Magic: $tooltip
                Alpine.magic('tooltip', el => message => {
                    let instance = tippy(el, {content: message, trigger: 'manual'})
                    instance.show()
                    setTimeout(() => {
                        instance.hide()
                        setTimeout(() => instance.destroy(), 150)
                    }, 2000)
                })
                // Directive: x-tooltip
                Alpine.directive('tooltip', (el, {expression}) => {
                    tippy(el, {
                        content: expression,
                        delay: [750, 200],
                        placement: "top",
                    })
                })
            })
        </script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>
        <script src="https://unpkg.com/trix@2.0.0-alpha.1/dist/trix.umd.js"></script>

        @stack('scripts')

    </body>
</html>
