<nav class="flex 2md:flex-row flex-col justify-between items-center space-y-3 py-5 w-full">
        <a href="/" class="font-semibold text-4xl">Mind<span class="text-accent">Sync</span></a>

        <div class="flex flex-wrap justify-center items-center space-x-2 bg-bg-secondary p-3 rounded-xl">
            <a href="/admin/users/list"
            class="asideLink {{ Request::is('admin', 'admin/users/*') ? 'asideLink--active' : 'asideLink--normal' }}">
                <i class="mr-2 fa-solid fa-user"></i>Użytkownicy
            </a>
            <a href="/admin/exercises/list"
            class="asideLink {{ Request::is('admin/exercises/*') ? 'asideLink--active' : 'asideLink--normal' }}">
                <i class="mr-2 fa-solid fa-spa"></i>Ćwiczenia
            </a>
        </div>
        
        <form action="{{ route('logout') }}" method="POST" class="">
            @csrf
            <button type="submit" class="bg-accent px-5 py-3 rounded-2xl text-white duration-300 ease-linear hover:bg-accent-strong cursor-pointer">
                <i class="mr-2 fas fa-sign-out-alt"></i> Wyloguj się
            </button>
        </form>

       
</nav>