<?php

namespace App\Services;

class TwitchService
{
    protected $clientId;
    protected $clientSecret;

    public function __construct()
    {
        $this->clientId = config('services.twitch.client_id');
        $this->clientSecret = config('services.twitch.client_secret');
    }

}
