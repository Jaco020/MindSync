<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindSync Ustawienia</title>
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

        <h1 class="text-header-gray text-2xl">Ustawienia</h1>
        <div class="gap-6 grid grid-cols-1 lg:grid-cols-2">
 
            <div class="bg-bg-tint p-6 rounded-md">
                <h2 class="mb-4 pb-2 border-gray-400 border-b-2 font-semibold text-lg">Moje Konto</h2>
                <form method="POST" action="{{route('user.updateUserDetails')}}">
                    @csrf
                    <div class="space-y-3">
                    <div>
                        <label class="text-gray-600 text-sm">Nazwa</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="gap-4 grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <label class="text-gray-600 text-sm">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="text-gray-600 text-sm">Nr telefonu</label>
                            <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500">
                            @error('phone_number')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="text-gray-600 text-sm">Data urodzenia</label>
                            <input type="date" name="birth_date" value="{{ old('birth_date', $user->birth_date ? $user->birth_date->format('Y-m-d') : '') }}"  class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500">
                            @error('birth_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="text-gray-600 text-sm">Płeć</label>
                            <select name="gender" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500">
                                <option value="">Wybierz</option>
                                <option value="Mężczyzna" {{ old('gender', $user->gender) == 'Mężczyzna' ? 'selected' : '' }}>Mężczyzna</option>
                                <option value="Kobieta" {{ old('gender', $user->gender) == 'Kobieta' ? 'selected' : '' }}>Kobieta</option>
                                <option value="Inne" {{ old('gender', $user->gender) == 'Inne' ? 'selected' : '' }}>Inne</option>
                            </select>
                            @error('gender')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label class="text-gray-600 text-sm">Bio</label>
                        <textarea rows="8" name="bio" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500 resize-none">{{ old('bio', $user->bio) }}</textarea>
                        @error('bio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-accent mt-2 px-6 py-2 rounded-xl text-white transition duration-300 hover:bg-accent-strong cursor-pointer">Zapisz</button>
                    </div>
                </div>
            </form>
            </div>

            <div class="flex flex-col gap-6">
                <div class="bg-bg-tint p-6 rounded-md">
                <h2 class="mb-4 pb-2 border-b font-semibold text-lg">Zmień hasło</h2>
                <form method="POST" action="{{ route('user.updatePassword') }}">
                    @csrf
                    <div class="space-y-3">
                        <div>
                            <input type="password" name="current_password" placeholder="Stare hasło" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500">
                            @error('current_password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Nowe hasło" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500">
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input type="password" name="password_confirmation" placeholder="Nowe hasło ponownie" class="bg-bg-main px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent w-full text-gray-500">
                            @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-accent px-6 py-2 rounded-xl text-white transition duration-300 hover:bg-accent-strong cursor-pointer">Zapisz</button>
                        </div>
                    </div>
                </form>
            </div>

                <div class="bg-bg-tint p-6 rounded-md">
                    <h2 class="mb-2 font-semibold text-red-600 text-lg">Usuwanie konta</h2>
                    <p class="mb-4 text-black text-sm">Tej akcji nie można cofnąć! Wszystkie twoje dane zostaną usunięte.</p>
                    <div class="flex justify-end">
                        <form method="POST" action="{{ route('user.delete') }}" onsubmit="return confirm('Czy na pewno chcesz usunąć swoje konto? Ta operacja jest nieodwracalna!')">
                            @csrf
                            <button type="submit" class="bg-red-600 hover:bg-red-700 px-6 py-2 rounded-xl text-white transition duration-300 cursor-pointer">
                                Usuń konto
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>