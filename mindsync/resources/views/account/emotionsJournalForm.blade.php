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
            <!-- Backend todo: Wyświetl tylko jeśli Edytujemy -->
            <!-- <form action="" class="absolute top-4 right-4" method="POST">
                <button type="submit" class="cursor-pointer hover:bg-red-800 w-4 h-4 bg-red-700 text-white rounded-full p-4 grid place-content-center transition duration-300"><i class="fa-solid fa-trash-can"></i></button>
            </form> -->
            <h2 class="text-lg md:text-xl 2xl:text-2xl font-semibold text-header-gray">
                Dodaj nowy wpis
                <!-- Edytuj swój wpis -->
            </h2>
            <div class="space-y-5 mt-8">
                <div class="flex items-center">
                    <label for="dateIn" class="text-gray-600 mr-4">Data: </label>
                    <input type="date" name="dateIn" id="dateIn" class="px-3 py-2 rounded-xl bg-bg-main focus:outline-none focus:ring-2 focus:ring-accent text-gray-500" required>
                </div>
                <div class="flex items-center">
                    <label for="moodIn" class="text-gray-600 mr-4">Twój nastrój:</label>
                    <div class="flex flex-col items-center ">
                        <div class="flex items-center mb-2">
                            <img id="moodImage" src="emotion3.png" alt="Nastrój" class="h-8 mr-2">
                            <span id="moodDescription" class="text-gray-700 font-medium">Średni (5)</span>
                        </div>
                        <input type="range" name="moodIn" id="moodIn" min="1" max="10" value="5" class="inputRange" required>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <label for="tagsInput" class="text-gray-600">Tagi:</label>
                    <div id="tagContainer" class="groupd flex flex-wrap items-center px-3 py-2 bg-bg-main rounded-xl gap-2  w-[80%] md:w-[300px] focus-within:ring-2 focus-within:ring-accent">
                        <!-- Tag items will appear here -->
                        <input type="text" id="tagsInput" class="bg-transparent outline-none flex-1 min-w-[80px]" placeholder="+ Dodaj tag (enter)">
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="journalText" class="text-gray-600 mb-4">Treść wpisu: </label>
                    <textarea placeholder="Twój opis dnia" name="journalText" id="journalTetx" class="p-3 rounded-xl bg-bg-main focus:outline-none focus:ring-2 focus:ring-accent resize-none h-80 text-gray-500"></textarea>
                </div>
                <div class="flex justify-end items-center gap-4 text-center">
                    <a href="/emotions/journal" class="cursor-pointer border-accent border text-accent rounded-2xl block md:px-8 py-2 hover:border-accent-strong hover:text-accent-strong transition duration-300 w-[100px] md:w-auto">Anuluj</a>
                    <button class="md:px-8 py-2 bg-accent text-white rounded-2xl w-[100px] md:w-auto hover:bg-accent-strong cursor-pointer transition duration-300">
                        Zapisz
                        <!-- Isset addnew ? >> Zapis : Aktaulizuj  -->
                         <!-- ten formularz ma służyc do aktaualizacji, dodwania i usuwania -->
                    </button>
                </div>
            </div>
        </div>
    </main>
    <script>
        const moodDescriptions = [
            { range: [1, 1], text: "Okropny (1)", image: "/images/emotion1.png" },
            { range: [2, 2], text: "Okropny (2)", image: "/images/emotion1.png" },
            { range: [3, 3], text: "Zły (3)", image: "/images/emotion2.png" },
            { range: [4, 4], text: "Zły (4)", image: "/images/emotion2.png" },
            { range: [5, 5], text: "Średni (5)", image: "/images/emotion3.png" },
            { range: [6, 6], text: "Średni (6)", image: "/images/emotion3.png" },
            { range: [7, 7], text: "Dobry (7)", image: "/images/emotion4.png" },
            { range: [8, 8], text: "Dobry (8)", image: "/images/emotion4.png" },
            { range: [9, 9], text: "Wspaniały (9)", image: "/images/emotion5.png" },
            { range: [10, 10], text: "Wspaniały (10)", image: "/images/emotion5.png" },
        ];

        const moodInput = document.getElementById('moodIn');
        const moodDesc = document.getElementById('moodDescription');
        const moodImg = document.getElementById('moodImage');

        const existingTags = ['Studia', 'Praca', 'Wypoczynek'];
        const input = document.getElementById('tagsInput');
        const container = document.getElementById('tagContainer');

        const addedTags = new Set();

        function createTagElement(text) {
            const span = document.createElement('span');
            span.className = 'bg-accent text-white px-3 py-1 rounded-full flex items-center';
            span.innerHTML = `${text}<button class="ml-2 text-white hover:text-gray-200" onclick="this.parentElement.remove(); addedTags.delete('${text}')">&times;</button>`;
            return span;
        }

        input.addEventListener('keydown', (e) => {
            if ((e.key === 'Enter' || e.key === ',') && input.value.trim() !== '') {
            e.preventDefault();
            const value = input.value.trim().replace(',', '');
            if (!addedTags.has(value)) {
                addedTags.add(value);
                const tagEl = createTagElement(value);
                container.insertBefore(tagEl, input);
            }
            input.value = '';
            }
        });

        // Optional: autocomplete based on existingTags
        input.addEventListener('input', () => {
            // Autocomplete logic here (can be expanded later)
        });

        function updateMoodDisplay(value) {
            const mood = moodDescriptions.find(m =>
                value >= m.range[0] && value <= m.range[1]
            );
            if (mood) {
                moodDesc.textContent = mood.text;
                moodImg.src = mood.image;
            }
        }

        // Initial update
        updateMoodDisplay(moodInput.value);

        // Listen for changes
        moodInput.addEventListener('input', (e) => {
            updateMoodDisplay(Number(e.target.value));
        });
    </script>
</body>
</html>