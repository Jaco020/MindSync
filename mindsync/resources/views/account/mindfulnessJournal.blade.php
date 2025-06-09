@php
    $emotions = [
        1 => 'emotion1.png', // Okropnie
        2 => 'emotion2.png', // Źle  
        3 => 'emotion3.png', // Średnio
        4 => 'emotion4.png', // Dobrze
        5 => 'emotion5.png'  // Wspaniale
    ];
@endphp

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MindSync Ćwiczenia Mindfulness</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="flex min-h-screen overflow-x-hidden">
    @include('partials.aside')

    <main class="flex-1 space-y-6 p-2 md:p-10 h-screen overflow-y-auto">

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none';">
                    <i class="fas fa-times"></i>
                </span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none';">
                    <i class="fas fa-times"></i>
                </span>
            </div>
        @endif

        <div class="relative flex sm:flex-row flex-col sm:justify-between sm:items-center bg-bg-tint p-6 md:px-15 rounded-xl overflow-hidden">
            <div>
                <h2 class="text-xl md:text-2xl 2xl:text-3xl">Ćwiczenia mindfulness</h2>
                <p class="mt-2 text-gray-500 text-sm md:text-base">Zbiór aktywności które pozytywnie wpływają na zdrowie i samopoczucie</p>
            </div>
            <img src="/images/leaf1.svg" class="top-[-104px] left-[-100%] md:left-[-111px] z-3 absolute pointer-events-none" alt="leaf1"> 
            <img src="/images/leaf3.svg" class="right-[-200%] 2xl:right-0! bottom-[-110px] z-0 absolute pointer-events-none" alt="leaf3">   
        </div>

        <div class="flex gap-4 text-sm md:text-base">
            <a href="/mindfulness/journal" class="bg-accent px-4 py-2 rounded-xl text-white">Dziennik ćwiczeń</a>
            <a href="/mindfulness/exercises" class="px-4 py-2 rounded-xl hover:ring-1 hover:ring-accent hover:text-accent transition duration-300">Zbiór ćwiczeń</a>
        </div>

        <form method="GET" action="{{ route('mindfulness.journal') }}" class="flex gap-4">
            @csrf
            <div class="flex flex-wrap gap-4 bg-bg-tint p-4 rounded-xl">
                <label for="date" class="px-4 py-2 rounded-xl text-gray-700">Wybierz datę:</label>
                <input type="date" name="date" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full sm:w-auto text-gray-500 text-sm md:text-base" />
                <button type="submit" class="px-4 py-2 rounded-xl bg-accent text-white">Filtruj</button>
            </div>
        </form>

        <div class="space-y-4">
            @foreach ($mindfulnessJournalEntries as $mindfulnessJournalEntry )
                <div class="relative flex justify-between items-start bg-bg-tint shadow p-4 rounded-xl">
                <div>
                    <div class="flex items-center gap-2 mb-2 text-sm">
                        <span class="bg-accent px-2 py-1 rounded-full font-semibold text-white text-xs">{{ $mindfulnessJournalEntry->exercise->title ?? 'Nieznane ćwiczenie'}}</span>
                        <img src="/images/{{ $emotions[$mindfulnessJournalEntry->rating]}}" alt="Emoji" class="w-6 md:w-7 pointer-events-none" />
                    </div>
                    <p class="text-gray-700 text-sm md:text-base">
                        {{  $mindfulnessJournalEntry->notes }}
                    </p>
                    <p class="mt-2 text-gray-500 text-xs md:text-sm">{{  $mindfulnessJournalEntry->completed_date->format('d.m.Y')}} </p>
                </div>
            </div>
            @endforeach
            
        </div>
    </main>
</body>

</html>
