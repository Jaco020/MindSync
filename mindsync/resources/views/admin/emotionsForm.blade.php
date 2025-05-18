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
        <h2 class="mb-6 text-xl text-center">Dodaj Emocje</h2>

        <form method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nameEmotion" class="block mb-1 font-medium text-sm">Nazwa</label>
                <input type="text" id="nameEmotion" name="nameEmotion" class="adminInput">
            </div>

            <div>
                <label for="catergory" class="block mb-1 font-medium text-sm">Kategoria</label>
                <input type="text" id="catergory" name="catergory" class="adminInput">
            </div>

            <div>
                <label for="descEmotion" class="block mb-1 text-sm">Opis</label>
                <textarea id="desc" name="desc" class="adminInput" rows="4"></textarea>
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