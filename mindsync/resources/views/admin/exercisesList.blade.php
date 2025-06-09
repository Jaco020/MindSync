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
        @if (session('success'))
            <div class="bg-green-100 mb-4 px-4 py-3 border border-green-400 rounded text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 mb-4 px-4 py-3 border border-red-400 rounded text-red-700">
                {{ session('error') }}
            </div>
        @endif

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
                        <th class="px-4 py-3">Data utworzenia</th>
                        <th class="px-4 py-3">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($exercises as $exercise)
                        <tr class="hover:bg-gray-50 border-gray-300 border-b">
                            <td class="px-4 py-3">{{ $exercise->id }}</td>
                            <td class="px-4 py-3 font-medium">{{ $exercise->title }}</td>
                            <td class="px-4 py-3">
                                <div class="max-w-xs truncate" title="{{ $exercise->description }}">
                                    {{ Str::limit($exercise->description, 50) }}
                                </div>
                            </td>
                            <td class="px-4 py-3">{{ $exercise->duration_minutes }}</td>
                            <td class="px-4 py-3">
                                <span class="bg-green-100 bg-red-100 bg-yellow-100 px-2 py-1 rounded-full font-medium text-green-800 text-red-800 text-yellow-800 text-xs @if($exercise->difficulty === 'Łatwy') @elseif($exercise->difficulty === 'Średni') @else @endif">
                                    @if($exercise->difficulty === 'Łatwy') Łatwy
                                    @elseif($exercise->difficulty === 'Średni') Średni
                                    @else Trudny @endif
                                </span>
                            </td>
                            <td class="px-4 py-3">{{ $exercise->created_at->format('d.m.Y') }}</td>
                            <td class="space-x-2 px-4 py-3">
                                <a href="{{ route('admin.exercises.edit', $exercise->id) }}" 
                                   class="inline-block bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-white"
                                   title="Edytuj ćwiczenie">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="deleteExercise({{ $exercise->id }})" 
                                        class="inline-block bg-red-500 hover:bg-red-600 px-2 py-1 rounded text-white cursor-pointer"
                                        title="Usuń ćwiczenie">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-gray-500 text-center">
                                Brak ćwiczeń w systemie
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($exercises->count() > 0)
            <div class="mt-4 text-gray-600 text-sm">
                Łącznie ćwiczeń: {{ $exercises->count() }}
            </div>
        @endif
    </main>

    <script>
        function deleteExercise(exerciseId) {
            if (confirm('Czy na pewno chcesz usunąć to ćwiczenie? Ta akcja jest nieodwracalna.')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/exercises/delete/${exerciseId}`;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);
                
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);
                
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>