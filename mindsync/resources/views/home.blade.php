<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync</title>
    @vite('resources/css/app.css')

</head>
<body class="px-[5%]">
    <nav class="py-3 w-full flex justify-between items-center">
        <a href="/" class="text-4xl font-semibold">Mind<span class="text-accent">Sync</span></a>
        <a href="" class="border-accent-strong border text-accent-strong rounded-2xl block px-4 py-2 text-xl hover:bg-accent-strong hover:text-white ease-linear duration-300">Zaloguj się</a>
    </nav>

    <div id="baner" class="flex justify-between items-center my-10">
        <div class="w-150">
            <p class="text-accent text-xl mb-2">Zdrowie psychiczne to bogactwo</p>
            <h1 class="mb-5 text-5xl text-header-gray font-bold">Stwórz przestrzeń dla spokojniejszego umysłu</h1>
            <p class="mb-10 text-xl">Naucz się zarządzać swoimi emocjami i myślami dzięki codziennej praktyce uważności. Stwórz spokojniejszy umysł w każdej chwili dnia.</p>
            <a href="" class=" bg-accent border text-white rounded-2xl px-5 py-3 text-xl hover:bg-bg-main hover:text-accent ease-linear duration-300">Zarejestruj się</a>
        </div>
        <img src="{{ asset('images/baner.svg')}}" class="w-[700px] mr-[-80px]" alt="baner">
    </div>
</body>
</html>