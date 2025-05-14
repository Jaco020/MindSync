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
            <a href="/mindExercises" class="px-4 py-2 rounded-xl hover:ring-1 hover:ring-accent hover:text-accent transition duration-300">Dziennik ćwiczeń</a>
            <a href="/mindExercises/list" class="bg-accent px-4 py-2 rounded-xl text-white">Zbiór ćwiczeń</a>
        </div>

        <div class="flex flex-wrap gap-4 bg-bg-tint p-4 rounded-xl">
            <div class="relative">
                <input type="text" placeholder="Wyszukaj" class="bg-bg-main px-4 py-2 pr-10 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full sm:w-auto text-gray-500 text-sm md:text-base" />
                <span class="top-1/2 right-4 absolute text-gray-500 -translate-y-1/2 transform">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
            </div>
            <select class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full sm:w-auto text-gray-500 text-sm md:text-base">
                <option>1. Łatwy</option>
                <option>2. Średni</option>
                <option>3. Trudny</option>
            </select>
            <select class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full sm:w-auto text-gray-500 text-sm md:text-base">
                <option>Poniżej 1 minuty</option>
                <option>Poniżej 5 minut</option>
                <option>10+ minut</option>
                <option>30+ minut</option>
                <option>1h+ godzin</option>
                <option>2h+ godzin</option>
            </select>
        </div>

        <div id="exerciseContainer" class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 grid-flow-dense">
            <a href="/mindExercises/addnew" class="flex flex-col justify-between bg-bg-tint p-4 rounded-xl hover:ring-2 hover:ring-accent min-h-[200px] text-gray-800 transition duration-300 cursor-pointer exercise-card">
                <div>
                    <h3 class="mb-1 font-semibold exercise-title">Nazwa - Trudność</h3>
                    <p class="text-gray-600 text-sm">Informacja o ćwiczeniu</p>
                </div>
                <div class="flex justify-between items-center mt-4 text-gray-500 text-sm">
                    <span>10 minut</span>
                    <i class="fa-chevron-right text-accent text-2xl md:text-3xl fa-solid"></i>
                </div>
            </a>
            <a class="flex flex-col justify-between bg-bg-tint p-4 rounded-xl hover:ring-2 hover:ring-accent min-h-[200px] text-gray-800 transition duration-300 cursor-pointer exercise-card">
                <div>
                    <h3 class="mb-1 font-semibold exercise-title">Nazwa - Trudność</h3>
                    <p class="text-gray-600 text-sm">Informacja o ćwiczeniu</p>
                </div>
                <div class="flex justify-between items-center mt-4 text-gray-500 text-sm">
                    <span>10 minut</span>
                    <i class="fa-chevron-right text-accent text-2xl md:text-3xl fa-solid"></i>
                </div>
            </a>
            <a href="/mindExercises/addnew" class="flex flex-col justify-between bg-bg-tint p-4 rounded-xl hover:ring-2 hover:ring-accent min-h-[200px] text-gray-800 transition duration-300 cursor-pointer exercise-card">
                <div>
                    <h3 class="mb-1 font-semibold exercise-title">Nazwa ćwiczenia o długiej nazwie - Trudność</h3>
                    <p class="text-gray-600 text-sm">Informacja o ćwiczeniu. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia fugiat numquam saepe mollitia obcaecati. Delectus, eos nisi mollitia culpa et earum, tempora cumque voluptatum corrupti deleniti quod error temporibus aliquam.</p>
                </div>
                <div class="flex justify-between items-center mt-4 text-gray-500 text-sm">
                    <span>10 minut</span>
                    <i class="fa-chevron-right text-accent text-2xl md:text-3xl fa-solid"></i>
                </div>
            </a>
            <a class="flex flex-col justify-between bg-bg-tint p-4 rounded-xl hover:ring-2 hover:ring-accent min-h-[200px] text-gray-800 transition duration-300 cursor-pointer exercise-card">
                <div>
                    <h3 class="mb-1 font-semibold exercise-title">Nazwa - Trudność</h3>
                    <p class="text-gray-600 text-sm">Informacja o ćwiczeniu</p>
                </div>
                <div class="flex justify-between items-center mt-4 text-gray-500 text-sm">
                    <span>10 minut</span>
                    <i class="fa-chevron-right text-accent text-2xl md:text-3xl fa-solid"></i>
                </div>
            </a>
            <a href="/mindExercises/addnew" class="flex flex-col justify-between bg-bg-tint p-4 rounded-xl hover:ring-2 hover:ring-accent min-h-[200px] text-gray-800 transition duration-300 cursor-pointer exercise-card">
                <div>
                    <h3 class="mb-1 font-semibold exercise-title">Nazwa ćwiczenia o długiej nazwie - Trudność</h3>
                    <p class="text-gray-600 text-sm">Informacja o ćwiczeniu. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia fugiat numquam saepe mollitia obcaecati. Delectus, eos nisi mollitia culpa et earum, tempora cumque voluptatum corrupti deleniti quod error temporibus aliquam.</p>
                </div>
                <div class="flex justify-between items-center mt-4 text-gray-500 text-sm">
                    <span>10 minut</span>
                    <i class="fa-chevron-right text-accent text-2xl md:text-3xl fa-solid"></i>
                </div>
            </a>
            <a href="/mindExercises/addnew" class="flex flex-col justify-between bg-bg-tint p-4 rounded-xl hover:ring-2 hover:ring-accent min-h-[200px] text-gray-800 transition duration-300 cursor-pointer exercise-card">
                <div>
                    <h3 class="mb-1 font-semibold exercise-title">Nazwa - Trudność</h3>
                    <p class="text-gray-600 text-sm">Informacja o ćwiczeniu</p>
                </div>
                <div class="flex justify-between items-center mt-4 text-gray-500 text-sm">
                    <span>10 minut</span>
                    <i class="fa-chevron-right text-accent text-2xl md:text-3xl fa-solid"></i>
                </div>
            </a>
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
