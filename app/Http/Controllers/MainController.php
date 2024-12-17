<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('home');
    }

    // public function index(){
    //     echo "Estou dentro do app";
    // }

    public function newNote(){
        echo "Estou criando uma nota nova";
    }
}
