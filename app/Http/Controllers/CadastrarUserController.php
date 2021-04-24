<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\CadastrarUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CadastrarUserController extends Controller
{

    public  function create()
	{
		return view('cadastro.create');
	}

    public function store(CadastrarUserRequest $request)
	{
        $data = $request->except( ['_token','password_confirmation'] );
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
       
        dd('criado');
        // Auth::login($user);
        //return redirect()->route('dashboard_user');
        
	}

}
