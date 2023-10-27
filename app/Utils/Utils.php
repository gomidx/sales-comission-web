<?php

namespace App\Utils;

use GuzzleHttp\Client;

class Utils
{
    public static function buildError(mixed $error): string
    {
        if (! empty($error)) {
            return 'Ops, ocorreu um erro: ' . $error;
        }

        return 'Erro interno, contate um administrador do sistema.';
    }

    public static function doRequestWithoutToken(array $payload, string $endpoint, string $method = 'post'): array
    {
        try {
            $client = new Client();

            $url = 'http://127.0.0.1:8092/api' . $endpoint;

            $response = $client->$method($url, [
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

    public static function doRequestWithToken(string $method, array $payload, string $endpoint): array
    {
        try {
            $client = new Client();

            $url = 'http://127.0.0.1:8092/api' . $endpoint;

            $response = $client->$method($url, [
                'json' => $payload,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('api_token'),
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
