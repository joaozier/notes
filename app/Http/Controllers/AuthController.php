<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        //checagem se usuário existe
        $user=User::where('username',$username)->where('deleted_at',NULL)->first();
        if (!$user) {
            return redirect()->back()->withInput()->with('loginError','Usuário ou senha incorretos.');
        }

        //checar se senha está correta
        if(!password_verify($password,$user->password)){
            return redirect()->back()->withInput()->with('loginError','Usuário ou senha incorretos.');
        }
        //atualizar último login
        $user->last_login=date('Y-m-d H:i:s');
        $user->save();

        //usuário logado
        session([
            'user'=>[
                'id'=>$user->id,
                'username'=>$user->username
            ]
            ]);
        // redirecionar para o inicio
        return redirect()->to('/');

        //teste da conexão da base de dados
        // try {
        //     DB::Connection()->getPdo();
        //     echo 'Conexão feita.';
        // } catch (\PDOException $e) {
        //     echo "Conexão falhou: ".$e->getMessage();
        // }


    }
    public function logout()
    {
        session()->forget('user');
        return redirect()->to('/login');
    }
}
