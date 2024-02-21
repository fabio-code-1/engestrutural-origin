<?php

use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
    return view('welcome');
});

include __DIR__.'/Auth/auth.php';




