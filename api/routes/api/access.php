<?php

Route::controller('AccessController')->group(function () {
    Route::post('/login', 'login');
});
