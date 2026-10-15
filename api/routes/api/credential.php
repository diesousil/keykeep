<?php

use App\Http\Controllers\Credential\CredentialController;

Route::controller(CredentialController::class)->middleware("auth:api")->group(function () {
    Route::post('/', 'create');
    Route::patch('/{id}', 'edit');
    Route::delete('/{id}', 'delete');
    Route::get('/', 'list');
    Route::get('/{uuid}', 'show');
});
