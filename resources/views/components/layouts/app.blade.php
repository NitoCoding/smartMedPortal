<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@livewireStyles
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />

<title>{{ $title ?? 'Page Title' }}</title>
</head>

<body>
    @if (Request::routeIs('auth.*'))
        {{ $slot }}
    @else
        <div class="antialiased dark:bg-gray-900">
            @include('components.layouts.header')
            <div>
                @include('components.layouts.sidebar')
                <main class="h-auto p-4 pt-20 sm:ml-64">

                        {{ $slot }}
                </main>
            </div>
        </div>
    @endif
@livewireScripts
</body>

</html>
