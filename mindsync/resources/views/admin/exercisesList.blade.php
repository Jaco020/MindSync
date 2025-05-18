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
        <h2 class="text-2xl">Zarządzanie Ćwiczeniami Uważności</h2>
        <a href="{{ route('admin.exercises.addnew') }}" class="block hover:bg-accent px-4 py-2 border border-accent rounded-2xl text-accent hover:text-white duration-300 ease-linear cursor-pointer">
            <i class="mr-2 fas fa-plus"></i> Dodaj Ćwiczenie
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="bg-white border border-gray-200 rounded-lg min-w-full text-gray-700 text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
                <tr class="border-gray-200 border-b">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Tytuł</th>
                    <th class="px-4 py-3">Opis</th>
                    <th class="px-4 py-3">Czas (min)</th>
                    <th class="px-4 py-3">Poziom trudności</th>
                    <th class="px-4 py-3">Akcje</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50 border-gray-200 border-b">
                    <td class="px-4 py-3">1</td>
                    <td class="px-4 py-3">Oddech Świadomości</td>
                    <td class="px-4 py-3">Proste ćwiczenie skupienia na oddechu.</td>
                    <td class="px-4 py-3">5</td>
                    <td class="px-4 py-3">Łatwy</td>
                    <td class="space-x-2 px-4 py-3">
                        <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-white">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button onclick="deleteExercise(1)" class="inline-block bg-red-500 hover:bg-red-600 px-2 py-1 rounded text-white cursor-pointer">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 border-gray-200 border-b">
                    <td class="px-4 py-3">2</td>
                    <td class="px-4 py-3">Skanowanie Ciała</td>
                    <td class="px-4 py-3">Świadome przechodzenie uwagą przez ciało.</td>
                    <td class="px-4 py-3">15</td>
                    <td class="px-4 py-3">Średni</td>
                    <td class="space-x-2 px-4 py-3">
                        <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-white">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button onclick="deleteExercise(2)" class="inline-block bg-red-500 hover:bg-red-600 px-2 py-1 rounded text-white cursor-pointer">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 border-gray-200 border-b">
                    <td class="px-4 py-3">3</td>
                    <td class="px-4 py-3">Medytacja Zmysłów</td>
                    <td class="px-4 py-3">Ćwiczenie koncentracji na doznaniach zmysłowych.</td>
                    <td class="px-4 py-3">10</td>
                    <td class="px-4 py-3">Trudny</td>
                    <td class="space-x-2 px-4 py-3">
                        <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-white">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button onclick="deleteExercise(3)" class="inline-block bg-red-500 hover:bg-red-600 px-2 py-1 rounded text-white cursor-pointer">
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