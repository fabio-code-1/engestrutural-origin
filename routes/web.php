<?php

use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/tabela/ponto', function () {
    return view('ponto.index');
})->name('ponto.index');


include __DIR__.'/Auth/auth.php';
include __DIR__.'/Tarefa/tarefa.php';
include __DIR__.'/Arquivo/arquivo.php';


