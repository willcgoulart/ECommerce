<?php 
namespace  App\Services;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use Illuminate\Support\Facades\DB;

class PedidoService{

    public function criarPedido(int $idUser): Pedido
    {
        DB::beginTransaction();
            $pedido = Pedido::create(['id_user' => $idUser]);
        DB::commit();

        return $pedido;
    } 

    public function criarPedidoProduto(int $idUser, int $id_pedido, int $id_prod, int $quantidade, float $preco): PedidoProduto
    {
        DB::beginTransaction();
            $pedido = PedidoProduto::create(['id_user' => $idUser, 'id_pedido' => $id_pedido, 'id_prod' => $id_prod, 'quantidade' => $quantidade, 'preco' => $preco]);
        DB::commit();

        return $pedido;
    }

}

?>