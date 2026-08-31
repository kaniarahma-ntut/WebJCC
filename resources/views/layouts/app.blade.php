<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Ken's Stream</title>
    <link rel="icon" href="{{ asset('ken.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&display=swap" rel="stylesheet"> <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(135deg, #1E2A38 0%, #2A3645 100%);
            color: #ECECEC;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            flex-grow: 1; /* wajippp dibahas */
        }
    </style> -->
</head>

<body class="font-body text-ken-light">
    @if(!Route::is('login'))
        <x-navbar />
    @endif

    <main class="w-full">
        @yield('content')
    </main>

</body>
</html>