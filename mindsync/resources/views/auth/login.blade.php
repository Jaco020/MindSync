<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Logowanie</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>
<body class="relative min-h-screen overflow-hidden">
    <nav class="py-5 w-full text-left px-[5%]">
        <a href="/" class="text-4xl font-semibold">Mind<span class="text-accent">Sync</span></a>
    </nav>

    <div class="w-[90%] md:w-[500px] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 ">
        <img src="/images/trees.svg" alt="Dekoracja dolna lewa" class="absolute bottom-[-204px] left-[-45%] lg:bottom-[-265px] lg:left-[-60%] w-[0px] md:w-[300px] lg:w-[400px] z-0! pointer-events-none">
        <img src="/images/meditation.svg" alt="Dekoracja górna prawa" class="absolute top-[-204px] right-[-45%] lg:top-[-224px] lg:right-[-65%] w-[0px] md:w-[300px] lg:w-[400px] z-0 pointer-events-none">
        <form id="loginForm" method="POST" action="/login" class="z-50 flex flex-col items-center justify-center bg-bg-secondary opacity-85 rounded-2xl p-8 shadow-lg space-y-5" >
            @csrf
            <h4 class="text-primary text-2xl font-semibold text-accent-strong mb-2">Witaj ponownie</h4>
            <p class="text-sm text-gray-600">Wprowadź swoje dane aby móc się zalogować</p>
            
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 w-full">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <div class="w-full">
                <div class="relative">
                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-teal-500">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Adres email"
                        class="pl-10 pr-4 py-3 w-full rounded-xl bg-gray-100 focus:outline-none focus:ring-2 focus:ring-teal-400 @error('email') border-red-500 @enderror">
                </div>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="w-full">
                <div class="relative">
                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-teal-500">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" name="password" placeholder="Hasło"
                        class="pl-10 pr-4 py-3 w-full rounded-xl bg-gray-100 focus:outline-none focus:ring-2 focus:ring-teal-400 @error('password') border-red-500 @enderror">
                </div>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <button type="submit"
                class="w-full bg-teal-400 text-white py-3 rounded-xl hover:bg-teal-500 transition-all font-semibold cursor-pointer">
                Zaloguj się
            </button>
    
            <p class="text-sm text-gray-600">Nie masz konta? <a href="/register" class="text-teal-500 hover:underline">Dołącz teraz!</a></p>
        </form>
    </div>
</body>
</html>