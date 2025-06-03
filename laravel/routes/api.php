<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TwitchAuthController;

    Route::get('twitch/analytics/user/{id}', [TwitchAuthController::class, 'getUser']);
    Route::get('twitch/analytics/streams', [TwitchAuthController::class, 'getLiveUsers']);


?>