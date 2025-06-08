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

    <main class="flex flex-col bg-gray-50 mx-auto mt-10 p-10 rounded-2xl w-full">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl">Zarządzanie Użytkownikami</h2>
            <a href="{{ route('admin.users.addnew') }}" class="block hover:bg-accent px-4 py-2 border border-accent rounded-2xl text-accent hover:text-white duration-300 ease-linear cursor-pointer">
                <i class="mr-2 fas fa-plus"></i> Dodaj Użytkownika
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="bg-white border border-gray-200 rounded-lg min-w-full text-gray-700 text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
                    <tr class="border-gray-200 border-b">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nazwa</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Telefon</th>
                        <th class="px-4 py-3">Rola</th>
                        <th class="px-4 py-3">Data rejestracji</th>
                        <th class="px-4 py-3">Ostatnie logowanie</th>
                        <th class="px-4 py-3">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 border-gray-300 border-b">
                            <td class="px-4 py-3">{{ $user->id }}</td>
                            <td class="px-4 py-3">{{ $user->name }}</td>
                            <td class="px-4 py-3">{{ $user->email }}</td>
                            <td class="px-4 py-3">{{ $user->phone_number ?? 'Brak' }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded-full text-xs font-medium 
                                    {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ ucfirst($user->role ?? 'user') }}
                                </span>
                            </td>
                            <td class="px-4 py-3">{{ $user->created_at->format('d.m.Y') }}</td>
                            <td class="px-4 py-3">
                                {{ $user->last_login_at ? $user->last_login_at->format('d.m.Y H:i') : 'Nigdy' }}
                            </td>
                            <td class="space-x-2 px-4 py-3">
                                <a href="{{ route('admin.users.edit', $user->id) }}" 
                                   class="inline-block bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-white"
                                   title="Edytuj użytkownika">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="deleteUser({{ $user->id }})" 
                                        class="inline-block bg-red-500 hover:bg-red-600 px-2 py-1 rounded text-white cursor-pointer"
                                        title="Usuń użytkownika">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                                Brak użytkowników w systemie
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->count() > 0)
            <div class="mt-4 text-sm text-gray-600">
                Łącznie użytkowników: {{ $users->count() }}
            </div>
        @endif
    </main>

    <script>
        function deleteUser(userId) {
            if (confirm('Czy na pewno chcesz usunąć tego użytkownika? Ta akcja jest nieodwracalna.')) {
                // Tworzymy formularz do wysłania żądania DELETE
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/users/delete/${userId}`;
                
                // Dodajemy token CSRF
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);
                
                // Dodajemy metodę DELETE
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);
                
                // Dodajemy formularz do strony i wysyłamy
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>