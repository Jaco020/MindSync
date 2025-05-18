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

    <main class="flex flex-col bg-gray-50 mx-auto mt-10 p-10 rounded-2xl w-full">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl">Zarządzanie Użytkownikami</h2>
            <a href="{{ route('admin.users.addnew') }}" class="block hover:bg-accent px-4 py-2 border border-accent rounded-2xl text-accent hover:text-white duration-300 ease-linear cursor-pointer">
                <i class="mr-2 fas fa-plus"></i> Dodaj Użytkownika
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="bg-white border border-gray-200 rounded-lg min-w-full text-gray-700 text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
                    <tr class="border-gray-200 border-b">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nazwa</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Telefon</th>
                        <th class="px-4 py-3">Rola</th>
                        <th class="px-4 py-3">Data Rejestracji</th>
                        <th class="px-4 py-3">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50 border-gray-300 border-b">
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3">jdoe</td>
                        <td class="px-4 py-3">jdoe@example.com</td>
                        <td class="px-4 py-3">111 222 333</td>
                        <td class="px-4 py-3">Admin</td>
                        <td class="px-4 py-3">01.01.2024</td>
                        <td class="space-x-2 px-4 py-3">
                            <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-white">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteUser(1)" class="inline-block bg-red-500 hover:bg-red-600 px-2 py-1 rounded text-white cursor-pointer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 border-gray-300 border-b">
                        <td class="px-4 py-3">2</td>
                        <td class="px-4 py-3">akowalski</td>
                        <td class="px-4 py-3">akowalski@example.com</td>
                        <td class="px-4 py-3">222 333 444</td>
                        <td class="px-4 py-3">User</td>
                        <td class="px-4 py-3">15.02.2024</td>
                        <td class="space-x-2 px-4 py-3">
                            <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-white">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteUser(2)" class="inline-block bg-red-500 hover:bg-red-600 px-2 py-1 rounded text-white cursor-pointer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 border-gray-300 border-b">
                        <td class="px-4 py-3">3</td>
                        <td class="px-4 py-3">mpietrzak</td>
                        <td class="px-4 py-3">mpietrzak@example.com</td>
                        <td class="px-4 py-3">333 444 555</td>
                        <td class="px-4 py-3">User</td>
                        <td class="px-4 py-3">22.03.2024</td>
                        <td class="space-x-2 px-4 py-3">
                            <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-white">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteUser(3)" class="inline-block bg-red-500 hover:bg-red-600 px-2 py-1 rounded text-white cursor-pointer">
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