<?php

use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/tabela/ponto', function () {
    return view('ponto.index');
})->name('ponto.index');


include __DIR__.'/Auth/auth.php';




