<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Olá Mundo!";
});

Route::get('/about', function(){
    echo "Sobre nós";
});