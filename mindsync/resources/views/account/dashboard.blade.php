<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="overflow-x-hidden flex min-h-screen">
    <!-- Sidebar -->
    <aside class="fixed w-[300px] 2xl:w-[350px] h-screen overflow-y-auto bg-bg-secondary py-10 px-7 hidden 2lg:block">
        <a href="/dashboard" class="block text-4xl text-center font-semibold mb-10">
            Mind<span class="text-accent">Sync</span>
        </a>
        <a href="/settings" class="mb-6 bg-bg-tint rounded-xl p-4 flex justify-between items-center cursor-pointer hover:ring-2 hover:ring-accent transition duration-300 relative">
            <div class="ml-6">
                <p class="text-sm font-semibold">Jakub</p>
                <p class="text-xs text-gray-500">49348@student.umg.edu.pl</p>
            </div>
            <i class="fa-solid fa-chevron-right text-gray-500"></i>
            <i class="fa-solid fa-user absolute text-accent"></i>
        </a>
        <nav class="space-y-4">
            <a href="/dashboard" class="block py-3 px-4 bg-accent text-white rounded-2xl border-bg-secondary">
                <i class="fa-solid fa-chart-simple mr-2"></i>Dashboard
            </a>
            <a href="/emotion_journal" class="block py-2 px-4 text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent rounded-lg transition duration-300">
                <i class="fa-solid fa-book-open mr-2"></i>Dziennik nastroju
            </a>
            <a href="/mind_exercises" class="block py-2 px-4 text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent rounded-lg transition duration-300">
                <i class="fa-solid fa-spa mr-2"></i>Ćwiczenia mindfulness
            </a>
            <a href="/chatbot" class="block py-2 px-4 text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent rounded-lg transition duration-300">
                <i class="fa-solid fa-message mr-2"></i>Chatbot wsparcia
            </a>
            <a href="/emotions_raport" class="block py-2 px-4 text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent rounded-lg transition duration-300">
                <i class="fa-solid fa-face-laugh mr-2"></i> Analiza emocji
            </a>
        </nav>
        <form action="{{ route('logout') }}" method="POST" class="absolute bottom-10">
            @csrf
            <button type="submit" class="w-full text-left px-4 text-gray-500 cursor-pointer hover:text-red-400">
                <i class="fas fa-sign-out-alt mr-2"></i> Wyloguj się
            </button>
        </form>
    </aside>
    
    <!-- Mobile Sidebar -->
    <div class="fixed left-0 top-0 bottom-0 z-50 2lg:hidden">
        <aside id="asideMobile" class="w-[60px] xsm:w-[80px] h-screen overflow-y-auto bg-bg-secondary xsm:px-2 py-10 text-center">
            <a href="/dashboard" class="block font-semibold mb-10 leading-none text-xl">
                Mind
                <span class="text-accent">Sync</span>
            </a>
            <div class="space-y-2 w-[50px] m-auto">
                <div class="relative group">
                    <a href="/settings" class="block bg-bg-tint rounded-xl p-2 cursor-pointer hover:ring-2 hover:ring-accent transition duration-300">
                        <i class="fa-solid fa-user text-accent"></i>
                    </a>
                    <div class="fixed z-50 left-[80px] top-auto whitespace-nowrap text-sm bg-gray-800 text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">Ustawienia</div>
                </div>
                <div class="relative group">
                    <a href="/dashboard" class="block rounded-xl p-2 bg-accent text-white border-bg-secondary">
                        <i class="fa-solid fa-chart-simple"></i>
                    </a>
                    <div class="fixed z-50 left-[80px] top-auto whitespace-nowrap text-sm bg-gray-800 text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">Dashboard</div>
                </div>
                <div class="relative group">
                    <a href="/emotion_journal" class="block rounded-xl p-2 cursor-pointer text-gray-500 hover:ring-2 hover:ring-accent transition duration-300">
                        <i class="fa-solid fa-book-open"></i>
                    </a>
                    <div class="fixed z-50 left-[80px] top-auto whitespace-nowrap text-sm bg-gray-800 text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">Dziennik nastroju</div>
                </div>
                <div class="relative group">
                    <a href="/mind_exercises" class="block rounded-xl p-2 cursor-pointer text-gray-500 hover:ring-2 hover:ring-accent transition duration-300">
                        <i class="fa-solid fa-spa"></i>
                    </a>
                    <div class="fixed z-50 left-[80px] top-auto whitespace-nowrap text-sm bg-gray-800 text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">Ćwiczenia mindfulness</div>
                </div>
                <div class="relative group">
                    <a href="/chatbot" class="block rounded-xl p-2 cursor-pointer text-gray-500 hover:ring-2 hover:ring-accent transition duration-300">
                        <i class="fa-solid fa-message"></i>
                    </a>
                    <div class="fixed z-50 left-[80px] top-auto whitespace-nowrap text-sm bg-gray-800 text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">Chatbot wsparcia</div>
                </div>
                <div class="relative group">
                    <a href="/emotions_raport" class="block rounded-xl p-2 cursor-pointer text-gray-500 hover:ring-2 hover:ring-accent transition duration-300">
                        <i class="fa-solid fa-face-laugh"></i>
                    </a>
                    <div class="fixed z-50 left-[80px] top-auto whitespace-nowrap text-sm bg-gray-800 text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">Analiza emocji</div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="absolute bottom-10 left-1/2 -translate-x-1/2">
                @csrf
                <div class="relative group">
                    <button type="submit" class="w-[50px] cursor-pointer text-gray-500 hover:text-red-400">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                    <div class="fixed z-50 left-[80px] top-auto whitespace-nowrap text-sm bg-gray-800 text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">Wyloguj</div>
                </div>
            </form>
        </aside>
    </div>

    <!-- Main Content -->
    <main class="flex-1 ml-[60px] xsm:ml-[80px] 2lg:ml-[300px] 2xl:ml-[350px] h-screen overflow-y-auto  p-2 md:p-10 space-y-6">
        <div class="bg-bg-tint p-6 md:px-15 rounded-xl relative overflow-hidden">
            <h2 class="text-xl md:text-2xl 2xl:text-3xl font-semibold text-header-gray">Miłego Poranka, Jakub 👋</h2>
            <p class="text-gray-500 mt-2 text-sm md:text-base">Powodzenia w kontynuacji twojej 14 dniowej passy medytacji</p>
            <img src="/images/leaf1.svg" class="absolute left-[-100%] md:left-[-111px] top-[-104px] z-3" alt="leaf1">   
            <img src="/images/leaf2.svg" class="absolute left-[596px] top-[-75px]" alt="leaf2 z-1">   
            <img src="/images/leaf3.svg" class="absolute right-[-200%] 2xl:right-0! bottom-[-110px] z-0" alt="leaf3">   
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-4 gap-6 min-h-60">
            <div class="bg-bg-tint p-6 rounded-xl text-center ">
                <p class="text-lg md:text-xl 2xl:text-2xl text-header-gray font-semibold">Twój średni nastrój</p>
                <div class="text-4xl md:text-5xl 2xl:text-6xl font-bold text-accent mt-4 2xl:mt-10">70%</div>
            </div>
            <div class="bg-bg-tint p-6 rounded-xl text-center">
                <p class="text-lg md:text-xl 2xl:text-2xl text-header-gray font-semibold">Streak aktywnych dni</p>
                <div class="text-4xl md:text-5xl 2xl:text-6xl font-bold text-accent mt-4 2xl:mt-10">14</div>
            </div>
            <div class="bg-bg-tint p-6 rounded-xl text-center relative overflow-y-hidden">
                <p class="text-lg md:text-xl 2xl:text-2xl text-header-gray font-semibold">Twoje wpisy</p>
                <div class="text-4xl md:text-5xl 2xl:text-6xl font-bold text-accent mt-4 2xl:mt-10">253</div>
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
     <script>
        // Upewnij się, że tooltips są zawsze widoczne w viewport
        document.addEventListener("DOMContentLoaded", function() {
            const groups = document.querySelectorAll(".group");
            
            groups.forEach(group => {
                group.addEventListener("mouseenter", function() {
                    const tooltip = this.querySelector("div[class*='fixed']");
                    if (tooltip) {
                        // Pobierz pozycję przycisku
                        const button = this.querySelector("a, button");
                        const buttonRect = button.getBoundingClientRect();
                        
                        // Ustaw pozycję tooltipa względem przycisku
                        tooltip.style.top = (buttonRect.top + buttonRect.height/2 - tooltip.offsetHeight/2) + "px";
                    }
                });
            });
        });
    </script>
</body>

</html>