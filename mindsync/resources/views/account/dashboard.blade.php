@php
    $emotions = [
        1 => 'emotion1.png', // Okropnie (1.0 - 1.99)
        2 => 'emotion2.png', // Źle (2.0 - 2.99)
        3 => 'emotion3.png', // Średnio (3.0 - 3.99)
        4 => 'emotion4.png', // Dobrze (4.0 - 4.99)
        5 => 'emotion5.png'  // Wspaniale (5.0)
    ];
@endphp

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="flex min-h-screen overflow-x-hidden">
    @include('partials.aside')

    <!-- Main Content -->
    <main class="flex-1 space-y-6 p-2 md:p-10 h-screen overflow-y-auto">
        <div class="relative bg-bg-tint p-6 md:px-15 rounded-xl overflow-hidden">
            <h2 class="text-xl md:text-2xl">
                <span id="timeGreeting"></span>, {{ $userName }} 👋
            </h2>
            <img src="/images/leaf1.svg" class="top-[-104px] left-[-100%] md:left-[-111px] z-3 absolute pointer-events-none" alt="leaf1">   
            <img src="/images/leaf2.svg" class="top-[-75px] left-[596px] z-1 absolute pointer-events-none" alt="leaf2">   
            <img src="/images/leaf3.svg" class="right-[-200%] 2xl:right-0! bottom-[-110px] z-0 absolute pointer-events-none" alt="leaf3">   
        </div>

        <div class="gap-6 grid grid-cols-1 lg:grid-cols-2 min-h-50">
            <div class="bg-bg-tint p-6 rounded-xl text-center">
                <p class="font-semibold text-header-gray text-lg md:text-xl">Twój średni nastrój</p>
                <div class="flex flex-col justify-center items-center gap-2 mt-4">
                    @if($avgMoodIndex)
                        <img src="/images/{{ $emotions[$avgMoodIndex] }}" alt="Emoji" class="w-10 md:w-12 pointer-events-none" />
                    @endif
                    <span class="font-bold text-accent text-4xl md:text-5xl">({{$avgMood}})</span>
                </div>
            </div>
            <div class="relative bg-bg-tint p-6 rounded-xl overflow-y-hidden text-center">
                <p class="font-semibold text-header-gray text-lg md:text-xl">Twoje wpisy</p>
                <div class="flex justify-center mt-4 md:mt-10">
                    <span class="font-bold text-accent text-4xl md:text-5xl">{{$journalEntriesCount}}</span>
                </div>
            </div>
        </div>

        <div class="gap-6 grid grid-cols-1 lg:grid-cols-3 2xl:grid-cols-4 min-h-100">
            <div class="lg:col-span-2 2xl:col-span-3 bg-bg-tint p-6 rounded-xl">
                <p class="mb-5 font-semibold text-header-gray text-lg md:text-xl text-center">Wykres nastroju z ostatnich 30 dni</p>
                <div>
                    <canvas class="w-full h-[300px]" id="moodChart" data-mood='@json($moodData)'></canvas>
                </div>
            </div>
            <div class="gap-6 grid grid-rows-2 h-full">
                @if($lastEmotionEntry)
                    <a href="/emotions/journal" class="block relative bg-bg-tint p-4 pr-8 md:pr-4 rounded-xl hover:ring-2 hover:ring-accent transition duration-300 cursor-pointer">
                        <h3 class="mb-2 text-lg md:text-xl">Twój ostatni wpis</h3>
                        <p class="text-gray-500 text-xs md:text-sm">{{ $lastEmotionEntry->content }}</p>
                        <p class="bottom-4 absolute text-gray-400 text-xs md:text-sm">{{ $lastEmotionEntry->formatted_date }}</p>
                        <i class="fa-chevron-right right-4 bottom-4 absolute text-accent text-2xl md:text-3xl fa-solid"></i>
                    </a>
                @else
                    <div class="block relative bg-bg-tint p-4 pr-8 md:pr-4 rounded-xl">
                        <h3 class="mb-2 text-lg md:text-xl">Twój ostatni wpis</h3>
                        <p class="text-gray-500 text-xs md:text-sm">Brak wpisów w dzienniku</p>
                        <a href="/emotions/journal" class="bottom-4 absolute text-accent text-xs md:text-sm hover:underline">Dodaj pierwszy wpis</a>
                    </div>
                @endif
                <a href="/mindfulness/details/{{$recommendedExercise->id}}" class="block relative bg-bg-tint p-4 pr-8 md:pr-4 rounded-xl hover:ring-2 hover:ring-accent transition duration-300 cursor-pointer">
                    <h3 class="mb-2 text-lg md:text-xl">Polecane ćwiczenie</h3>
                    <p class="text-xs md:text-sm text-accent-strong">{{$recommendedExercise->title}}</p>
                    <p class="mt-2 text-gray-500 text-xs md:text-sm">{{$recommendedExercise->description}}</p>
                    <i class="fa-chevron-right right-4 bottom-4 absolute text-accent text-2xl md:text-3xl fa-solid"></i>
                </a>
            </div>
        </div>
    </main>
</body>
</html>