<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginSubmit(Request $request)
    {
        // validação de formulário
        $request->validate(
            [
                'text_username'=>'required', //diz ao laravel que deve ter algo dentro desse campo
                'text_password'=>'required'
            ]
        );
        //get user input
        $username=$request->input('text_username');
        $password=$request->input('text_password');

        echo "OK";
    }
    public function logout()
    {
        echo "Logout";
    }
}
