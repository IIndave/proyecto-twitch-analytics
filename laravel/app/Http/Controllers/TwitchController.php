<?php

namespace App\Http\Controllers;

use App\Services\TwitchService;

class TwitchController extends Controller
{
    protected $twitchService;

    public function __construct(TwitchService $twitchService){
        $this->twitchService = $twitchService;
    }

    public function getUser($id)
    {

    }

    public function getLiveUsers()
    {

    }    
}
