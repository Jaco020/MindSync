<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Dziennik Nastroju</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="overflow-x-hidden flex min-h-screen">
    @include('partials.aside')
    <main class="flex-1 h-screen overflow-y-auto p-2 md:p-10 space-y-6">

        <div class="bg-bg-tint p-6 md:px-15 rounded-xl relative overflow-hidden flex flex-col sm:flex-row sm:justify-between sm:items-center">
            <div>
                <h2 class="text-xl md:text-2xl 2xl:text-3xl font-semibold text-header-gray">Dziennik nastroju</h2>
                <p class="text-gray-500 mt-2 text-sm md:text-base">Monitoruj i opisuj swój nastrój</p>
            </div>
            <a href="/emotions/journal/addnew" class="mt-4 sm:mt-0 px-4 py-2 bg-accent text-white rounded-2xl hover:bg-accent-strong cursor-pointer transition duration-300">
                    Nowy wpis
            </a>
            <img src="/images/leaf1.svg" class="absolute left-[-100%] md:left-[-111px] top-[-104px] z-3 pointer-events-none" alt="leaf1">   
        </div>

        <h1 class="font-semibold text-base sm:text-lg md:text-xl text-header-gray ml-[1%] sm:ml-1">Wpisy (3)</h1>

        <div class="space-y-4">
            <!-- Wpis 09.04.2025 -->
            <div class="bg-bg-tint p-4 rounded-xl shadow flex justify-between items-start relative">
                <div>
                    <div class="text-gray-500 mb-2 flex flex-col sm:flex-row sm:items-center gap-2">
                        <div>
                            <i class="fa-solid fa-calendar-days text-accent text-lg md:text-xl mr-1"></i>
                            <span class="font-semibold text-xs md:text-sm">09.04.2025</span>
                        </div>
                        <div class="flex gap-2 flex-wrap">
                            <span class="bg-accent text-white text-xs px-2 py-1 rounded-full">Praca</span>
                            <span class="bg-accent text-white text-xs px-2 py-1 rounded-full">Relacje</span>
                            <span class="bg-accent text-white text-xs px-2 py-1 rounded-full">Zdrowie</span>
                        </div>
                        <img src="/images/emotion4.png" alt="Zadowolony" class="w-6 md:w-8 pointer-events-none">
                    </div>
                    <p class="text-gray-700 text-sm md:text-base">
                        Dzisiaj był naprawdę dobry dzień. Spotkałem się z przyjaciółmi na kawie i rozmawialiśmy o nowych projektach. Czuję się pełen energii i gotowy na nowe wyzwania.
                    </p>
                </div>
                
                <form action="" class="absolute top-2 right-2 flex gap-1" method="POST">
                    <!-- Templatka - do poprawy -->
                    <!-- route('emotions.journal.edit', $entry->id) }}-->
                    <a href="/emotions/journal/addnew" class="cursor-pointer hover:bg-blue-500 w-4 h-4 bg-blue-400 text-white rounded-full p-4 grid place-content-center transition duration-300"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button type="submit" class="cursor-pointer hover:bg-red-800 w-4 h-4 bg-red-700 text-white rounded-full p-4 grid place-content-center transition duration-300"><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </div>

            <!-- Wpis 08.04.2025 -->
            <div class="bg-bg-tint p-4 rounded-xl shadow flex justify-between items-start relative">
                <div>
                    <div class=" text-gray-500 mb-2 flex flex-col sm:flex-row sm:items-center gap-2">
                        <div>
                            <i class="fa-solid fa-calendar-days text-accent text-lg md:text-xl mr-1"></i>
                            <span class="font-semibold text-xs md:text-sm">08.04.2025</span>
                        </div>
                        <div class="flex gap-2 flex-wrap">
                            <span class="bg-accent text-white text-xs px-2 py-1 rounded-full">Studia</span>
                        </div>
                        <img src="/images/emotion1.png" alt="Zadowolony" class="w-6 md:w-8 pointer-events-none">
                    </div>
                    <p class="text-gray-700 text-sm md:text-base">Zajęcia na uczelni były męczące</p>
                </div>
                <form action="" class="absolute top-2 right-2 flex gap-1" method="POST">
                    <!-- Templatka - do poprawy -->
                    <!-- route('emotions.journal.edit', $entry->id) }}-->
                    <a href="/emotions/journal/addnew" class="cursor-pointer hover:bg-blue-500 w-4 h-4 bg-blue-400 text-white rounded-full p-4 grid place-content-center transition duration-300"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button type="submit" class="cursor-pointer hover:bg-red-800 w-4 h-4 bg-red-700 text-white rounded-full p-4 grid place-content-center transition duration-300"><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </div>

            <!-- Wpis 07.04.2025 -->
            <div class="bg-bg-tint p-4 rounded-xl shadow flex justify-between items-start relative">
                <div>
                    <div class=" text-gray-500 mb-2 flex flex-col sm:flex-row sm:items-center gap-2">
                        <div>
                            <i class="fa-solid fa-calendar-days text-accent text-lg md:text-xl mr-1"></i>
                            <span class="font-semibold text-xs md:text-sm">07.04.2025</span>
                        </div>
                        <div class="flex gap-2 flex-wrap">
                            <span class="bg-accent text-white text-xs px-2 py-1 rounded-full">Studia</span>
                            <span class="bg-accent text-white text-xs px-2 py-1 rounded-full">Zdrowie</span>
                        </div>
                        <img src="/images/emotion5.png" alt="Zadowolony" class="w-6 md:w-8 pointer-events-none">
                    </div>
                    <p class="text-gray-700 text-sm md:text-base">
                        Dzisiaj był naprawdę dobry dzień. Zajęcia były krótkie i miałem dużo czasu dla siebie
                    </p>
                </div>
                <form action="" class="absolute top-2 right-2 flex gap-1" method="POST">
                    <!-- Templatka - do poprawy -->
                    <!-- route('emotions.journal.edit', $entry->id) }}-->
                    <a href="/emotions/journal/addnew" class="cursor-pointer hover:bg-blue-500 w-4 h-4 bg-blue-400 text-white rounded-full p-4 grid place-content-center transition duration-300"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button type="submit" class="cursor-pointer hover:bg-red-800 w-4 h-4 bg-red-700 text-white rounded-full p-4 grid place-content-center transition duration-300"><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>