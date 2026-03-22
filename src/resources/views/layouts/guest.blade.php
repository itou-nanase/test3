<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>

    {{-- CSS読み込み --}}
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
</head>
<body>

    <div class="card">
        <div class="app-name">
            {{ config('app.name', 'PiGLy') }}
        </div>

        <div class="content-area">
            @yield('content')
        </div>
    </div>

</body>
</html>