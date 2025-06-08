<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="px-[2%] min-h-screen overflow-x-hidden">
    @include('admin.adminNav')

    <main class="flex flex-col bg-gray-50 mx-auto mt-10 p-10 rounded-xl w-full max-w-4xl">
        <h2 class="mb-6 text-xl text-center">
            {{ isset($user) ? 'Edytuj Użytkownika' : 'Dodaj Użytkownika' }}
        </h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" class="space-y-4">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif

            <div>
                <label for="name" class="block mb-1 font-medium text-sm">Nazwa *</label>
                <input type="text" id="name" name="name" 
                       value="{{ old('name', isset($user) ? $user->name : '') }}" 
                       class="adminInput" required>
            </div>

            <div class="gap-4 grid grid-cols-1 md:grid-cols-2">
                <div>
                    <label for="email" class="block mb-1 font-medium text-sm">Email *</label>
                    <input type="email" id="email" name="email" 
                           value="{{ old('email', isset($user) ? $user->email : '') }}" 
                           class="adminInput" required>
                </div>
                <div>
                    <label for="password" class="block mb-1 font-medium text-sm">
                        Hasło {{ isset($user) ? '(pozostaw puste, aby nie zmieniać)' : '*' }}
                    </label>
                    <input type="password" id="password" name="password" 
                           class="adminInput" {{ !isset($user) ? 'required' : '' }}>
                </div>
            </div>

            <div class="gap-4 grid grid-cols-1 md:grid-cols-2">
                <div>
                    <label for="phone_number" class="block mb-1 text-sm">Numer Telefonu</label>
                    <input type="text" id="phone_number" name="phone_number" 
                           value="{{ old('phone_number', isset($user) ? $user->phone_number : '') }}" 
                           class="adminInput">
                </div>
                <div>
                    <label for="birth_date" class="block mb-1 text-sm">Data Urodzenia</label>
                    <input type="date" id="birth_date" name="birth_date" 
                           value="{{ old('birth_date', isset($user) && $user->birth_date ? $user->birth_date->format('Y-m-d') : '') }}" 
                           class="adminInput">
                </div>
            </div>

            <div class="gap-4 grid grid-cols-1 md:grid-cols-2">
                <div>
                    <label for="gender" class="block mb-1 text-sm">Płeć</label>
                    <select id="gender" name="gender" class="adminInput">
                        <option value="">Wybierz płeć</option>
                        <option value="male" {{ old('gender', isset($user) ? $user->gender : '') == 'male' ? 'selected' : '' }}>Mężczyzna</option>
                        <option value="female" {{ old('gender', isset($user) ? $user->gender : '') == 'female' ? 'selected' : '' }}>Kobieta</option>
                    </select>
                </div>
                <div>
                    <label for="role" class="block mb-1 text-sm">Rola *</label>
                    <select id="role" name="role" class="adminInput" required>
                        <option value="user" {{ old('role', isset($user) ? $user->role : 'user') == 'user' ? 'selected' : '' }}>Użytkownik</option>
                        <option value="admin" {{ old('role', isset($user) ? $user->role : '') == 'admin' ? 'selected' : '' }}>Administrator</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="bio" class="block mb-1 text-sm">Opis</label>
                <textarea id="bio" name="bio" class="adminInput" rows="4">{{ old('bio', isset($user) ? $user->bio : '') }}</textarea>
            </div>

            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <input type="checkbox" id="notifications_enabled" name="notifications_enabled" value="1" 
                           {{ old('notifications_enabled', isset($user) ? $user->notifications_enabled : false) ? 'checked' : '' }} 
                           class="mr-1 accent-accent">
                    <label for="notifications_enabled" class="text-sm">Włącz Powiadomienia</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="accepted_terms" name="accepted_terms" value="1" 
                           {{ old('accepted_terms', isset($user) ? $user->accepted_terms : false) ? 'checked' : '' }} 
                           {{ !isset($user) ? 'required' : '' }} 
                           class="mr-1 accent-accent">
                    <label for="accepted_terms" class="text-sm">Akceptuję Regulamin {{ !isset($user) ? '*' : '' }}</label>
                </div>
            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <a href="{{ route('admin.users.list') }}" class="block py-2 border border-accent hover:border-accent-strong rounded-2xl w-[100px] text-accent text-center transition duration-300 hover:text-accent-strong cursor-pointer">Anuluj</a>
                <button type="submit" class="bg-accent py-2 rounded-2xl w-[120px] text-white transition duration-300 hover:bg-accent-strong cursor-pointer">
                    {{ isset($user) ? 'Aktualizuj' : 'Dodaj' }}
                </button>
            </div>
        </form>
    </main>
</body>
</html>