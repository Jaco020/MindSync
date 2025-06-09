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
        <h2 class="mb-6 text-xl text-center">
            {{ isset($exercise) ? 'Edytuj Ćwiczenie' : 'Dodaj Ćwiczenie' }}
        </h2>

        @if ($errors->any())
            <div class="bg-red-100 mb-4 px-4 py-3 border border-red-400 rounded text-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 mb-4 px-4 py-3 border border-green-400 rounded text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ isset($exercise) ? route('admin.exercises.update', $exercise->id) : route('admin.exercises.store') }}" class="space-y-4">
            @csrf
            @if(isset($exercise))
                @method('PUT')
            @endif

            <div>
                <label for="title" class="block mb-1 font-medium text-sm">Tytuł *</label>
                <input type="text" id="title" name="title" 
                       value="{{ old('title', isset($exercise) ? $exercise->title : '') }}" 
                       class="adminInput" required>
            </div>

            <div class="gap-4 grid grid-cols-1 md:grid-cols-2">
                <div>
                    <label for="duration_minutes" class="block mb-1 font-medium text-sm">Czas (min) *</label>
                    <input type="number" id="duration_minutes" name="duration_minutes" 
                           value="{{ old('duration_minutes', isset($exercise) ? $exercise->duration_minutes : '') }}" 
                           min="1" max="120" class="adminInput" required>
                </div>
                <div>
                    <label for="difficulty" class="block mb-1 text-sm">Trudność *</label>
                    <select id="difficulty" name="difficulty" class="adminInput" required>
                        <option value="Łatwy" {{ old('difficulty', isset($exercise) ? $exercise->difficulty : '') == 'Łatwy' ? 'selected' : '' }}>Łatwy</option>
                        <option value="Średni" {{ old('difficulty', isset($exercise) ? $exercise->difficulty : '') == 'Średni' ? 'selected' : '' }}>Średni</option>
                        <option value="Trudny" {{ old('difficulty', isset($exercise) ? $exercise->difficulty : '') == 'Trudny' ? 'selected' : '' }}>Trudny</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="description" class="block mb-1 text-sm">Opis *</label>
                <textarea id="description" name="description" 
                          class="adminInput" rows="4" required 
                          placeholder="Krótki opis ćwiczenia...">{{ old('description', isset($exercise) ? $exercise->description : '') }}</textarea>
            </div>

            <div>
                <label for="instructions" class="block mb-1 text-sm">Instrukcje *</label>
                <textarea id="instructions" name="instructions" 
                          class="adminInput" rows="6" required 
                          placeholder="Szczegółowe instrukcje wykonania ćwiczenia...">{{ old('instructions', isset($exercise) ? $exercise->instructions : '') }}</textarea>
            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <a href="{{ route('admin.exercises.list') }}" class="block py-2 border border-accent hover:border-accent-strong rounded-2xl w-[100px] text-accent text-center transition duration-300 hover:text-accent-strong cursor-pointer">Anuluj</a>
                <button type="submit" class="bg-accent py-2 rounded-2xl w-[120px] text-white transition duration-300 hover:bg-accent-strong cursor-pointer">
                    {{ isset($exercise) ? 'Aktualizuj' : 'Dodaj' }}
                </button>
            </div>
        </form>
    </main>
</body>
</html>