<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>在庫管理システム</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">在庫管理システム</a>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>

<div>
    @include('layouts.navigation') {{-- ナビゲーションバーのインクルード --}}
    
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        @if (isset($slot))
            {{ $slot }}
        @endif
    </main>
</div>


</html>
