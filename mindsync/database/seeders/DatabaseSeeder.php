<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\JournalEntry;
use App\Models\MindfulnessExercise;
use App\Models\UserProgress;
use App\Models\Emotion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        
        $user = User::create([
            'name' => 'Jan Kowalski',
            'email' => 'jan@example.com',
            'password' => Hash::make('password123'),
            'profile_picture' => 'default-avatar.png',
            'phone_number' => '+48123456789',
            'birth_date' => '1990-05-15',
            'gender' => 'male',
            'bio' => 'Pasjonat medytacji i praktyk mindfulness, pracuje jako programista.',
            'notifications_enabled' => true,
            'last_login_at' => now(),
            'accepted_terms' => true,
        ]);

       
        $exercises = [
            [
                'title' => 'Świadome oddychanie',
                'description' => 'Proste ćwiczenie skupiające się na oddechu, idealne dla początkujących.',
                'instructions' => "1. Usiądź wygodnie z prostymi plecami.\n2. Zamknij oczy lub skieruj wzrok w dół.\n3. Skup uwagę na swoim oddechu.\n4. Zauważaj wdech i wydech.\n5. Gdy umysł wędruje, delikatnie wróć do oddechu.",
                'duration_minutes' => 5,
                'difficulty' => 'Łatwy',
            ],
            [
                'title' => 'Skanowanie ciała',
                'description' => 'Ćwiczenie pomagające budować świadomość ciała i rozluźniać napięcia.',
                'instructions' => "1. Połóż się na plecach.\n2. Zacznij od skupienia na stopach.\n3. Powoli przenoś uwagę na kolejne części ciała - łydki, kolana, uda itd.\n4. Zauważaj wszelkie odczucia bez osądzania.\n5. Zakończ świadomością całego ciała.",
                'duration_minutes' => 15,
                'difficulty' => 'Średni',
            ],
            [
                'title' => 'Medytacja życzliwości',
                'description' => 'Ćwiczenie rozwijające współczucie dla siebie i innych.',
                'instructions' => "1. Usiądź wygodnie i zrelaksuj się.\n2. Zacznij od życzenia sobie dobra: \"Niech będę szczęśliwy i zdrowy\".\n3. Następnie skieruj życzenia do bliskiej osoby.\n4. Potem do osoby neutralnej, potem trudnej.\n5. Na końcu do wszystkich istot.",
                'duration_minutes' => 20,
                'difficulty' => 'Trudny',
            ],
        ];

        foreach ($exercises as $exercise) {
            MindfulnessExercise::create($exercise);
        }

        
        $journalEntries = [
            [
                'user_id' => $user->id,
                'content' => 'Dzisiaj czuję się dobrze. Poranek zacząłem od medytacji, co dało mi energię na cały dzień.',
                'mood_rating' => 5,
                'mood_type' => 'happy',
                'date' => Carbon::now()->subDays(1)
            ],
            [
                'user_id' => $user->id,
                'content' => 'Trudny dzień w pracy. Dużo stresu, ale udało mi się znaleźć chwilę na głęboki oddech.',
                'mood_rating' => 4,
                'mood_type' => 'anxious',
                'date' => Carbon::now()->subDays(2)
            ],
            [
                'user_id' => $user->id,
                'content' => 'Spotkałem się z przyjaciółmi. Czuję się zrelaksowany i zadowolony.',
                'mood_rating' => 2,
                'mood_type' => 'calm',
                'date' => Carbon::now()->subDays(3)
            ],
        ];

        foreach ($journalEntries as $entry) {
            JournalEntry::create($entry);
        }

       
        $emotions = [
            ['name' => 'Radość', 'category' => 'primary', 'description' => 'Uczucie szczęścia i zadowolenia'],
            ['name' => 'Smutek', 'category' => 'primary', 'description' => 'Uczucie przygnębienia i żalu'],
            ['name' => 'Złość', 'category' => 'primary', 'description' => 'Uczucie irytacji i gniewu'],
            ['name' => 'Strach', 'category' => 'primary', 'description' => 'Uczucie niepokoju i zagrożenia'],
            ['name' => 'Spokój', 'category' => 'secondary', 'description' => 'Uczucie równowagi i braku niepokoju'],
            ['name' => 'Duma', 'category' => 'secondary', 'description' => 'Uczucie satysfakcji z osiągnięć'],
        ];

        foreach ($emotions as $emotion) {
            Emotion::create($emotion);
        }

        
        UserProgress::create([
            'user_id' => $user->id,
            'exercise_id' => 1,
            'completed_date' => now()->subDays(2),
            'rating' => 4,
            'notes' => 'Bardzo pomocne ćwiczenie. Czułem się spokojniejszy po jego wykonaniu.',
        ]);
    }
}