<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $id=session('user.id');
        $notes=User::find($id)->notes()->get()->toArray();

        return view('home',['notes'=>$notes]);
    }

    // public function index(){
    //     echo "Estou dentro do app";
    // }

    public function newNote(){
        echo "Estou criando uma nota nova";
    }
}
