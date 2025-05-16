<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindsync Analiza Emocji</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="flex min-h-screen overflow-x-hidden">
    @include('partials.aside')
    <main class="flex-1 space-y-6 p-2 md:p-10 h-screen overflow-y-auto">
    <div class="relative bg-bg-tint p-6 md:px-15 rounded-xl overflow-hidden">
        <h2 class="font-semibold text-xl md:text-2xl 2xl:text-3xl">Analiza emocji</h2>
        <p class="mt-2 text-gray-500 text-sm md:text-base">Zobacz swoje statystyki i interesujące informacje o twoim samopoczuciu</p>
        <img src="/images/leaf1.svg" class="top-[-104px] left-[-100%] md:left-[-111px] z-3 absolute pointer-events-none" alt="leaf1">   
        <img src="/images/leaf2.svg" class="top-[-75px] left-[596px] z-1 absolute pointer-events-none" alt="leaf2">   
        <img src="/images/leaf3.svg" class="right-[-200%] 2xl:right-0! bottom-[-110px] z-0 absolute pointer-events-none" alt="leaf3">  
    </div>

    <div class="gap-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 grid-flow-dense">
        <div class="bg-bg-tint p-6 rounded-xl text-center">
            <h3 class="text-lg md:text-xl">Przeważające Emocje</h3>
            <p class="my-2 font-bold text-accent text-xl">Radość</p>
            <p class="text-gray-500 text-sm md:text-base">Uczucie szczęścia i zadowolenia</p>
        </div>
        <div class="md:col-span-2 bg-bg-tint p-6 rounded-xl text-center">
            <h3 class="text-lg md:text-xl">Co mówią dane</h3>
            <p class="mt-2 text-gray-500 text-sm md:text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="bg-bg-tint p-6 rounded-xl text-center">
            <h3 class="text-lg md:text-xl">Sugestia #1</h3>
            <p class="mt-2 text-gray-500 text-sm md:text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>

    <div class="bg-bg-tint p-6 rounded-xl">
        <div class="flex flex-wrap gap-4 mb-4 border-b border-accent">
            <button class="px-4 py-2 rounded-t-xl cursor-pointer tabBtn--active week-report-btn">Raport tygodniowy</button>
            <button class="px-4 py-2 rounded-t-xl cursor-pointer tabBtn--normal month-report-btn">Raport miesięczny</button>
        </div>
        <p class="text-gray-500 text-sm week-report">
            Week Report <br>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur reprehenderit nisi consectetur laboriosam? Odit, inventore dolorem eius perspiciatis alias repudiandae itaque magnam nesciunt, quasi culpa molestias, similique facilis iste? Repudiandae!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur reprehenderit nisi consectetur laboriosam? Odit, inventore dolorem eius perspiciatis alias repudiandae itaque magnam nesciunt, quasi culpa molestias,
        </p>
        <p class="hidden text-gray-500 text-sm month-report">
            Month Report <br>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur reprehenderit nisi consectetur laboriosam? Odit, inventore dolorem eius perspiciatis alias repudiandae itaque magnam nesciunt, quasi culpa molestias, similique facilis iste? Repudiandae!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur reprehenderit nisi consectetur laboriosam? Odit, inventore dolorem eius perspiciatis alias repudiandae itaque magnam nesciunt, quasi culpa molestias,
        </p>
    </div>

    <div class="bg-bg-tint p-6 rounded-xl">
        <h3 class="mb-5 font-semibold text-header-gray text-lg md:text-xl 2xl:text-2xl text-center">Wykres nastroju z ostatnich 30 dni</h3>
        <div class="bg-gradient-to-b from-teal-300 to-white rounded">
            <canvas id="mainMoodChart"></canvas>
        </div>
    </div>

    <div class="gap-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4">
        <div class="bg-bg-tint p-6 rounded-xl text-center">
            <h3 class="font-semibold text-header-gray text-lg md:text-xl">Twój średni nastrój</h3>
            <div class="mt-5 font-bold text-accent text-4xl md:text-5xl">70%</div>
        </div>
        <div class="bg-bg-tint p-6 rounded-xl text-center">
            <h3 class="font-semibold text-header-gray text-lg md:text-xl">Streak aktywnych dni</h3>
            <div class="mt-5 font-bold text-accent text-4xl md:text-5xl">14</div>
        </div>
        <div class="bg-bg-tint p-6 rounded-xl text-center">
            <h3 class="font-semibold text-header-gray text-lg md:text-xl">Twoje wpisy</h3>
            <div class="mt-5 font-bold text-accent text-4xl md:text-5xl">253</div>
        </div>
        <div class="bg-bg-tint p-6 rounded-xl text-center">
            <h3 class="font-semibold text-header-gray text-lg md:text-xl">Liczba wykonanych ćwiczeń</h3>
            <div class="mt-5 font-bold text-accent text-4xl md:text-5xl">7</div>
        </div>
    </div>

    <!-- Dodatkowe wykresy -->
    <div class="gap-6 grid grid-cols-1 2lg:grid-cols-2">
        <div class="bg-bg-tint p-6 rounded-xl">
            <h3 class="mb-4 font-semibold text-lg md:text-xl text-center">Wykres 1</h3>
            <div class="bg-gradient-to-b from-teal-300 to-white rounded">
                <canvas id="chart1"></canvas>
            </div>
        </div>
        <div class="bg-bg-tint p-6 rounded-xl">
            <h3 class="mb-4 font-semibold text-lg md:text-xl text-center">Wykres 3</h3>
            <div class="bg-gradient-to-b from-teal-300 to-white rounded">
                <canvas id="chart3"></canvas>
            </div>
        </div>
        <div class="2lg:col-span-2 bg-bg-tint p-6 rounded-xl">
            <h3 class="mb-4 font-semibold text-lg md:text-xl text-center">Wykres 2</h3>
            <div class="bg-gradient-to-b from-teal-300 to-white rounded">
                <canvas id="chart2"></canvas>
            </div>
        </div>
    </div>
</main>

    
</body>
    <script>
        const weekReport = document.querySelector('.week-report');
        const monthReport = document.querySelector('.month-report');
        const weekButton = document.querySelector('.week-report-btn');
        const monthButton = document.querySelector('.month-report-btn');
        weekButton.addEventListener('click', () => {
            weekReport.classList.remove('hidden');
            monthReport.classList.add('hidden');

            weekButton.classList.add('tabBtn--active');
            weekButton.classList.remove('tabBtn--normal');

            monthButton.classList.remove('tabBtn--active');
            monthButton.classList.add('tabBtn--normal');
        });
        monthButton.addEventListener('click', () => {
            monthReport.classList.remove('hidden');
            weekReport.classList.add('hidden');

            monthButton.classList.add('tabBtn--active');
            monthButton.classList.remove('tabBtn--normal');
            
            weekButton.classList.remove('tabBtn--active');
            weekButton.classList.add('tabBtn--normal');
        });
    </script>
</html>