document.addEventListener('DOMContentLoaded', () => {
    
    const chatContainer = document.getElementById('chatContainer');
    const chatForm = document.getElementById('chatForm');
    const messageInput = document.getElementById('messageInput');
    const sendButton = document.getElementById('sendButton');

    function scrollToBottom() {
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    scrollToBottom();

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

    function removeTypingIndicator() {
        const typingIndicator = document.getElementById('typingIndicator');
        if (typingIndicator) {
            typingIndicator.remove();
        }
    }

    chatForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const message = messageInput.value.trim();
        if (!message) return;

        sendButton.disabled = true;
        sendButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

        addUserMessage(message);
        messageInput.value = '';
        
        showTypingIndicator();

        try {
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
            
            removeTypingIndicator();
            
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
            sendButton.disabled = false;
            sendButton.innerHTML = '<i class="fas fa-paper-plane"></i>';
            messageInput.focus();
        }
    });
    messageInput.focus();
});