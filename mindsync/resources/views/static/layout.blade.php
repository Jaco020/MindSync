<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>
<body class="flex flex-col min-h-screen">
    <nav class="py-5 w-full flex justify-between items-center px-[5%]">
        <a href="/" class="text-4xl font-semibold">Mind<span class="text-accent">Sync</span></a>
        <a href="/login" class="border-accent-strong border text-accent-strong rounded-2xl block px-4 py-2 hover:bg-accent-strong hover:text-white ease-linear duration-300">Zaloguj się</a>
    </nav>

    <main class="flex-1 px-[5%] py-10">
        @yield('content')
    </main>

    <footer class="w-full">
        @include('partials.footer')
    </footer>
</body>

</html>