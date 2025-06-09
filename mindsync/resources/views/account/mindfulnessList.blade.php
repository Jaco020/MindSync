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

        <div class="relative flex sm:flex-row flex-col sm:justify-between sm:items-center bg-bg-tint p-6 md:px-15 rounded-xl overflow-hidden">
            <div>
                <h2 class="text-xl md:text-2xl 2xl:text-3xl">Ćwiczenia mindfulness</h2>
                <p class="mt-2 text-gray-500 text-sm md:text-base">Zbiór aktywności które pozytywnie wpływają na zdrowie i samopoczucie</p>
            </div>
            <img src="/images/leaf1.svg" class="top-[-104px] left-[-100%] md:left-[-111px] z-3 absolute pointer-events-none" alt="leaf1"> 
            <img src="/images/leaf3.svg" class="right-[-200%] 2xl:right-0! bottom-[-110px] z-0 absolute pointer-events-none" alt="leaf3">   
        </div>

        <div class="flex gap-4 text-sm sm:text-base">
            <a href="/mindfulness/journal" class="px-4 py-2 rounded-xl hover:ring-1 hover:ring-accent hover:text-accent transition duration-300">Dziennik ćwiczeń</a>
            <a href="/mindfulness/exercises" class="bg-accent px-4 py-2 rounded-xl text-white">Zbiór ćwiczeń</a>
        </div>

        <div class="flex flex-wrap gap-4 bg-bg-tint p-4 rounded-xl">
            <div class="relative">
               <form method="GET" action="{{ route('mindfulness.exercises') }}" class="flex gap-4">
                    <select name="difficulty" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full sm:w-auto text-gray-500 text-sm md:text-base">
                        <option value="">Wszystkie poziomy</option>
                        <option value="Łatwy" {{ request('difficulty') == 'Łatwy' ? 'selected' : '' }}>Łatwy</option>
                        <option value="Średni" {{ request('difficulty') == 'Średni' ? 'selected' : '' }}>Średni</option>
                        <option value="Trudny" {{ request('difficulty') == 'Trudny' ? 'selected' : '' }}>Trudny</option>
                    </select>
                    <select name="duration" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full sm:w-auto text-gray-500 text-sm md:text-base">
                        <option value="">Dowolny czas</option>
                        <option value="1" {{ request('duration') == '1' ? 'selected' : '' }}>Poniżej 1 minuty</option>
                        <option value="5" {{ request('duration') == '5' ? 'selected' : '' }}>Poniżej 5 minut</option>
                        <option value="10" {{ request('duration') == '10' ? 'selected' : '' }}>10+ minut</option>
                        <option value="30" {{ request('duration') == '30' ? 'selected' : '' }}>30+ minut</option>
                        <option value="60" {{ request('duration') == '60' ? 'selected' : '' }}>1h+ godzin</option>
                        <option value="120" {{ request('duration') == '120' ? 'selected' : '' }}>2h+ godzin</option>
                    </select>
                    <button type="submit" class="bg-accent px-4 py-2 rounded-xl text-white">Filtruj</button>
                </form> 
            </div>     
        </div>

        <div id="exerciseContainer" class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 grid-flow-dense">
            @foreach ($exercises as $exercise) 
            <a href="/mindfulness/details/{{ $exercise->id }}" class="flex flex-col justify-between bg-bg-tint p-4 rounded-xl hover:ring-2 hover:ring-accent min-h-[200px] text-gray-800 transition duration-300 cursor-pointer exercise-card">
                <div>
                    <h3 class="mb-1 font-semibold exercise-title">{{$exercise->title}}, {{$exercise->difficulty}}</h3>
                    <p class="text-gray-600 text-sm">{{$exercise->description}}</p>
                </div>
                <div class="flex justify-between items-center mt-4 text-gray-500 text-sm">
                    <span>{{$exercise->duration_minutes}} minut</span>
                    <i class="fa-chevron-right text-accent text-2xl md:text-3xl fa-solid"></i>
                </div>
            </a>   
            @endforeach
        </div>
    </main>
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.exercise-card');

        cards.forEach(card => {
            const title = card.querySelector('.exercise-title');
            const titleLength = title.textContent.length || 0;

            if (titleLength > 25) {
                card.classList.add('md:col-span-2');
            }
        });
    });
</script>

</body>

</html>
