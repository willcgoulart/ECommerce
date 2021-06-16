<?php

namespace App\Http\Controllers;

use App\Models\Pedido;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public  function index()
	{
		$user = Auth::user();		
		$pedidos = Pedido::with(['pedidoProduto'])->where( [ ['status', 'A',], ['id_user', $user->id_user] ] )->orderBy('id_pedido', 'asc')->get();
		//dd($pedidos);
		return view('dashboard.cliente', compact('pedidos'));
	}
}
