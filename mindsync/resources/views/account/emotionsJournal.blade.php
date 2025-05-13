<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Dziennik Nastroju</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="flex min-h-screen overflow-x-hidden">
    @include('partials.aside')
    <main class="flex-1 space-y-6 p-2 md:p-10 h-screen overflow-y-auto">

        <div class="relative flex sm:flex-row flex-col sm:justify-between sm:items-center bg-bg-tint p-6 md:px-15 rounded-xl overflow-hidden">
            <div>
                <h2 class="text-xl md:text-2xl 2xl:text-3xl">Dziennik nastroju</h2>
                <p class="mt-2 text-gray-500 text-sm md:text-base">Monitoruj i opisuj swój nastrój</p>
            </div>
            <a href="/emotions/journal/addnew" class="bg-accent mt-4 sm:mt-0 px-4 py-2 rounded-2xl text-white transition duration-300 hover:bg-accent-strong cursor-pointer">
                    Nowy wpis
            </a>
            <img src="/images/leaf1.svg" class="top-[-104px] left-[-100%] md:left-[-111px] z-3 absolute pointer-events-none" alt="leaf1">   
        </div>

        <h2 class="ml-[1%] sm:ml-1 md:text-x text-base sm:text-lg">Wpisy (3)</h2>

        <div class="space-y-4">
            <!-- Wpis 09.04.2025 -->
            <div class="relative flex justify-between items-start bg-bg-tint shadow p-4 rounded-xl">
                <div>
                    <div class="flex sm:flex-row flex-col sm:items-center gap-2 mb-2 text-gray-500">
                        <div>
                            <i class="mr-1 text-accent text-lg md:text-xl fa-solid fa-calendar-days"></i>
                            <span class="font-semibold text-xs md:text-sm">09.04.2025</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-accent px-2 py-1 rounded-full text-white text-xs">Praca</span>
                            <span class="bg-accent px-2 py-1 rounded-full text-white text-xs">Relacje</span>
                            <span class="bg-accent px-2 py-1 rounded-full text-white text-xs">Zdrowie</span>
                        </div>
                        <img src="/images/emotion4.png" alt="Zadowolony" class="w-6 md:w-7 pointer-events-none">
                    </div>
                    <p class="text-gray-700 text-sm md:text-base">
                        Dzisiaj był naprawdę dobry dzień. Spotkałem się z przyjaciółmi na kawie i rozmawialiśmy o nowych projektach. Czuję się pełen energii i gotowy na nowe wyzwania.
                    </p>
                </div>
                
                <form action="" class="top-2 right-2 absolute flex gap-1" method="POST">
                    <!-- Templatka - do poprawy -->
                    <!-- route('emotions.journal.edit', $entry->id) }}-->
                    <a href="/emotions/journal/addnew" class="place-content-center grid bg-blue-400 hover:bg-blue-500 p-4 rounded-full w-4 h-4 text-white transition duration-300 cursor-pointer"><i class="fa-pen-to-square fa-solid"></i></a>
                    <button type="submit" class="place-content-center grid bg-red-700 hover:bg-red-800 p-4 rounded-full w-4 h-4 text-white transition duration-300 cursor-pointer"><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </div>

            <!-- Wpis 08.04.2025 -->
            <div class="relative flex justify-between items-start bg-bg-tint shadow p-4 rounded-xl">
                <div>
                    <div class="flex sm:flex-row flex-col sm:items-center gap-2 mb-2 text-gray-500">
                        <div>
                            <i class="mr-1 text-accent text-lg md:text-xl fa-solid fa-calendar-days"></i>
                            <span class="font-semibold text-xs md:text-sm">08.04.2025</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-accent px-2 py-1 rounded-full text-white text-xs">Studia</span>
                        </div>
                        <img src="/images/emotion1.png" alt="Zadowolony" class="w-6 md:w-7 pointer-events-none">
                    </div>
                    <p class="text-gray-700 text-sm md:text-base">Zajęcia na uczelni były męczące</p>
                </div>
                <form action="" class="top-2 right-2 absolute flex gap-1" method="POST">
                    <!-- Templatka - do poprawy -->
                    <!-- route('emotions.journal.edit', $entry->id) }}-->
                    <a href="/emotions/journal/addnew" class="place-content-center grid bg-blue-400 hover:bg-blue-500 p-4 rounded-full w-4 h-4 text-white transition duration-300 cursor-pointer"><i class="fa-pen-to-square fa-solid"></i></a>
                    <button type="submit" class="place-content-center grid bg-red-700 hover:bg-red-800 p-4 rounded-full w-4 h-4 text-white transition duration-300 cursor-pointer"><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </div>

            <!-- Wpis 07.04.2025 -->
            <div class="relative flex justify-between items-start bg-bg-tint shadow p-4 rounded-xl">
                <div>
                    <div class="flex sm:flex-row flex-col sm:items-center gap-2 mb-2 text-gray-500">
                        <div>
                            <i class="mr-1 text-accent text-lg md:text-xl fa-solid fa-calendar-days"></i>
                            <span class="font-semibold text-xs md:text-sm">07.04.2025</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-accent px-2 py-1 rounded-full text-white text-xs">Studia</span>
                            <span class="bg-accent px-2 py-1 rounded-full text-white text-xs">Zdrowie</span>
                        </div>
                        <img src="/images/emotion5.png" alt="Zadowolony" class="w-6 md:w-7 pointer-events-none">
                    </div>
                    <p class="text-gray-700 text-sm md:text-base">
                        Dzisiaj był naprawdę dobry dzień. Zajęcia były krótkie i miałem dużo czasu dla siebie
                    </p>
                </div>
                <form action="" class="top-2 right-2 absolute flex gap-1" method="POST">
                    <!-- Templatka - do poprawy -->
                    <!-- route('emotions.journal.edit', $entry->id) }}-->
                    <a href="/emotions/journal/addnew" class="place-content-center grid bg-blue-400 hover:bg-blue-500 p-4 rounded-full w-4 h-4 text-white transition duration-300 cursor-pointer"><i class="fa-pen-to-square fa-solid"></i></a>
                    <button type="submit" class="place-content-center grid bg-red-700 hover:bg-red-800 p-4 rounded-full w-4 h-4 text-white transition duration-300 cursor-pointer"><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>