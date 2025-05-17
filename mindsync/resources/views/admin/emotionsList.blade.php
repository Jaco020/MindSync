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
            <h2 class="text-2xl">Zarządzanie Emocjami</h2>
            <a href="{{ route('admin.emotions.addnew') }}" class="border-accent border text-accent rounded-2xl block px-4 py-2 hover:bg-accent hover:text-white ease-linear duration-300 cursor-pointer">
                <i class="fas fa-plus mr-2"></i> Dodaj Emocję
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 text-sm text-left text-gray-700 rounded-lg">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr class="border-b border-gray-300">
                        <th class="px-4 py-3 ">ID</th>
                        <th class="px-4 py-3 ">Nazwa</th>
                        <th class="px-4 py-3 ">Kategoria</th>
                        <th class="px-4 py-3 ">Opis</th>
                        <th class="px-4 py-3 ">Data Dodania</th>
                        <th class="px-4 py-3 ">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50 border-b border-gray-300">
                        <td class="px-4 py-3 ">1</td>
                        <td class="px-4 py-3 ">Radość</td>
                        <td class="px-4 py-3 ">Pozytywna</td>
                        <td class="px-4 py-3 ">Stan szczęścia i satysfakcji.</td>
                        <td class="px-4 py-3 ">01.04.2024</td>
                        <td class="px-4 py-3  space-x-2">
                            <a href="#" class="inline-block px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteEmotion(1)" class="inline-block px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 cursor-pointer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 border-b border-gray-300">
                        <td class="px-4 py-3 ">2</td>
                        <td class="px-4 py-3 ">Strach</td>
                        <td class="px-4 py-3 ">Negatywna</td>
                        <td class="px-4 py-3 ">Reakcja na zagrożenie lub niepewność.</td>
                        <td class="px-4 py-3 ">10.04.2024</td>
                        <td class="px-4 py-3  space-x-2">
                            <a href="#" class="inline-block px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteEmotion(2)" class="inline-block px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 cursor-pointer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 border-b border-gray-300">
                        <td class="px-4 py-3 ">3</td>
                        <td class="px-4 py-3 ">Zaskoczenie</td>
                        <td class="px-4 py-3 ">Neutralna</td>
                        <td class="px-4 py-3 ">Nagła reakcja na nieoczekiwane wydarzenie.</td>
                        <td class="px-4 py-3 ">18.04.2024</td>
                        <td class="px-4 py-3  space-x-2">
                            <a href="#" class="inline-block px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteEmotion(3)" class="inline-block px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 cursor-pointer">
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