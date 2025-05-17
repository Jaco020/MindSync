<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="min-h-screen overflow-x-hidden px-[2%]">
    @include('admin.adminNav')

    <main class="bg-gray-50 flex flex-col rounded-2xl p-10 mt-10 w-full mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl">Zarządzanie Użytkownikami</h2>
            <a href="{{ route('admin.users.addnew') }}" class="border-accent border text-accent rounded-2xl block px-4 py-2 hover:bg-accent hover:text-white ease-linear duration-300 cursor-pointer">
                <i class="fas fa-plus mr-2"></i> Dodaj Użytkownika
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 text-sm text-left text-gray-700 rounded-lg">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Login</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Rola</th>
                        <th class="px-4 py-3">Imię</th>
                        <th class="px-4 py-3">Nazwisko</th>
                        <th class="px-4 py-3">Data Rejestracji</th>
                        <th class="px-4 py-3">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50 border-b border-gray-300">
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3">jdoe</td>
                        <td class="px-4 py-3">jdoe@example.com</td>
                        <td class="px-4 py-3">Admin</td>
                        <td class="px-4 py-3">Jan</td>
                        <td class="px-4 py-3">Doe</td>
                        <td class="px-4 py-3">01.01.2024</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="#" class="inline-block px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteUser(1)" class="inline-block px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 cursor-pointer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 border-b border-gray-300">
                        <td class="px-4 py-3">2</td>
                        <td class="px-4 py-3">akowalski</td>
                        <td class="px-4 py-3">akowalski@example.com</td>
                        <td class="px-4 py-3">Moderator</td>
                        <td class="px-4 py-3">Anna</td>
                        <td class="px-4 py-3">Kowalska</td>
                        <td class="px-4 py-3">15.02.2024</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="#" class="inline-block px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteUser(2)" class="inline-block px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 cursor-pointer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 border-b border-gray-300">
                        <td class="px-4 py-3">3</td>
                        <td class="px-4 py-3">mpietrzak</td>
                        <td class="px-4 py-3">mpietrzak@example.com</td>
                        <td class="px-4 py-3">Użytkownik</td>
                        <td class="px-4 py-3">Michał</td>
                        <td class="px-4 py-3">Pietrzak</td>
                        <td class="px-4 py-3">22.03.2024</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="#" class="inline-block px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteUser(3)" class="inline-block px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 cursor-pointer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    
</body>
</html>