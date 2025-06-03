<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TwitchServices
{
    protected $clientId;
    protected $clientSecret;

    public function __construct()
    {
        $this->clientId = config('services.twitch.client_id');
        $this->clientSecret = config('services.twitch.client_secret');
    }

    public function getAccessToken()
    {
        $response = Http::asForm()->post('https://id.twitch.tv/oauth2/token', [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'client_credentials',
        ]);

        if ($response->failed()) {
            return null;
        }

        return $response->json()['access_token'] ?? null;
    }

    public function getUserById($id)
    {
        $token = $this->getAccessToken();
        if (!$token) {
            return ['error' => 'unauthorized'];
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Client-Id' => $this->clientId,
        ])->get('https://api.twitch.tv/helix/users',[
            'id' => $id
            ]);


        if ($response->status() === 404 || empty($response->json('data'))) {
            return ['error' => 'not_found'];
        }

        if ($response->failed()) {
            return ['error' => 'twitch_api_error'];
        }

        return $response->json('data')[0]; 
    }

    public function getLiveUsers()
    {
        $token = $this->getAccessToken();
        if (!$token) {
            return ['error' => 'unauthorized'];
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Client-Id' => $this->clientId,
        ])->get('https://api.twitch.tv/helix/streams', [
            'type' => 'live',
        ]);

        if ($response->failed()) {
            return ['error' => 'twitch_api_error'];
        }
        
        $users =  $response->json('data'); 
        return collect($users)->map(function ($user) {
            return [
                'title' => $user['title'],
                'user_name' => $user['user_name'],
            ];
        });
    }
}
