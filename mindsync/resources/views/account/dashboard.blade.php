<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="overflow-x-hidden flex min-h-screen">
    @include('partials.aside')

    <!-- Main Content -->
    <main class="flex-1 h-screen overflow-y-auto p-2 md:p-10 space-y-6">
        <div class="bg-bg-tint p-6 md:px-15 rounded-xl relative overflow-hidden">
            <h2 class="text-xl md:text-2xl 2xl:text-3xl font-semibold text-header-gray">
                <span id="timeGreeting"></span>, {{ $userName }} 👋
            </h2>
            <!--<p class="text-gray-500 mt-2 text-sm md:text-base">Powodzenia w kontynuacji twojej 14 dniowej passy medytacji</p>-->
            <img src="/images/leaf1.svg" class="absolute left-[-100%] md:left-[-111px] top-[-104px] z-3 pointer-events-none" alt="leaf1">   
            <img src="/images/leaf2.svg" class="absolute left-[596px] top-[-75px] pointer-events-none z-1" alt="leaf2">   
            <img src="/images/leaf3.svg" class="absolute right-[-200%] 2xl:right-0! bottom-[-110px] z-0 pointer-events-none" alt="leaf3">   
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-4 gap-6 min-h-60">
            <div class="bg-bg-tint p-6 rounded-xl text-center ">
                <p class="text-lg md:text-xl 2xl:text-2xl text-header-gray font-semibold">Twój średni nastrój</p>
                <div class="text-4xl md:text-5xl 2xl:text-6xl font-bold text-accent mt-4 2xl:mt-10">{{$avgMood}}</div>
            </div>
            <div class="bg-bg-tint p-6 rounded-xl text-center">
                <p class="text-lg md:text-xl 2xl:text-2xl text-header-gray font-semibold">Streak aktywnych dni</p>
                <div class="text-4xl md:text-5xl 2xl:text-6xl font-bold text-accent mt-4 2xl:mt-10">-</div>
            </div>
            <div class="bg-bg-tint p-6 rounded-xl text-center relative overflow-y-hidden">
                <p class="text-lg md:text-xl 2xl:text-2xl text-header-gray font-semibold">Twoje wpisy</p>
                <div class="text-4xl md:text-5xl 2xl:text-6xl font-bold text-accent mt-4 2xl:mt-10">{{$journalEntriesCount}}</div>
                <img src="/images/chart-graphic.svg" class="bottom-[-100%] h-[50px] absolute 2xl:bottom-4 left-1/2 -translate-x-1/2" alt="Wykres nastroju">
            </div>
            <div class="bg-bg-tint p-6 rounded-xl text-center">
                <p class="text-lg md:text-xl 2xl:text-2xl text-header-gray font-semibold">Porada na dziś</p>
                <p class="text-xs md:text-sm 2xl:text-base text-gray-500 mt-2">Porada odświeżająca się raz dziennie lub przy każdym odwiedzeniu dashboard (do zdecydowania), można znaleść jakieś API. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum, voluptate? </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 2xl:grid-cols-4 gap-6 min-h-100">
            <div class="bg-bg-tint p-6 rounded-xl lg:col-span-2 2xl:col-span-3">
                <p class="text-lg md:text-xl 2xl:text-2xl text-header-gray font-semibold text-center mb-5">Wykres nastroju z ostatnich 30 dni</p>
                <div class="bg-gradient-to-b from-teal-300 to-white rounded">
                    <canvas id="moodChart"></canvas>
                </div>
            </div>
            <div class="grid grid-rows-2 h-full gap-6">
                <a href="emotions_journal" class="block bg-bg-tint pr-8 md:pr-4 p-4 rounded-xl relative cursor-pointer hover:ring-2 hover:ring-accent transition duration-300">
                    <h3 class="text-lg md:text-xl 2xl:text-2xl text-header-gray font-semibold mb-2">Twój ostatni wpis</h3>
                    <p class="text-xs md:text-sm text-gray-500">Lorem Ipsum dolore set amet ipsum randon, lorus deus machina...</p>
                    <p class="text-xs md:text-sm text-gray-400 absolute bottom-4">09.04.2025</p>
                    <i class="fa-solid fa-chevron-right text-accent text-2xl md:text-3xl absolute bottom-4 right-4"></i>
                </a>
                <a href="/mind_exercises" class="block bg-bg-tint pr-8 md:pr-4 p-4 rounded-xl relative cursor-pointer hover:ring-2 hover:ring-accent transition duration-300">
                    <h3 class="text-lg md:text-xl 2xl:text-2xl text-header-gray font-semibold mb-2">Polecane ćwiczenie</h3>
                    <p class="text-xs md:text-sm text-accent-strong ">2h Spacer - Łatwy</p>
                    <p class="text-xs md:text-sm text-gray-400 mt-2">Opis ćwiczenia Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                    <i class="fa-solid fa-chevron-right text-accent text-2xl md:text-3xl absolute bottom-4 right-4"></i>
                </a>
            </div>
        </div>
    </main>
</body>
</html>