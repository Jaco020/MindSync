<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mindsync Chatbot Wsparcia</title>
    @vite('resources/css/app.css')
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
            <!-- Welcome Message -->
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-accent rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-robot text-white text-sm"></i>
                </div>
                <div class="bg-bg-tint p-3 rounded-lg rounded-tl-none max-w-xs lg:max-w-md">
                    <p class="text-gray-800">Cześć! Jestem Twoim asystentem wsparcia. Jak mogę Ci dziś pomóc?</p>
                </div>
            </div>
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

    <script>
        const chatContainer = document.getElementById('chatContainer');
        const chatForm = document.getElementById('chatForm');
        const messageInput = document.getElementById('messageInput');
        const sendButton = document.getElementById('sendButton');

        // Auto-scroll to bottom
        function scrollToBottom() {
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        // Add user message to chat
        function addUserMessage(message) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'flex items-start gap-3 justify-end';
            messageDiv.innerHTML = `
                <div class="bg-accent text-white p-3 rounded-lg rounded-tr-none max-w-xs lg:max-w-md">
                    <p>${message}</p>
                </div>
                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user text-gray-600 text-sm"></i>
                </div>
            `;
            chatContainer.appendChild(messageDiv);
            scrollToBottom();
        }

        // Add bot message to chat
        function addBotMessage(message) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'flex items-start gap-3';
            messageDiv.innerHTML = `
                <div class="w-8 h-8 bg-accent rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-robot text-white text-sm"></i>
                </div>
                <div class="bg-bg-tint p-3 rounded-lg rounded-tl-none max-w-xs lg:max-w-md">
                    <p class="text-gray-800">${message}</p>
                </div>
            `;
            chatContainer.appendChild(messageDiv);
            scrollToBottom();
        }

        // Show typing indicator
        function showTypingIndicator() {
            const typingDiv = document.createElement('div');
            typingDiv.id = 'typingIndicator';
            typingDiv.className = 'flex items-start gap-3';
            typingDiv.innerHTML = `
                <div class="w-8 h-8 bg-accent rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-robot text-white text-sm"></i>
                </div>
                <div class="bg-bg-tint p-3 rounded-lg rounded-tl-none">
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    </div>
                </div>
            `;
            chatContainer.appendChild(typingDiv);
            scrollToBottom();
        }

        // Remove typing indicator
        function removeTypingIndicator() {
            const typingIndicator = document.getElementById('typingIndicator');
            if (typingIndicator) {
                typingIndicator.remove();
            }
        }

        // Handle form submission
        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const message = messageInput.value.trim();
            if (!message) return;

            // Disable send button during request
            sendButton.disabled = true;
            sendButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

            // Add user message
            addUserMessage(message);
            messageInput.value = '';
            
            // Show typing indicator
            showTypingIndicator();

            try {
                // Fetch to Laravel controller
                const response = await fetch('/chatbot/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        message: message
                    })
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                
                // Remove typing indicator
                removeTypingIndicator();
                
                // Add bot response
                if (data.success && data.response) {
                    addBotMessage(data.response);
                } else {
                    addBotMessage('Przepraszam, wystąpił błąd. Spróbuj ponownie.');
                }

            } catch (error) {
                console.error('Error:', error);
                removeTypingIndicator();
                addBotMessage('Przepraszam, nie mogę teraz odpowiedzieć. Sprawdź połączenie internetowe i spróbuj ponownie.');
            } finally {
                // Re-enable send button
                sendButton.disabled = false;
                sendButton.innerHTML = '<i class="fas fa-paper-plane"></i>';
                messageInput.focus();
            }
        });

        // Auto-focus input
        messageInput.focus();
    </script>
</body>

</html>