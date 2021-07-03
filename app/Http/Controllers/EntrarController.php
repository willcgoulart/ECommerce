<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntrarRequest;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index(Request $request)
    {
        $carrinho = $request['carrinho'];
        return view('entrar.index', compact('carrinho'));
    }

    public function login(EntrarRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()
                ->back()
                ->withErrors('Usuário e/ou senha incorretos', 'mensagemErro');
        }
        if( Auth::user()->tipo_user==1 )//Usuario adm
        {
            return redirect()->route('dashboard_adm');
        }
        if($request['carrinho']=="S"){
            return redirect()->route('carrinho'); 
        }

        return redirect()->route('dashboard_cliente');
    }   
    
    public function deslogar()
    {
        Auth::logout();
        return redirect()->route('login');
        //return view('entrar.index');
        //return back();
    }
}
