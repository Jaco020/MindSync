<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Ćwiczenia Mindfulness</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="flex min-h-screen overflow-x-hidden">
    @include('partials.aside')
    <main class="flex-1 space-y-6 p-2 md:p-10 h-screen overflow-y-auto">

        <div class="relative flex flex-col justify-center space-y-6 bg-bg-tint p-4 md:p-8 rounded-xl">
            <h2 class="font-semibold text-xl 2xl:text-2xl">{{$exercise->title}}</h2>
            <p class="text-gray-600">
                {{$exercise->description}}
            </p>

            <div>
                <h3 class="mb-2 font-semibold">Instrukcje:</h3>
                <p class="text-gray-600">
                    {{ $exercise->instructions }}
                </p>
            </div>
             
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 w-full">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('mindfulness.journal.addnew', $exercise->id) }}" class="space-y-6">
                @csrf
                
                <div class="flex md:flex-row flex-col md:items-center gap-4">
                    <label for="exerciseDate" class="font-medium text-gray-700">Data wykonania ćwiczenia:</label>
                    <input type="date" id="exerciseDate" name="exerciseDate" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent text-gray-500
                    @error('exerciseDate') border-2 border-red-500 !text-red-600 @enderror">
                </div>

                <div class="flex md:flex-row flex-col md:items-center gap-4">
                    <label for="moodSelect" class="font-medium text-gray-700">Jak się czujesz po ćwiczeniu:</label>
                    <div class="relative flex items-center gap-2">
                        <select id="moodSelect" name="moodSelect" class="bg-bg-main px-4 py-2 pl-[40px] rounded-xl focus:outline-none focus:ring-2 focus:ring-accent text-gray-700
                        @error('moodSelect') border-2 border-red-500 !text-red-600 @enderror">
                            <option value="1">Okropnie</option>
                            <option value="2">Źle</option>
                            <option value="3">Średnio</option>
                            <option value="4" selected>Dobrze</option>
                            <option value="5">Wspaniale</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="notes" class="mb-2 font-medium text-gray-700">Przemyślenia:</label>
                    <textarea id="notes" name="notes" placeholder="Podaj swoje przemyślenia" class="bg-bg-main p-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent h-40 resize-none text-gray-600
                    @error('notes') border-2 border-red-500 !text-red-600 @enderror"></textarea>
                </div>

                <div class="flex flex-wrap justify-center md:justify-end gap-4">
                    <a href="/mindfulness/exercises" class="px-6 py-2 border border-accent hover:border-accent-strong rounded-2xl w-full xsm:w-auto text-accent text-center transition duration-300 hover:text-accent-strong">Powrót</a>
                    <button class="bg-accent px-6 py-2 rounded-2xl w-full xsm:w-auto text-white text-center transition duration-300 hover:bg-accent-strong">Wykonane</button>
                </div>
            </form>

    </main>
</body>
</html>
