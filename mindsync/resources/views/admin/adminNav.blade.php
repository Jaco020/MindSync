<nav class="py-5 w-full flex justify-between items-center">
        <a href="/" class="text-4xl font-semibold">Mind<span class="text-accent">Sync</span></a>

        <div class="flex items-center bg-bg-secondary rounded-xl p-3 space-x-2">
            <a href="/users/list"
            class="asideLink {{ Request::is('users/*') ? 'asideLink--active' : 'asideLink--normal' }}">
                <i class="mr-2 fa-solid fa-user"></i>Użytkownicy
            </a>
            <a href="/emotions/list"
            class="asideLink {{ Request::is('emotions/*') ? 'asideLink--active' : 'asideLink--normal' }}">
                <i class="mr-2 fa-solid fa-face-laugh"></i>Emocje
            </a>
            <a href="/exercises/list"
            class="asideLink {{ Request::is('exercises/*') ? 'asideLink--active' : 'asideLink--normal' }}">
                <i class="mr-2 fa-solid fa-spa"></i>Ćwiczenia
            </a>
        </div>
        
        <form action="{{ route('logout') }}" method="POST" class="">
            @csrf
            <button type="submit" class="bg-accent text-white rounded-2xl px-5 py-3 hover:bg-accent-strong ease-linear duration-300 cursor-pointer">
                <i class="mr-2 fas fa-sign-out-alt"></i> Wyloguj się
            </button>
        </form>

       
</nav>