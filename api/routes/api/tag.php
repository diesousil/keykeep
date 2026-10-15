<?php

use App\Http\Controllers\Credential\TagController;

Route::controller(TagController::class)->middleware("auth:api")->group(function () {
    Route::post('/', 'create');
    Route::patch('/{id}', 'edit');
    Route::delete('/{id}', 'delete');
    Route::get('/search/{searchTerms}', 'search');
    Route::get('/', 'list');
    Route::get('/{uuid}', 'show');
});
