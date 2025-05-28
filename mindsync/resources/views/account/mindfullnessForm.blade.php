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
            <h2 class="font-semibold text-xl 2xl:text-2xl">Nazwa Ćwiczenia</h2>
            <p class="text-gray-600">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>
                Vestibulum justo neque, interdum quis purus id, convallis scelerisque purus.<br>
                Suspendisse vel tempus magna, eget pellentesque urna.
            </p>

            <div>
                <h3 class="mb-2 font-semibold">Instrukcje:</h3>
                <p class="text-gray-600">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>
                    Vestibulum justo neque, interdum quis purus id, convallis scelerisque purus.<br>
                    Suspendisse vel tempus magna, eget pellentesque urna.
                </p>
            </div>

            <div class="flex md:flex-row flex-col md:items-center gap-4">
                <label for="exerciseDate" class="font-medium text-gray-700">Data wykonania ćwiczenia:</label>
                <input type="date" id="exerciseDate" name="exerciseDate" value="2025-04-09" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent text-gray-500">
            </div>

            <div class="flex md:flex-row flex-col md:items-center gap-4">
                <label for="moodSelect" class="font-medium text-gray-700">Jak się czujesz po ćwiczeniu:</label>
                <div class="relative flex items-center gap-2">
                    <img src="/images/emotion4.png" alt="Dobrze" class="left-3 absolute w-6 h-6 moodImage">
                    <select id="moodSelect" name="moodSelect" class="bg-bg-main px-4 py-2 pl-[40px] rounded-xl focus:outline-none focus:ring-2 focus:ring-accent text-gray-700">
                        <option value="1">1. Okropnie</option>
                        <option value="2">2. Źle</option>
                        <option value="3">3. Średnio</option>
                        <option value="4" selected>4. Dobrze</option>
                        <option value="5">5. Wspaniale</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col">
                <label for="notes" class="mb-2 font-medium text-gray-700">Notatka:</label>
                <textarea id="notes" name="notes" placeholder="Podaj swoje przemyślenia" class="bg-bg-main p-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent h-40 text-gray-600 resize-none"></textarea>
            </div>

            <div class="flex flex-wrap justify-center md:justify-end gap-4">
                <a href="/mindExercises/list" class="px-6 py-2 border border-accent hover:border-accent-strong rounded-2xl w-full xsm:w-auto text-accent text-center transition duration-300 hover:text-accent-strong">Powrót</a>
                <button class="bg-accent px-6 py-2 rounded-2xl w-full xsm:w-auto text-white text-center transition duration-300 hover:bg-accent-strong">Wykonane</button>
            </div>
        </div>

    </main>
    <script>
        const moodSelect = document.getElementById('moodSelect');
        const moodImage = document.querySelector('.moodImage');
        const moodDescriptions = [
            { src: '/images/emotion1.png', alt: 'Okropnie' },
            { src: '/images/emotion2.png', alt: 'Źle' },
            { src: '/images/emotion3.png', alt: 'Średnio' },
            { src: '/images/emotion4.png', alt: 'Dobrze' },
            { src: '/images/emotion5.png', alt: 'Wspaniale' }
        ];
        moodSelect.addEventListener('change', function() {
            const selectedValue = parseInt(moodSelect.value);
            const mood = moodDescriptions[selectedValue - 1];
            
            moodImage.src = mood.src;
            moodImage.alt = mood.alt;
        });
    </script>
</body>
</html>
