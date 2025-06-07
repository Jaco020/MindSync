<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    private $apiUrl = 'https://llm.chutes.ai/v1/chat/completions';
    private $apiToken;

    public function __construct()
    {
        $this->apiToken = env('CHATBOT_API_TOKEN');
    }

    public function showChatbot(Request $request)
    {
        $userId = auth()->id();
        $sessionKey = "chatbot_conversation_user_{$userId}";
        $conversation = $request->session()->get($sessionKey, []);
    
        return view('account.chatbot', compact('conversation'));
    }

    public function sendMessage(Request $request): JsonResponse
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);
    
        $userMessage = $request->input('message');
        $userId = auth()->id();
        
        try {
            // Pobierz historię z sesji dla konkretnego użytkownika
            $sessionKey = "chatbot_conversation_user_{$userId}";
            $conversation = $request->session()->get($sessionKey, []);
            
            // Dodaj nową wiadomość użytkownika do historii
            $conversation[] = [
                'role' => 'user',
                'content' => $userMessage
            ];
            
            $response = $this->callChatAPI($conversation);
            
            // Dodaj odpowiedź bota do historii
            $conversation[] = [
                'role' => 'assistant',
                'content' => $response
            ];
            
            // Zapisz zaktualizowaną historię w sesji
            $request->session()->put($sessionKey, $conversation);
            
            return response()->json([
                'success' => true,
                'response' => $response,
                'user_message' => $userMessage
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'response' => 'Przepraszam, wystąpił błąd techniczny. Spróbuj ponownie za chwilę.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    private function callChatAPI(array $conversation): string
    {
        // Zawsze zaczynaj od wiadomości systemowej
        $messages = [
            [
                'role' => 'system',
                'content' => 'Jesteś pomocnym asystentem wsparcia psychicznego dla aplikacji MindSync. 
                Odpowiadaj po polsku w empatyczny i wspierający sposób. 
                Pomagaj użytkownikom z problemami związanymi ze zdrowiem psychicznym, stresem, lękiem i mindfulness. 
                Bądź ciepły, zrozumiały i profesjonalny. Jeśli użytkownik potrzebuje poważnej pomocy medycznej, 
                delikatnie zasugeruj skontaktowanie się z profesjonalistą. 
                Nie odpowiadaj na zagadnienia nie związane ze zdrowiem psychicznym ani nie angażuj się w rozmowy o polityce,
                religii czy innych kontrowersyjnych tematach. 
                Twoim celem jest wsparcie użytkownika i pomoc w poprawie jego samopoczucia.',
            ]
        ];
    
        // Dodaj historię konwersacji (ograniczoną do ostatnich 20 wiadomości)
        $recentConversation = array_slice($conversation, -20);
        $messages = array_merge($messages, $recentConversation);
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiToken,
            'Content-Type' => 'application/json'
        ])->post($this->apiUrl, [
            'model' => 'deepseek-ai/DeepSeek-V3-0324',
            'messages' => $messages,
            'stream' => false,
            'max_tokens' => 1024,
            'temperature' => 0.7
        ]);
    
        if (!$response->successful()) {
            throw new \Exception('API request failed: ' . $response->body());
        }
    
        $data = $response->json();
        
        if (!isset($data['choices'][0]['message']['content'])) {
            throw new \Exception('Invalid API response format');
        }
    
        return $data['choices'][0]['message']['content'];
    }
    
    // Dodaj metodę do pobierania historii
    public function getConversationHistory(Request $request): JsonResponse
    {
        $userId = auth()->id();
        $sessionKey = "chatbot_conversation_user_{$userId}";
        $conversation = $request->session()->get($sessionKey, []);
        
        return response()->json([
            'success' => true,
            'conversation' => $conversation
        ]);
    }
}