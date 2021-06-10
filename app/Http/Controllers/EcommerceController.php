<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EcommerceController extends Controller
{
    public function index(Request $request)
    {
        $logado = "N";
        $user = Auth::user();
        if ( isset($user) ){
            $logado = "S";
        }     
        return view('ecommerce', compact('logado'));   
        
    }
}
