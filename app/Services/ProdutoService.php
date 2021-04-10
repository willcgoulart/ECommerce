<?php 
namespace  App\Services;

use App\Entities\Produto;
use Illuminate\Support\Facades\DB;

class ProdutoService{

    public function criarProduto(string $nome, int $marca, int $tipo): Produto
    {
        DB::beginTransaction();
            $produto = Produto::create(['desc_prod' => $nome, 'id_marca' => $marca, 'id_tipo' => $tipo, 'imagem' => 'teste']);
        DB::commit();

        return $produto;
    }

}

?>