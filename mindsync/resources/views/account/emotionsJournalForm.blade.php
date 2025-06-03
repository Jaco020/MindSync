<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Dziennik Nastroju</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="overflow-x-hidden flex min-h-screen">
    @include('partials.aside')
    <main class="flex-1 h-screen overflow-y-auto p-2 md:p-10 space-y-6">

        <!-- New entry container -->
        <div class="flex flex-col justify-center bg-bg-tint p-4 md:p-8 rounded-xl relative">
            <h2 class="text-lg md:text-xl 2xl:text-2xl">
                {{ isset($journalEntry) ? 'Edytuj wpis' : 'Dodaj nowy wpis' }}
            </h2>
            
            <form action="{{ isset($journalEntry) ? route('emotions.journal.update', $journalEntry->id) : route('emotions.journal.add') }}" method="POST" class="mt-6">
                @csrf
                
                <!-- Wyświetlanie błędów walidacji - tylko na górze -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="space-y-5">
                    <div class="flex items-center">
                        <label for="dateIn" class="text-gray-600 mr-4">Data: </label>
                        <input type="date" name="dateIn" id="dateIn" 
                               value="{{ old('dateIn', isset($journalEntry) ? $journalEntry->date : '') }}"
                               class="px-3 py-2 rounded-xl bg-bg-main focus:outline-none focus:ring-2 focus:ring-accent text-gray-500 @error('dateIn') border-2 border-red-500 @enderror">
                    </div>
                    
                    <div class="flex items-center">
                        <label for="moodIn" class="text-gray-600 mr-4">Twój nastrój:</label>
                        <div class="flex flex-col items-center">
                            <div class="flex items-center mb-2">
                                <img id="moodImage" src="/images/emotion3.png" alt="Nastrój" class="h-8 mr-2">
                                <span id="moodDescription" class="text-gray-700 font-medium">Średni (3)</span>
                            </div>
                            <input type="range" name="moodIn" id="moodIn" min="1" max="5" 
                                   value="{{ old('moodIn', isset($journalEntry) ? $journalEntry->mood_rating : 3) }}" 
                                   class="inputRange @error('moodIn') border-2 border-red-500 @enderror">
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label for="journalText" class="text-gray-600 mb-4">Treść wpisu: </label>
                        <textarea placeholder="Twój opis dnia" name="journalText" id="journalText" 
                                  class="p-3 rounded-xl bg-bg-main focus:outline-none focus:ring-2 focus:ring-accent resize-none h-80 text-gray-500 @error('journalText') border-2 border-red-500 @enderror">{{ old('journalText', isset($journalEntry) ? $journalEntry->content : '') }}</textarea>
                    </div>
                    
                    <div class="flex justify-end items-center gap-4 text-center">
                        <a href="/emotions/journal" class="cursor-pointer border-accent border text-accent rounded-2xl block md:px-8 py-2 hover:border-accent-strong hover:text-accent-strong transition duration-300 w-[100px] md:w-auto">Anuluj</a>
                        <button type="submit" class="md:px-8 py-2 bg-accent text-white rounded-2xl w-[100px] md:w-auto hover:bg-accent-strong cursor-pointer transition duration-300">
                            {{ isset($journalEntry) ? 'Aktualizuj' : 'Zapisz' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    
    <script>
        const moodDescriptions = [
            { range: [1, 1], text: "Okropny (1)", image: "/images/emotion1.png" },
            { range: [2, 2], text: "Zły (2)", image: "/images/emotion2.png" },
            { range: [3, 3], text: "Średni (3)", image: "/images/emotion3.png" },
            { range: [4, 4], text: "Dobry (4)", image: "/images/emotion4.png" },
            { range: [5, 5], text: "Wspaniały (5)", image: "/images/emotion5.png" },
        ];

        const moodInput = document.getElementById('moodIn');
        const moodDesc = document.getElementById('moodDescription');
        const moodImg = document.getElementById('moodImage');

        function updateMoodDisplay(value) {
            const mood = moodDescriptions.find(m =>
                value >= m.range[0] && value <= m.range[1]
            );
            if (mood && moodDesc && moodImg) {
                moodDesc.textContent = mood.text;
                moodImg.src = mood.image;
                moodImg.alt = mood.text;
            }
        }

        if (moodInput && moodDesc && moodImg) {
            // Aktualizuj na podstawie wartości z edycji
            updateMoodDisplay(moodInput.value);

            moodInput.addEventListener('input', (e) => {
                updateMoodDisplay(Number(e.target.value));
            });
        }
    </script>
</body>
</html>