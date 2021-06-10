<?php

namespace App\Http\Controllers;

use App\Services\PedidoService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidosController extends Controller
{

    protected $pedidoService;

    function __construct(PedidoService $pedidoService)
    {
        $this->pedidoService = $pedidoService;
    }

    public function create(Request $request)
    {
        $user = Auth::user();


        $pedido =  $this->pedidoService->criarPedido($user->id_user);
        $dados = $_POST['dados'];

        $dados = json_decode($dados);

        foreach($dados as $dado)
        {
            $this->pedidoService->criarPedidoProduto($user->id_user, $pedido->id_pedido, $dado->id, $dado->quantity, $dado->price );
        }        
    }
}
