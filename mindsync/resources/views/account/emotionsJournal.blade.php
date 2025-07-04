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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Dziennik Nastroju</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="flex min-h-screen overflow-x-hidden">
    @include('partials.aside')
    <main class="flex-1 space-y-6 p-2 md:p-10 h-screen overflow-y-auto">

        @if(session('success'))
            <div class="relative bg-green-100 px-4 py-3 border border-green-400 rounded text-green-700" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="top-0 right-0 bottom-0 absolute px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none';">
                    <i class="fas fa-times"></i>
                </span>
            </div>
        @endif

        @if(session('error'))
            <div class="relative bg-red-100 px-4 py-3 border border-red-400 rounded text-red-700" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="top-0 right-0 bottom-0 absolute px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none';">
                    <i class="fas fa-times"></i>
                </span>
            </div>
        @endif

        <div class="relative flex sm:flex-row flex-col sm:justify-between sm:items-center bg-bg-tint p-6 md:px-15 rounded-xl overflow-hidden">
            <div>
                <h2 class="text-xl md:text-2xl 2xl:text-3xl">Dziennik nastroju</h2>
                <p class="mt-2 text-gray-500 text-sm md:text-base">Monitoruj i opisuj swój nastrój</p>
            </div>
            <a href="{{ route('emotions.journal.form.add') }}" class="bg-accent mt-4 sm:mt-0 px-4 py-2 rounded-2xl text-white transition duration-300 hover:bg-accent-strong cursor-pointer">
                    Nowy wpis
            </a>
            <img src="/images/leaf1.svg" class="top-[-104px] left-[-100%] md:left-[-111px] z-3 absolute pointer-events-none" alt="leaf1">   
        </div>

        <h2 class="ml-[1%] sm:ml-1 md:text-x text-base sm:text-lg">Wpisy ({{ count($emotionsJournalEntries) }})</h2>

        <div class="space-y-4">
            @foreach ($emotionsJournalEntries as $emotionJournalEntry)
                <div class="relative flex justify-between items-start bg-bg-tint shadow p-4 rounded-xl">
                <div>
                    <div class="flex sm:flex-row flex-col sm:items-center gap-2 mb-2 text-gray-500">
                        <div>
                            <i class="mr-1 text-accent text-lg md:text-xl fa-solid fa-calendar-days"></i>
                            <span class="font-semibold text-xs md:text-sm">{{$emotionJournalEntry->date}}</span>
                        </div>
                        <img src="/images/{{ $emotions[$emotionJournalEntry->mood_rating] }}" alt="Emoji" class="w-6 md:w-7 pointer-events-none" />
                    </div>
                    <p class="text-gray-700 text-sm md:text-base">
                        {{ $emotionJournalEntry->content }}
                    </p>
                </div>
                
                <div class="top-2 right-2 absolute flex gap-1">
                    <!-- Przycisk edycji poza formularzem -->
                    <a href="{{ route('emotions.journal.update', $emotionJournalEntry->id) }}" 
                    class="place-content-center grid bg-blue-500 hover:bg-blue-600 p-4 rounded-full w-4 h-4 text-white scale-95 md:scale-100 transition duration-300 cursor-pointer">
                        <i class="fa-pen-to-square fa-solid"></i>
                    </a>
    
                    <!-- Formularz tylko dla usuwania -->
                    <form action="{{ route('emotions.journal.delete', $emotionJournalEntry->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" 
                    class="place-content-center grid bg-red-500 hover:bg-red-600 p-4 rounded-full w-4 h-4 text-white scale-95 md:scale-100 transition duration-300 cursor-pointer"
                    onclick="return confirm('Czy na pewno chcesz usunąć ten wpis?')">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</body>
</html>