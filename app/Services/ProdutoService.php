<?php 
namespace  App\Services;

use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class ProdutoService{

    public function criarProduto(string $nome, int $marca, int $tipo, float $preco, string $descricao, string $image): Produto
    {
        DB::beginTransaction();
            $produto = Produto::create(['nome_prod' => $nome, 'id_marca' => $marca, 'id_tipo' => $tipo, 'preco' => $preco, 'desc_prod' => $descricao, 'imagem' => $image]);
        DB::commit();

        return $produto;
    }

}

?>