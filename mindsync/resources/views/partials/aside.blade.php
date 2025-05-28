<div id="asideWrapper" class="mr-[60px] xsm:mr-[80px] 2lg:mr-[300px] 2xl:mr-[350px]">
    <!-- Sidebar -->
    <aside class="hidden 2lg:block fixed bg-bg-secondary px-7 py-10 w-[300px] 2xl:w-[350px] h-screen overflow-y-auto">
        <a href="/" class="block mb-10 font-semibold text-4xl text-center">
            Mind<span class="text-accent">Sync</span>
        </a>
        <a href="/settings" class=" mb-6 bg-bg-tint rounded-xl p-4 flex justify-between items-center cursor-pointer hover:ring-2 hover:ring-accent transition duration-300 relative">
            <div class="ml-6">
                <p class="font-semibold text-sm">{{$userName}}</p>
                <p class="text-gray-500 text-xs">{{$email}}</p>
            </div>
            <i class="fa-chevron-right text-gray-500 fa-solid"></i>
            <i class="absolute text-accent fa-solid fa-user"></i>
        </a>
        <nav class="space-y-4">
            <a href="/dashboard"
            class="asideLink {{ Request::is('dashboard') ? 'asideLink--active' : 'asideLink--normal' }}">
                <i class="mr-2 fa-solid fa-chart-simple"></i>Dashboard
            </a>

            <a href="/emotions/journal"
            class="asideLink {{ Request::is('emotions/journal*') ? 'asideLink--active' : 'asideLink--normal' }}">
                <i class="mr-2 fa-solid fa-book-open"></i>Dziennik nastroju
            </a>

            <a href="/mindfullness/exercises"
            class="asideLink {{ Request::is('mindfullness*') ? 'asideLink--active' : 'asideLink--normal' }}">
                <i class="mr-2 fa-solid fa-spa"></i>Ćwiczenia mindfulness
            </a>

            <a href="/chatbot"
            class="asideLink {{ Request::is('chatbot') ? 'asideLink--active' : 'asideLink--normal' }}">
                <i class="mr-2 fa-solid fa-message"></i>Chatbot wsparcia
            </a>

            <a href="/emotions/report"
            class="asideLink {{ Request::is('emotions/report') ? 'asideLink--active' : 'asideLink--normal' }}">
                <i class="mr-2 fa-solid fa-face-laugh"></i>Analiza emocji
            </a>
        </nav>

        <form action="{{ route('logout') }}" method="POST" class="bottom-10 absolute">
            @csrf
            <button type="submit" class="px-4 w-full text-gray-500 hover:text-red-400 text-left cursor-pointer">
                <i class="mr-2 fas fa-sign-out-alt"></i> Wyloguj się
            </button>
        </form>
    </aside>
    
    <!-- Mobile Sidebar -->
    <div class="2lg:hidden top-0 bottom-0 left-0 z-50 fixed">
        <aside id="asideMobile" class="bg-bg-secondary xsm:px-2 py-10 w-[60px] xsm:w-[80px] h-screen overflow-y-auto text-center">
            <a href="/dashboard" class="block mb-10 font-semibold text-xl leading-none">
                Mind
                <span class="text-accent">Sync</span>
            </a>
            <div class="space-y-2 m-auto w-[50px]">
                <div class="group relative">
                    <a href="/settings" class="block bg-bg-tint p-2 rounded-xl hover:ring-2 hover:ring-accent transition duration-300 cursor-pointer">
                        <i class="text-accent fa-solid fa-user"></i>
                    </a>
                    <div class="top-auto left-[80px] z-50 fixed bg-gray-800 opacity-0 group-hover:opacity-100 px-2 py-1 rounded text-white text-sm whitespace-nowrap transition duration-300 pointer-events-none">Ustawienia</div>
                </div>
                <div class="group relative">
                    <a href="/dashboard" class="block rounded-xl p-2 cursor-pointer
                    {{ Request::is('dashboard') ? 'asideLink--active' : 'asideLink--normal text-gray-500' }}">
                        <i class="fa-solid fa-chart-simple"></i>
                    </a>
                    <div class="top-auto left-[80px] z-50 fixed bg-gray-800 opacity-0 group-hover:opacity-100 px-2 py-1 rounded text-white text-sm whitespace-nowrap transition duration-300 pointer-events-none">Dashboard</div>
                </div>
                <div class="group relative">
                    <a href="/emotions/journal" class="block rounded-xl p-2 cursor-pointer
                    {{ Request::is('emotions/journal*') ? 'asideLink--active' : 'asideLink--normal text-gray-500' }}">
                        <i class="fa-solid fa-book-open"></i>
                    </a>
                    <div class="top-auto left-[80px] z-50 fixed bg-gray-800 opacity-0 group-hover:opacity-100 px-2 py-1 rounded text-white text-sm whitespace-nowrap transition duration-300 pointer-events-none">Dziennik nastroju</div>
                </div>
                <div class="group relative">
                    <a href="/mindExercises" class="block rounded-xl p-2 cursor-pointer
                    {{ Request::is('mindExercises*') ? 'asideLink--active' : 'asideLink--normal text-gray-500' }}">
                        <i class="fa-solid fa-spa"></i>
                    </a>
                    <div class="top-auto left-[80px] z-50 fixed bg-gray-800 opacity-0 group-hover:opacity-100 px-2 py-1 rounded text-white text-sm whitespace-nowrap transition duration-300 pointer-events-none">Ćwiczenia mindfulness</div>
                </div>
                <div class="group relative">
                    <a href="/chatbot" class="block rounded-xl p-2 cursor-pointer
                    {{ Request::is('chatbot') ? 'asideLink--active' : 'asideLink--normal text-gray-500' }}">
                        <i class="fa-solid fa-message"></i>
                    </a>
                    <div class="top-auto left-[80px] z-50 fixed bg-gray-800 opacity-0 group-hover:opacity-100 px-2 py-1 rounded text-white text-sm whitespace-nowrap transition duration-300 pointer-events-none">Chatbot wsparcia</div>
                </div>
                <div class="group relative">
                    <a href="/emotions/report" class="block rounded-xl p-2 cursor-pointer
                    {{ Request::is('emotions/report') ? 'asideLink--active' : 'asideLink--normal text-gray-500' }}">
                        <i class="fa-solid fa-face-laugh"></i>
                    </a>
                    <div class="top-auto left-[80px] z-50 fixed bg-gray-800 opacity-0 group-hover:opacity-100 px-2 py-1 rounded text-white text-sm whitespace-nowrap transition duration-300 pointer-events-none">Analiza emocji</div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="bottom-10 left-1/2 absolute -translate-x-1/2">
                @csrf
                <div class="group relative">
                    <button type="submit" class="w-[50px] text-gray-500 hover:text-red-400 cursor-pointer">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                    <div class="top-auto left-[80px] z-50 fixed bg-gray-800 opacity-0 group-hover:opacity-100 px-2 py-1 rounded text-white text-sm whitespace-nowrap transition duration-300 pointer-events-none">Wyloguj</div>
                </div>
            </form>
        </aside>
    </div>
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
</div>