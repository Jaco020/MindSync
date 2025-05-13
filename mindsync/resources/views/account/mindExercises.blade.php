<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MindSync Ćwiczenia Mindfulness</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="flex min-h-screen overflow-x-hidden">
    @include('partials.aside')

    <main class="flex-1 space-y-6 p-2 md:p-10 h-screen overflow-y-auto">

        <div class="relative flex sm:flex-row flex-col sm:justify-between sm:items-center bg-bg-tint p-6 md:px-15 rounded-xl overflow-hidden">
            <div>
                <h2 class="text-xl md:text-2xl 2xl:text-3xl">Ćwiczenia mindfulness</h2>
                <p class="mt-2 text-gray-500 text-sm md:text-base">Zbiór aktywności które pozytywnie wpływają na zdrowie i samopoczucie</p>
            </div>
            <img src="/images/leaf1.svg" class="top-[-104px] left-[-100%] md:left-[-111px] z-3 absolute pointer-events-none" alt="leaf1"> 
            <img src="/images/leaf3.svg" class="right-[-200%] 2xl:right-0! bottom-[-110px] z-0 absolute pointer-events-none" alt="leaf3">   
        </div>

        <div class="flex gap-4 text-sm sm:text-base">
            <a href="/mindExercises" class="bg-accent px-4 py-2 rounded-xl text-white">Dziennik ćwiczeń</a>
            <a href="/mindExercises/list" class="px-4 py-2 rounded-xl hover:ring-1 hover:ring-accent hover:text-accent transition duration-300">Zbiór ćwiczeń</a>
        </div>

        <div class="flex flex-wrap gap-4 bg-bg-tint p-4 rounded-xl">
            <div class="relative">
                <input type="text" placeholder="Wyszukaj" class="bg-bg-main px-4 py-2 pr-10 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full sm:w-auto text-gray-500 text-sm md:text-base" />
                <span class="top-1/2 right-4 absolute text-gray-500 -translate-y-1/2 transform">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
            </div>
            <select class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full sm:w-auto text-gray-500 text-sm md:text-base">
                <option>1. Łatwy</option>
                <option>2. Średni</option>
                <option>3. Trudny</option>
            </select>
            <select class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full sm:w-auto text-gray-500 text-sm md:text-base">
                <option>Poniżej 1 minuty</option>
                <option>Poniżej 5 minut</option>
                <option>10+ minut</option>
                <option>30+ minut</option>
                <option>1h+ godzin</option>
                <option>2h+ godzin</option>
            </select>
            <input type="date" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full sm:w-auto text-gray-500 text-sm md:text-base" />
        </div>

        <div class="space-y-4">
            @for ($i = 0; $i < 3; $i++)
            <div class="relative flex justify-between items-start bg-bg-tint shadow p-4 rounded-xl">
                <div>
                    <div class="flex items-center gap-2 mb-2 text-sm">
                        <span class="bg-green-200 px-2 py-1 rounded-full font-semibold text-green-700 text-xs">Łatwy</span>
                        <img src="/images/emotion3.png" alt="Emoji" class="w-6 md:w-7 pointer-events-none" />
                    </div>
                    <p class="text-gray-700 text-sm md:text-base">
                        Dzisiaj był naprawdę dobry dzień. Spotkałem się z przyjaciółmi na kawie i rozmawialiśmy o nowych projektach. Czuję się pełen energii i gotowy na nowe wyzwania.
                    </p>
                    <p class="mt-2 text-gray-500 text-xs md:text-sm">09.04.2025</p>
                </div>
                <div class="top-2 right-2 absolute flex gap-2">
                    <a href="#" class="place-content-center grid bg-blue-400 hover:bg-blue-500 p-2 rounded-full text-white transition cursor-pointer"><i class="fa-pen-to-square fa-solid"></i></a>
                    <button class="place-content-center grid bg-red-700 hover:bg-red-800 p-2 rounded-full text-white transition cursor-pointer"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>
            @endfor
        </div>
    </main>
</body>

</html>
