<?php

namespace App\Http\Controllers;

use App\Services\TwitchServices;

class TwitchController extends Controller
{
    protected $twitchServices;

    public function __construct(TwitchServices $twitchServices){
        $this->twitchServices = $twitchServices;
    }

    public function getUser($id)
    {
        $user =  $this->twitchServices->getUserById($id); 
        if (isset($user['error'])) {
            switch ($user['error']) {
                case 'unauthorized':
                    return response()->json(['error' => "Unauthorized. Twitch access token is invalid or has expired."], 401);
                case 'not_found':
                    return response()->json(['error' => "User not found."], 404);
                case 'twitch_api_error':
                    return response()->json(['error' => "Twitch API error."], 500);
                default:
                    return response()->json(['error' => "Unknown error."], 500);
            }
        }

        return response()->json($user);
    }

    public function getLiveUsers()
    {
        $users =  $this->twitchServices->getLiveUsers(); 
        if (isset($users['error'])) {
            switch ($users['error']) {
                case 'unauthorized':
                    return response()->json(['error' => "Unauthorized. Twitch access token is invalid or has expired."], 401);
                case 'twitch_api_error':
                    return response()->json(['error' => "Twitch API error."], 500);
                default:
                    return response()->json(['error' => "Unknown error."], 500);
            }
        }

        return response()->json($users);
    }    
}
