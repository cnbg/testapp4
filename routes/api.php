<?php

use App\Http\API\AuthController;
use App\Http\API\ClientController;
use App\Http\API\NotificationController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::apiResource('clients', ClientController::class);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('me', [AuthController::class, 'me']);

    Route::get('notifications/clients/{client}', [NotificationController::class, 'client']);
    Route::get('notifications/clients', [NotificationController::class, 'clients']);

    Route::apiResource('notifications', NotificationController::class)->except('update', 'destroy');
});
