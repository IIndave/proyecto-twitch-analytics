<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TwitchController;

    Route::get('twitch/analytics/user/{id}', [TwitchController::class, 'getUser']);
    Route::get('twitch/analytics/streams', [TwitchController::class, 'getLiveUsers']);


?>