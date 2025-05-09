<div id="asideWrapper" class="mr-[60px] xsm:mr-[80px] 2lg:mr-[300px] 2xl:mr-[350px]">
    <!-- Sidebar -->
    <aside class="fixed w-[300px] 2xl:w-[350px] h-screen overflow-y-auto bg-bg-secondary py-10 px-7 hidden 2lg:block">
        <a href="/" class="block text-4xl text-center font-semibold mb-10">
            Mind<span class="text-accent">Sync</span>
        </a>
        <a href="/settings" class="mb-6 bg-bg-tint rounded-xl p-4 flex justify-between items-center cursor-pointer hover:ring-2 hover:ring-accent transition duration-300 relative">
            <div class="ml-6">
                <p class="text-sm font-semibold">{{$userName}}</p>
                <p class="text-xs text-gray-500">{{$email}}</p>
            </div>
            <i class="fa-solid fa-chevron-right text-gray-500"></i>
            <i class="fa-solid fa-user absolute text-accent"></i>
        </a>
        <nav class="space-y-4">
            <a href="/dashboard"
            class="block py-3 px-4 rounded-2xl border-bg-secondary
                    {{ Request::is('dashboard') ? 'bg-accent text-white' : 'text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent' }}">
                <i class="fa-solid fa-chart-simple mr-2"></i>Dashboard
            </a>

            <a href="/emotions/journal"
            class="block py-2 px-4 rounded-lg transition duration-300
                    {{ Request::is('emotions/journal') ? 'bg-accent text-white' : 'text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent' }}">
                <i class="fa-solid fa-book-open mr-2"></i>Dziennik nastroju
            </a>

            <a href="/mindExercises"
            class="block py-2 px-4 rounded-lg transition duration-300
                    {{ Request::is('mindExercises') ? 'bg-accent text-white' : 'text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent' }}">
                <i class="fa-solid fa-spa mr-2"></i>Ćwiczenia mindfulness
            </a>

            <a href="/chatbot"
            class="block py-2 px-4 rounded-lg transition duration-300
                    {{ Request::is('chatbot') ? 'bg-accent text-white' : 'text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent' }}">
                <i class="fa-solid fa-message mr-2"></i>Chatbot wsparcia
            </a>

            <a href="/emotions/report"
            class="block py-2 px-4 rounded-lg transition duration-300
                    {{ Request::is('emotions/report') ? 'bg-accent text-white' : 'text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent' }}">
                <i class="fa-solid fa-face-laugh mr-2"></i>Analiza emocji
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
    <div class="fixed left-0 top-0 bottom-0 z-50 2lg:hidden ">
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
                    <a href="/dashboard" class="block rounded-xl p-2 cursor-pointer transition duration-300
                    {{ Request::is('dashboard') ? 'bg-accent text-white' : 'text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent' }}">
                        <i class="fa-solid fa-chart-simple"></i>
                    </a>
                    <div class="fixed z-50 left-[80px] top-auto whitespace-nowrap text-sm bg-gray-800 text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">Dashboard</div>
                </div>
                <div class="relative group">
                    <a href="/emotions/journal" class="block rounded-xl p-2 cursor-pointer
                    {{ Request::is('emotions/journal') ? 'bg-accent text-white' : 'text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent' }}">
                        <i class="fa-solid fa-book-open"></i>
                    </a>
                    <div class="fixed z-50 left-[80px] top-auto whitespace-nowrap text-sm bg-gray-800 text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">Dziennik nastroju</div>
                </div>
                <div class="relative group">
                    <a href="/mindExercises" class="block rounded-xl p-2 cursor-pointer
                    {{ Request::is('mindExercises') ? 'bg-accent text-white' : 'text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent' }}">
                        <i class="fa-solid fa-spa"></i>
                    </a>
                    <div class="fixed z-50 left-[80px] top-auto whitespace-nowrap text-sm bg-gray-800 text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">Ćwiczenia mindfulness</div>
                </div>
                <div class="relative group">
                    <a href="/chatbot" class="block rounded-xl p-2 cursor-pointer
                    {{ Request::is('chatbot') ? 'bg-accent text-white' : 'text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent' }}">
                        <i class="fa-solid fa-message"></i>
                    </a>
                    <div class="fixed z-50 left-[80px] top-auto whitespace-nowrap text-sm bg-gray-800 text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">Chatbot wsparcia</div>
                </div>
                <div class="relative group">
                    <a href="/emotions/report" class="block rounded-xl p-2 cursor-pointer
                    {{ Request::is('emotions/report') ? 'bg-accent text-white' : 'text-gray-500 hover:ring-2 hover:ring-accent hover:text-accent' }}">
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