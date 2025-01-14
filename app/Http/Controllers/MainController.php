<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

    public function editNote($id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->route('home');
        }

    }

    public function deleteNote($id){
        $id=$this->decryptI
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->route('home');
        }
    }

    private function decrypitId($id){
        //check if $id is encrypted
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->route('home');
        }

        return $id;
    }
}
