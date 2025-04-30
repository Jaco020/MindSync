<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="overflow-hidden">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="fixed w-[350px] h-screen overflow-y-auto bg-bg-secondary py-10 px-7">
            <a href="/dashboard" class="block text-4xl text-center font-semibold mb-10">Mind<span
                    class="text-accent">Sync</span></a>
            <div class="mb-6 bg-bg-tint rounded-xl p-4 flex justify-between items-center cursor-pointer">
                <div>
                    <p class="text-sm font-semibold">Jakub</p>
                    <p class="text-xs text-gray-500">49348@student.umg.edu.pl</p>
                </div>
                <i class="fa-solid fa-chevron-down text-gray-500"></i>
            </div>
            <nav class="space-y-4">
                <a href="/dashboard" class="block py-3 px-4 bg-accent text-white rounded-2xl border-2 border-bg-secondary">
                    <i class="fa-solid fa-chart-simple mr-2"></i>Dashboard
                </a>
                <a href="/emotion_journal" class="block py-2 px-4 text-gray-500 hover:border-accent hover:text-accent border-2 border-bg-secondary rounded-lg">
                    <i class="fa-solid fa-book-open mr-2"></i>Dziennik nastroju
                </a>
                <a href="/mind_exercises" class="block py-2 px-4 text-gray-500 hover:border-accent hover:text-accent border-2 border-bg-secondary rounded-lg">
                    <i class="fa-solid fa-spa mr-2"></i>Ćwiczenia mindfulness
                </a>
                <a href="/chatbot" class="block py-2 px-4 text-gray-500 hover:border-accent hover:text-accent border-2 border-bg-secondary rounded-lg">
                    <i class="fa-solid fa-spa mr-2"></i>Chatbot wsparcia
                </a>
                <a href="/emotions_raport" class="block py-2 px-4 text-gray-500 hover:border-accent hover:text-accent border-2 border-bg-secondary rounded-lg">
                    <i class="fa-solid fa-face-laugh mr-2"></i> Analiza emocji
                </a>
            </nav>
            <form action="{{ route('logout') }}" method="POST" class="absolute bottom-10">
                @csrf
                <button type="submit" class="w-full text-left px-4 text-gray-500 cursor-pointer hover:text-red-400 border-2 border-bg-secondary">
                    <i class="fas fa-sign-out-alt mr-2"></i> Wyloguj się
                </button>
            </form>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-[350px] h-screen overflow-y-auto p-6 space-y-6">
            <div class="bg-bg-tint p-6 px-10 rounded-xl">
                <h2 class="text-2xl font-semibold text-header-gray">Miłego Poranka, Jakub 👋</h2>
                <p class="text-gray-500">Powodzenia w kontynuacji twojej 14 dniowej passy medytacji</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-bg-tint p-6 rounded-xl text-center">
                    <p class="text-sm text-gray-500">Twój średni nastrój</p>
                    <div class="mt-4 text-2xl font-bold text-teal-600">70%</div>
                </div>
                <div class="bg-bg-tint p-6 rounded-xl text-center">
                    <p class="text-sm text-gray-500">Streak aktywnych dni</p>
                    <div class="mt-4 text-2xl font-bold text-teal-600">14</div>
                </div>
                <div class="bg-bg-tint p-6 rounded-xl text-center">
                    <p class="text-sm text-gray-500">Twoje wpisy</p>
                    <div class="mt-4 text-2xl font-bold text-teal-600">253</div>
                </div>
                <div class="bg-bg-tint p-6 rounded-xl text-center">
                    <p class="text-sm text-gray-500">Twoje wpisy</p>
                    <div class="mt-4 text-2xl font-bold text-teal-600">253</div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 h-100">
                <div class="bg-bg-tint p-6 rounded-xl col-span-3">
                    <p class="text-sm text-gray-500 mb-2">Wykres nastroju z ostatnich 30 dni</p>
                    <div class="bg-gradient-to-b from-teal-300 to-white rounded">
                        <canvas id="moodChart"></canvas>
                    </div>
                </div>
                <div class="grid grid-rows-2 h-full gap-6">
                    <div class="bg-bg-tint p-4 rounded-xl">
                        <h3 class="text-md font-semibold">Porada #1</h3>
                        <p class="text-sm text-gray-500">Lorem Ipsum dolore set amet ipsum randon, lorus deus machina...
                        </p>
                    </div>
                    <div class="bg-bg-tint p-4 rounded-xl">
                        <h3 class="text-md font-semibold">Odnośnik #2</h3>
                        <p class="text-sm text-gray-500">Informacja o odnośniku</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 h-100">
                <div class="bg-bg-tint p-6 rounded-xl col-span-3">
                    <p class="text-sm text-gray-500 mb-2">Wykres nastroju z ostatnich 30 dni</p>
                    <div class="bg-gradient-to-b from-teal-300 to-white rounded">
                        <canvas id="moodChart"></canvas>
                    </div>
                </div>
                <div class="grid grid-rows-2 h-full gap-6">
                    <div class="bg-bg-tint p-4 rounded-xl">
                        <h3 class="text-md font-semibold">Porada #1</h3>
                        <p class="text-sm text-gray-500">Lorem Ipsum dolore set amet ipsum randon, lorus deus machina...
                        </p>
                    </div>

                    <div class="bg-bg-tint p-4 rounded-xl">
                        <h3 class="text-md font-semibold">Odnośnik #2</h3>
                        <p class="text-sm text-gray-500">Informacja o odnośniku</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>