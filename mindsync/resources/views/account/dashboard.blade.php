<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="flex min-h-screen overflow-x-hidden">
    @include('partials.aside')

    <!-- Main Content -->
    <main class="flex-1 space-y-6 p-2 md:p-10 h-screen overflow-y-auto">
        <div class="relative bg-bg-tint p-6 md:px-15 rounded-xl overflow-hidden">
            <h2 class="text-xl md:text-2xl">
                <span id="timeGreeting"></span>, {{ $userName }} 👋
            </h2>
            <!--<p class="mt-2 text-gray-500 text-sm md:text-base">Powodzenia w kontynuacji twojej 14 dniowej passy medytacji</p>-->
            <img src="/images/leaf1.svg" class="top-[-104px] left-[-100%] md:left-[-111px] z-3 absolute pointer-events-none" alt="leaf1">   
            <img src="/images/leaf2.svg" class="top-[-75px] left-[596px] z-1 absolute pointer-events-none" alt="leaf2">   
            <img src="/images/leaf3.svg" class="right-[-200%] 2xl:right-0! bottom-[-110px] z-0 absolute pointer-events-none" alt="leaf3">   
        </div>

        <div class="gap-6 grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-4 min-h-50">
            <div class="bg-bg-tint p-6 rounded-xl text-center">
                <p class="font-semibold text-header-gray text-lg md:text-xl">Twój średni nastrój</p>
                <div class="mt-4 2xl:mt-10 font-bold text-accent text-4xl md:text-5xl">{{$avgMood}}</div>
            </div>
            <div class="bg-bg-tint p-6 rounded-xl text-center">
                <p class="font-semibold text-header-gray text-lg md:text-xl">Streak aktywnych dni</p>
                <div class="mt-4 2xl:mt-10 font-bold text-accent text-4xl md:text-5xl">-</div>
            </div>
            <div class="relative bg-bg-tint p-6 rounded-xl overflow-y-hidden text-center">
                <p class="font-semibold text-header-gray text-lg md:text-xl">Twoje wpisy</p>
                <div class="mt-4 2xl:mt-10 font-bold text-accent text-4xl md:text-5xl">{{$journalEntriesCount}}</div>
                <!-- <img src="/images/chart-graphic.svg" class="bottom-[-100%] 2xl:bottom-4 left-1/2 absolute h-[50px] -translate-x-1/2" alt="Wykres nastroju"> -->
            </div>
            <div class="bg-bg-tint p-6 rounded-xl text-center">
                <p class="font-semibold text-header-gray text-lg md:text-xl">Porada na dziś</p>
                <p class="mt-2 text-gray-500 text-xs md:text-sm 2xl:text-base">Porada odświeżająca się raz dziennie lub przy każdym odwiedzeniu dashboard (do zdecydowania), można znaleść jakieś API. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum, voluptate? </p>
            </div>
        </div>

        <div class="gap-6 grid grid-cols-1 lg:grid-cols-3 2xl:grid-cols-4 min-h-100">
            <div class="lg:col-span-2 2xl:col-span-3 bg-bg-tint p-6 rounded-xl">
                <p class="mb-5 font-semibold text-header-gray text-lg md:text-xl text-center">Wykres nastroju z ostatnich 30 dni</p>
                <div class="bg-gradient-to-b from-teal-300 to-white rounded">
                    <canvas id="moodChart"></canvas>
                </div>
            </div>
            <div class="gap-6 grid grid-rows-2 h-full">
                <a href="emotions_journal" class="block relative bg-bg-tint p-4 pr-8 md:pr-4 rounded-xl hover:ring-2 hover:ring-accent transition duration-300 cursor-pointer">
                    <h3 class="mb-2 text-lg md:text-xl">Twój ostatni wpis</h3>
                    <p class="text-gray-500 text-xs md:text-sm">Lorem Ipsum dolore set amet ipsum randon, lorus deus machina...</p>
                    <p class="bottom-4 absolute text-gray-400 text-xs md:text-sm">09.04.2025</p>
                    <i class="fa-chevron-right right-4 bottom-4 absolute text-accent text-2xl md:text-3xl fa-solid"></i>
                </a>
                <a href="/mind_exercises" class="block relative bg-bg-tint p-4 pr-8 md:pr-4 rounded-xl hover:ring-2 hover:ring-accent transition duration-300 cursor-pointer">
                    <h3 class="mb-2 text-lg md:text-xl">Polecane ćwiczenie</h3>
                    <p class="text-xs md:text-sm text-accent-strong">2h Spacer - Łatwy</p>
                    <p class="mt-2 text-gray-500 text-xs md:text-sm">Opis ćwiczenia Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                    <i class="fa-chevron-right right-4 bottom-4 absolute text-accent text-2xl md:text-3xl fa-solid"></i>
                </a>
            </div>
        </div>
    </main>
</body>
</html>