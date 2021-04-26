<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntrarRequest;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index()
    {
        return view('entrar.index');
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
        return redirect()->route('dashboard_cliente');
    }

    
}
