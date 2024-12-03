<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\DB;
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
                'text_username'=>'required|email', //diz ao laravel que deve ter algo dentro desse campo
                'text_password'=>'required|min:6|max:16'
            ],
            //mensagens de erro
            [
                'text_username.required'=>'O usuário é obrigatório',
                'text_username.email'=>'Usuário deve ser um email válido',
                'text_password.required'=>'A senha é obrigatória.',
                'text_password.min'=>'A senha deve ter no mínimo :min caracteres',
                'text_password.max'=>'A senha deve ter no mínimo :max caracteres'
            ]
        );
        //get user input
        $username=$request->input('text_username');
        $password=$request->input('text_password');

        //teste da conexão da base de dados
        try {
            DB::Connection()->getPdo();
            echo 'Conexão feita.';
        } catch (\PDOException $e) {
            echo "Conexão falhou: ".$e->getMessage();
        }

        echo "<br>Fim.";

    }
    public function logout()
    {
        echo "Logout";
    }
}
