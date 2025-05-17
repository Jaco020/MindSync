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
        <h2 class="text-2xl">Zarządzanie Ćwiczeniami Uważności</h2>
        <a href="{{ route('admin.exercises.addnew') }}" class="border-accent border text-accent rounded-2xl block px-4 py-2 hover:bg-accent hover:text-white ease-linear duration-300 cursor-pointer">
            <i class="fas fa-plus mr-2"></i> Dodaj Ćwiczenie
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 text-sm text-left text-gray-700 rounded-lg">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr class="border-b border-gray-200">
                    <th class="px-4 py-3 ">ID</th>
                    <th class="px-4 py-3 ">Tytuł</th>
                    <th class="px-4 py-3 ">Opis</th>
                    <th class="px-4 py-3 ">Czas (min)</th>
                    <th class="px-4 py-3 ">Poziom trudności</th>
                    <th class="px-4 py-3 ">Akcje</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50 border-b border-gray-200">
                    <td class="px-4 py-3 ">1</td>
                    <td class="px-4 py-3 ">Oddech Świadomości</td>
                    <td class="px-4 py-3 ">Proste ćwiczenie skupienia na oddechu.</td>
                    <td class="px-4 py-3 ">5</td>
                    <td class="px-4 py-3 ">Łatwy</td>
                    <td class="px-4 py-3  space-x-2">
                        <a href="#" class="inline-block px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button onclick="deleteExercise(1)" class="inline-block px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 cursor-pointer">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 border-b border-gray-200">
                    <td class="px-4 py-3 ">2</td>
                    <td class="px-4 py-3 ">Skanowanie Ciała</td>
                    <td class="px-4 py-3 ">Świadome przechodzenie uwagą przez ciało.</td>
                    <td class="px-4 py-3 ">15</td>
                    <td class="px-4 py-3 ">Średni</td>
                    <td class="px-4 py-3  space-x-2">
                        <a href="#" class="inline-block px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button onclick="deleteExercise(2)" class="inline-block px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 cursor-pointer">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 border-b border-gray-200">
                    <td class="px-4 py-3 ">3</td>
                    <td class="px-4 py-3 ">Medytacja Zmysłów</td>
                    <td class="px-4 py-3 ">Ćwiczenie koncentracji na doznaniach zmysłowych.</td>
                    <td class="px-4 py-3 ">10</td>
                    <td class="px-4 py-3 ">Trudny</td>
                    <td class="px-4 py-3  space-x-2">
                        <a href="#" class="inline-block px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button onclick="deleteExercise(3)" class="inline-block px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 cursor-pointer">
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