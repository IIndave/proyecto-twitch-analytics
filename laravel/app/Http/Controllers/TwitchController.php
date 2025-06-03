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
       
        return response()->json($user);
    }

    public function getLiveUsers()
    {

    }    
}
