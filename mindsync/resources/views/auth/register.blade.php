<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Rejestracja</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>
<body class="relative min-h-screen overflow-hidden">
    <nav class="py-5 w-full text-left px-[5%]">
        <a href="/" class="text-4xl font-semibold">Mind<span class="text-accent">Sync</span></a>
    </nav>

    <div class="w-[90%] md:w-[500px] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 ">
        <img src="/images/grow.svg" alt="Dekoracja dolna lewa" class="absolute bottom-[-10%] left-[-45%] lg:bottom-[-10%] lg:left-[-65%] w-[0px] md:w-[300px] lg:w-[400px] z-0! pointer-events-none">
        <img src="/images/mood.svg" alt="Dekoracja górna prawa" class="absolute bottom-[-10%] right-[-45%] lg:bottom-[-10%] lg:right-[-70%] w-[0px] md:w-[300px] lg:w-[400px] z-0 pointer-events-none">
        <form id="RegisterForm" method="POST" action="/register" class="z-50 flex flex-col items-center justify-center bg-bg-secondary opacity-85 rounded-2xl p-8 shadow-lg space-y-5" >
            <h4 class="text-primary text-2xl font-semibold text-accent-strong mb-2">Rozpocznij swoją podróż</h4>
            <p class="text-sm text-gray-600">Załóż konto podając odpowiednie dane</p>

            <div class="w-full relative">
                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-teal-500">
                    <i class="fas fa-user"></i>
                </span>
                <input type="text" name="login" placeholder="Login" required
                    class="pl-10 pr-4 py-3 w-full rounded-xl bg-gray-100 focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>

            <div class="w-full relative">
                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-teal-500">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <input type="text" name="email" placeholder="Adres email" required
                    class="pl-10 pr-4 py-3 w-full rounded-xl bg-gray-100 focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>

            
    
            <div class="w-full relative">
                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-teal-500">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="password" placeholder="Hasło" required
                    class="pl-10 pr-4 py-3 w-full rounded-xl bg-gray-100 focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>
            <div class="w-full relative">
                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-teal-500">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="passwordRepeat" placeholder="Powtórz hasło" required
                    class="pl-10 pr-4 py-3 w-full rounded-xl bg-gray-100 focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>
    
            <div class="w-full flex justify-between items-center text-sm text-gray-600">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" id="rememberMe" name="rememberMe" class="accent-teal-500">
                    <span>Akceptuję Regulamin</span>
                </label>
            </div>
    
            <button type="submit"
                class="w-full bg-teal-400 text-white py-3 rounded-xl hover:bg-teal-500 transition-all font-semibold cursor-pointer">
                Zarejestruj się
            </button>
    
            <p class="text-sm text-gray-600">Masz już konto? <a href="/login" class="text-teal-500 hover:underline">Zaloguj się</a></p>
        </form>
    </div>
</body>
</html>