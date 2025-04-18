<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>
<body class="">
    <nav class="py-3 w-full flex justify-between items-center px-[5%]">
        <a href="/login" class="text-4xl font-semibold">Mind<span class="text-accent">Sync</span></a>
        <a href="" class="border-accent-strong border text-accent-strong rounded-2xl block px-4 py-2 hover:bg-accent-strong hover:text-white ease-linear duration-300">Zaloguj się</a>
    </nav>

    <div id="baner" class="flex justify-between items-center px-[5%] max-h-[500px] pb-20">
        <div class="w-150">
            <p class="text-accent text-xl mb-2">Zdrowie psychiczne to bogactwo</p>
            <h1 class="mb-5 text-5xl text-header-gray font-bold">Stwórz przestrzeń dla spokojniejszego umysłu</h1>
            <p class="mb-10 text-xl">Naucz się zarządzać swoimi emocjami i myślami dzięki codziennej praktyce uważności. Stwórz spokojniejszy umysł w każdej chwili dnia.</p>
            <a href="/register" class=" bg-accent border text-white rounded-2xl px-5 py-3 hover:bg-bg-main hover:text-accent ease-linear duration-300">Zarejestruj się</a>
        </div>
        <img src="{{ asset('images/baner.svg')}}" class="w-[600px]  mr-[-80px] pointer-events-none select-none" alt="baner">
    </div>

    <div id="showcase" class="bg-bg-secondary py-15">
        <h2 class="text-3xl font-semibold text-center text-header-gray mb-3">Kompleksowe wsparcie zdrowia psychicznego</h2>
        <p class="text-xl text-center w-150 mx-auto">MindSync oferuje pełen zestaw narzędzi, które pomogą Ci zadbać o swoje samopoczucie psychiczne w codziennym życiu.</p>
        <div class="cards grid grid-cols-1 md:grid-cols-2 gap-10 mt-10 justify-items-center mx-auto max-w-5xl">
            <div class="cards__item flex w-full bg-bg-tint rounded-2xl p-7 gap-5 max-w-md">
                <i class="fa-solid fa-note-sticky text-accent text-4xl"></i>
                <div>
                    <p class="text-xl mb-2">Dziennik nastroju</p>
                    <p>Monitoruj swoje emocje i odkrywaj wzorce w swoim samopoczuciu dzięki intuicyjnemu dziennikowi.</p>
                </div>
            </div>
            <div class="cards__item flex w-full bg-bg-tint rounded-2xl p-7 gap-5 max-w-md">
                <i class="fa-solid fa-brain text-accent text-4xl"></i>
                <div>
                    <p class="text-xl mb-2">Ćwiczenia mindfulness</p>
                    <p>Bogata biblioteka praktyk uważności dopasowanych do Twoich potrzeb i dostępnego czasu.</p>
                </div>
            </div>
            <div class="cards__item flex w-full bg-bg-tint rounded-2xl p-7 gap-5 max-w-md">
                <i class="fa-solid fa-face-smile text-accent text-4xl"></i>
                <div>
                    <p class="text-xl mb-2">Analiza emocji</p>
                    <p>Zaawansowana analiza Twoich zapisków z dziennika pomoże Ci lepiej zrozumieć swoje stany emocjonalne.</p>
                </div>
            </div>
            <div class="cards__item flex w-full bg-bg-tint rounded-2xl p-7 gap-5 max-w-md">
                <i class="fa-solid fa-chart-line text-accent text-4xl"></i>
                <div>
                    <p class="text-xl mb-2">Dashboard z danymi</p>
                    <p>Przejrzyste wykresy i statystyki pokazujące Twój postęp i trendy w samopoczuciu.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="baner-chatbot" class="flex flex-col md:flex-row justify-between items-center px-[5%] max-h-[500px] mb-25 rounded-2xl">
        <img src="{{ asset('images/chatbotBaner.svg')}}" class="w-[450px] md:ml-[-30px] md:mt-[150px] pointer-events-none select-none" alt="chatbot ilustracja">
        
        <div class="w-full md:w-1/2 md:pl-10 text-center md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold text-header-gray mb-4">Nowoczesny Chatbot AI</h2>
            <p class="text-lg mb-6 max-w-[700px]" >Nasz inteligentny asystent jest dostępny dla Ciebie 24/7, oferując wsparcie, porady i techniki radzenia sobie ze stresem. Wykorzystuje zaawansowaną sztuczną inteligencję, aby dostosować się do Twoich potrzeb.</p>
            <a href="/register" class=" bg-accent border text-white rounded-2xl px-5 py-3 hover:bg-bg-main hover:text-accent ease-linear duration-300">
                Wypróbuj teraz
            </a>
        </div>
    </div>

    <div id="join-now-baner" class="text-center bg-bg-tint py-15">
        <h2 class="text-3xl md:text-4xl font-bold text-header-gray mb-4">Każda Historia Ma Swoje Znaczenie</h2>
        <p class="text-lg mb-6 w-[700px] mx-auto">Zastanawiasz się, ile razy dziennie jesteś w stanie uważności? Sprawdź swój poziom mindfulness i odkryj, jak możesz rozwijać tę umiejętność każdego dnia.</p>
        <a href="/register" class=" bg-accent border text-white rounded-2xl px-5 py-3 hover:bg-bg-main hover:text-accent ease-linear duration-300">
        Rozpocznij swoją podróż
        </a>
    </div>

    <footer class="bg-bg-footer-black text-white py-14 px-[5%]">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between gap-10 md:gap-20">
            <div class="md:w-1/3">
                <h2 class="text-xl font-semibold mb-2">MindSync</h2>
                <p class="text-sm text-gray-400">
                    Kompleksowa platforma wspierająca zdrowie psychiczne poprzez praktyki mindfulness, monitoring nastroju i wsparcie AI.
                </p>
            </div>

            <div>
                <h3 class="font-semibold mb-3">Funkcje</h3>
                <ul class="space-y-1 text-gray-300 text-sm">
                    <li><a href="#">Dziennik nastroju</a></li>
                    <li><a href="#">Ćwiczenia Mindfulness</a></li>
                    <li><a href="#">ChatbotAI</a></li>
                    <li><a href="#">Analiza Emocji</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold mb-3">O Nas</h3>
                <ul class="space-y-1 text-gray-300 text-sm">
                    <li><a href="#">Nasz Zespół</a></li>
                    <li><a href="#">Kontakt</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold mb-3">Wsparcie</h3>
                <ul class="space-y-1 text-gray-300 text-sm">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Warunki Użytkowania</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-footer-border mt-10 pt-6 text-center text-sm text-gray-500">
            © 2025 MindSync. Wszelkie prawa zastrzeżone.
        </div>
    </footer>

</body>
</html>