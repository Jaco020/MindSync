<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mindsync Chatbot Wsparcia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/086b12d3c8.js" crossorigin="anonymous"></script>
</head>

<body class="overflow-x-hidden flex min-h-screen">
    @include('partials.aside')
    
    <main class="flex-1 flex flex-col h-screen">
        <!-- Header -->
        <div class="bg-bg-tint p-4 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-accent rounded-full flex items-center justify-center">
                    <i class="fas fa-robot text-white"></i>
                </div>
                <div>
                    <h1 class="font-semibold text-lg">Asystent Wsparcia MindSync</h1>
                    <p class="text-gray-600 text-sm">Jestem tutaj, aby Ci pomóc</p>
                </div>
            </div>
        </div>

        <!-- Chat Messages Container -->
        <div id="chatContainer" class="flex-1 overflow-y-auto p-4 space-y-4 bg-bg-main">
            @if(empty($conversation))
                <!-- Welcome Message -->
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-accent rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-robot text-white text-sm"></i>
                    </div>
                    <div class="bg-bg-tint p-3 rounded-lg rounded-tl-none max-w-xs lg:max-w-md">
                        <p class="text-gray-800">Cześć! Jestem Twoim asystentem wsparcia. Jak mogę Ci dziś pomóc?</p>
                    </div>
                </div>
            @else
                <!-- Historia konwersacji -->
                @foreach($conversation as $message)
                    @if($message['role'] === 'user')
                        <div class="flex items-start gap-3 justify-end">
                            <div class="bg-accent text-white p-3 rounded-lg rounded-tr-none max-w-xs lg:max-w-md">
                                <p>{{ $message['content'] }}</p>
                            </div>
                            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user text-gray-600 text-sm"></i>
                            </div>
                        </div>
                    @elseif($message['role'] === 'assistant')
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-accent rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-robot text-white text-sm"></i>
                            </div>
                            <div class="bg-bg-tint p-3 rounded-lg rounded-tl-none max-w-xs lg:max-w-md">
                                <p class="text-gray-800">{{ $message['content'] }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        <!-- Input Area -->
        <div class="bg-bg-tint border-t border-gray-200 p-4">
            <form id="chatForm" class="flex gap-3">
                <div class="flex-1 relative">
                    <input 
                        type="text" 
                        id="messageInput" 
                        placeholder="Napisz swoją wiadomość..." 
                        class="w-full bg-bg-main px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent text-gray-700 pr-12"
                        autocomplete="off"
                    >
                    <button 
                        type="button" 
                        id="micButton" 
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-accent transition-colors"
                    >
                    </button>
                </div>
                <button 
                    type="submit" 
                    id="sendButton"
                    class="bg-accent hover:bg-accent-strong text-white px-6 py-3 rounded-xl transition-colors flex items-center justify-center"
                >
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </main>
</body>
</html>