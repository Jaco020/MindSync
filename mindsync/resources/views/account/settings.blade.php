<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Ustawienia</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="flex min-h-screen overflow-x-hidden">
    @include('partials.aside')
    <main class="flex-1 space-y-6 p-2 md:p-10 h-screen overflow-y-auto">
        <h1 class="text-header-gray text-2xl">Ustawienia</h1>
        <div class="gap-6 grid grid-cols-1 lg:grid-cols-2">
 
            <div class="bg-bg-tint p-6 rounded-md">
                <h2 class="mb-4 pb-2 border-gray-400 border-b-2 font-semibold text-lg">Moje Konto</h2>
                <div class="flex items-center gap-4 mb-4">
                    <div class="bg-gray-300 rounded-full w-16 h-16"></div>
                    <button class="hover:bg-accent px-8 py-1 border border-teal-500 rounded-xl text-teal-500 hover:text-white text-center transition duration-300 cursor-pointer">Zmień</button>
                </div>
                <div class="space-y-3">
                    <div>
                        <label class="text-gray-600 text-sm">Nazwa</label>
                        <input type="text" value="Jakub Selonke" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500">
                    </div>
                    <div class="gap-4 grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <label class="text-gray-600 text-sm">Email</label>
                            <input type="email" value="49348@student.umg.edu.pl" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500" >
                        </div>
                        <div>
                            <label class="text-gray-600 text-sm">Nr telefonu</label>
                            <input type="text" value="111 222 333" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500" >
                        </div>
                        <div>
                            <label class="text-gray-600 text-sm">Data urodzenia</label>
                            <input type="text" value="35.02.1802" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500" >
                        </div>
                        <div>
                            <label class="text-gray-600 text-sm">Płeć</label>
                            <input type="text" value="Mężczyzna" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500" >
                        </div>
                    </div>
                    <div>
                        <label class="text-gray-600 text-sm">Bio</label>
                        <textarea rows="8" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500 resize-none" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum justo neque,Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum justo neque,</textarea>
                    </div>
                    <div class="flex justify-end">
                        <button class="bg-accent mt-2 px-6 py-2 rounded-xl text-white transition duration-300 hover:bg-accent-strong cursor-pointer">Zapisz</button>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <div class="bg-bg-tint p-6 rounded-md">
                    <h2 class="mb-4 pb-2 border-b font-semibold text-lg">Zmień hasło</h2>
                    <div class="space-y-3">
                        <input type="password" placeholder="Stare hasło" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500">
                        <input type="password" placeholder="Nowe hasło" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500">
                        <input type="password" placeholder="Nowe hasło ponownie" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500">
                        <div class="flex justify-end">
                            <button class="bg-accent px-6 py-2 rounded-xl text-white transition duration-300 hover:bg-accent-strong cursor-pointer">Zapisz</button>
                        </div>
                    </div>
                </div>

                <div class="bg-bg-tint p-6 rounded-md">
                    <h2 class="mb-4 pb-2 border-b font-semibold text-lg">Ustawienia prywatności</h2>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="data" class="w-4 h-4 accent-accent">
                            <label for="data" class="text-gray-700 text-sm">Zgoda na przetwarzanie danych</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="notifications" class="w-4 h-4 accent-accent">
                            <label for="notifications" class="text-gray-700 text-sm">Powiadomienia</label>
                        </div>
                        <div class="flex justify-end">
                            <button class="bg-accent px-6 py-2 rounded-xl text-white transition duration-300 hover:bg-accent-strong cursor-pointer">Zapisz</button>
                        </div>
                    </div>
                </div>

                <div class="bg-bg-tint p-6 rounded-md">
                    <h2 class="mb-2 font-semibold text-red-600 text-lg">Usuwanie konta</h2>
                    <p class="mb-4 text-black text-sm">Tej akcji nie można cofnąć! Wszystkie twoje dane zostaną usunięte.</p>
                    <div class="flex justify-end">
                        <button class="bg-red-600 hover:bg-red-700 px-6 py-2 rounded-xl text-white transition duration-300 cursor-pointer">Usuń konto</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>