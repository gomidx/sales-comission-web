<?php

namespace App\Services;

use GuzzleHttp\Client;

class AuthService
{
    public function doRequest(array $payload, string $endpoint): array
    {
        try {
            $client = new Client();
    
            $url = 'http://127.0.0.1:8092/api' . $endpoint;
    
            $response = $client->post($url, [
                'json' => $payload, 
                'headers' => [
                    'Content-Type' => 'application/json', 
                    'Accept' => 'application/json',
                ],
            ]);
    
            return json_decode($response->getBody(), true);
        } catch (\Throwable $th) {
            return [
                'error' => $th->getMessage()
            ];
        }
    }
}