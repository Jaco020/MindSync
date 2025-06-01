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

    public function showChatbot()
    {
        return view('account/chatbot');
    }

    public function sendMessage(Request $request): JsonResponse
    {

        $request->validate([
            'message' => 'required|string|max:1000'
        ]); // Przenieść walidację do FormRequest albo nie

        $userMessage = $request->input('message');
        
        try {
            $response = $this->callChatAPI($userMessage);
            
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

    private function callChatAPI(string $userMessage): string
    {
        $messages = [
            [
                'role' => 'system',
                'content' => 'Jesteś pomocnym asystentem wsparcia psychicznego dla aplikacji MindSync. Odpowiadaj po polsku w empatyczny i wspierający sposób. Pomagaj użytkownikom z problemami związanymi ze zdrowiem psychicznym, stresem, lękiem i mindfulness. Bądź ciepły, zrozumiały i profesjonalny. Jeśli użytkownik potrzebuje poważnej pomocy medycznej, delikatnie zasugeruj skontaktowanie się z profesjonalistą.'
            ],
            [
                'role' => 'user',
                'content' => $userMessage
            ]
        ];

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
}