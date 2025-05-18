<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="px-[2%] min-h-screen overflow-x-hidden">
    @include('admin.adminNav')

    <main class="flex flex-col bg-gray-50 mx-auto mt-10 p-10 rounded-xl w-full max-w-4xl">
        <h2 class="mb-6 text-xl text-center">Dodaj Ćwiczenie</h2>

        <form method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="titleExe" class="block mb-1 font-medium text-sm">Tytuł</label>
                <input type="text" id="titleExe" name="titleExe" class="adminInput">
            </div>

            <div class="gap-4 grid grid-cols-1 md:grid-cols-2">
                <div>
                    <label for="timeExe" class="block mb-1 font-medium text-sm">Czas (min)</label>
                    <input type="text" id="timeExe" name="timeExe" class="adminInput">
                </div>
                <div>
                    <label for="difficulty" class="block mb-1 text-sm">Trudność</label>
                    <select id="difficulty" name="difficulty" class="adminInput">
                        <option value="easy">Łatwy</option>
                        <option value="medium">Średni</option>
                        <option value="hard">Trudny</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="descExe" class="block mb-1 text-sm">Opis</label>
                <textarea id="descExe" name="descExe" class="adminInput" rows="4"></textarea>
            </div>
            <div>
                <label for="instructions" class="block mb-1 text-sm">Instrukcje</label>
                <textarea id="instructions" name="instructions" class="adminInput" rows="4"></textarea>
            </div>


            <div class="flex justify-end space-x-4 mt-6">
                <a href="{{ route('admin.users.list') }}" class="block py-2 border border-accent hover:border-accent-strong rounded-2xl w-[100px] text-accent text-center transition duration-300 hover:text-accent-strong cursor-pointer">Anuluj</a>
                <button type="submit" class="bg-accent py-2 rounded-2xl w-[100px] text-white transition duration-300 hover:bg-accent-strong cursor-pointer">
                    Dodaj
                </button>
            </div>
        </form>
    </main>

    
</body>
</html>