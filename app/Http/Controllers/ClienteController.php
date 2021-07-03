<?php

namespace App\Http\Controllers;

use App\Models\Pedido;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

class ClienteController extends Controller
{
    public  function index()
	{
		$user = Auth::user();		
		$pedidos = Pedido::with(['pedidoProduto'])->where( [ ['status', 'A',], ['id_user', $user->id_user] ] )->orderBy('id_pedido', 'desc')->get();
		
		foreach($pedidos as $pedido)
		{
			$valorTotal = 0;
			foreach($pedido->pedidoProduto as $produto)
			{
				$valorTotal = $valorTotal+($produto->preco*$produto->quantidade);
			}

			$pedidosArray[] = array(
								'pedido' => $pedido->id_pedido, 
								'data_pedido' => self::dataFormartoBr($pedido->data_pedido), 
								'pago' => self::SimNao($pedido->pago), 
								'data_entrega' => self::dataFormartoBr($pedido->data_entrega), 
								'previsao_entrega' => self::dataFormartoBr($pedido->previsao_entrega),
								'valor' => self::ajustaValor($valorTotal)
							);
		}
		return view('dashboard.cliente', compact('pedidosArray'));
	}

	public function dataFormartoBr($dataHora)
	{
		if(empty($dataHora))
		{
			return "";
		}
		$dataHora = explode(' ', $dataHora);
		return implode('/', array_reverse( explode('-',$dataHora[0]) ) ).' '.(isset($dataHora[1]) ? ' ' . $dataHora[1] : '');
	}

	public function SimNao($string)
	{
		if($string=="S")
		{
			return "Sim";
		}
		return "Não";
	}

	public function ajustaValor($valor)
	{
		return number_format($valor,2,",",".");
	}


}
