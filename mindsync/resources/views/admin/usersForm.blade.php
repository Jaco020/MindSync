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
        <h2 class="mb-6 text-xl text-center">Dodaj Użytkownika</h2>

        <form method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block mb-1 font-medium text-sm">Nazwa</label>
                <input type="text" id="name" name="name" class="adminInput">
            </div>

            <div class="gap-4 grid grid-cols-1 md:grid-cols-2">
                <div>
                    <label for="email" class="block mb-1 font-medium text-sm">Email</label>
                    <input type="email" id="email" name="email" class="adminInput">
                </div>
                <div>
                    <label for="password" class="block mb-1 font-medium text-sm">Hasło</label>
                    <input type="password" id="password" name="password" class="adminInput">
                </div>
            </div>

            <div>
                <label for="profile_picture" class="block mb-1 text-sm">Zdjęcie Profilowe</label>
                <input type="file" id="profile_picture" name="profile_picture" class="bg-gray-100 px-4 py-2 rounded-xl focus:outline-none text-gray-500">
            </div>

            <div class="gap-4 grid grid-cols-1 md:grid-cols-2">
                <div>
                    <label for="phone_number" class="block mb-1 text-sm">Numer Telefonu</label>
                    <input type="text" id="phone_number" name="phone_number" class="adminInput">
                </div>
                <div>
                    <label for="birth_date" class="block mb-1 text-sm">Data Urodzenia</label>
                    <input type="date" id="birth_date" name="birth_date" class="adminInput">
                </div>
            </div>

            <div>
                <label for="gender" class="block mb-1 text-sm">Płeć</label>
                <select id="gender" name="gender" class="adminInput">
                    <option value="male">Mężczyzna</option>
                    <option value="female">Kobieta</option>
                </select>
            </div>

            <div>
                <label for="bio" class="block mb-1 text-sm">Opis</label>
                <textarea id="bio" name="bio" class="adminInput" rows="4"></textarea>
            </div>

            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <input type="checkbox" id="notifications_enabled" name="notifications_enabled" value="1" class="mr-1 accent-accent">
                    <label for="notifications_enabled" class="text-sm">Włącz Powiadomienia</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="accepted_terms" name="accepted_terms" value="1" required class="mr-1 accent-accent">
                    <label for="accepted_terms" class="text-sm">Akceptuję Regulamin</label>
                </div>
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