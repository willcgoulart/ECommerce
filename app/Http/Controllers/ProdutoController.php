<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Marca;
use App\Models\Tipo;

use App\Services\ProdutoService;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
	//Service do CriarProduto
    protected $produtoService;

    function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }


    public  function create()
	{
		$marcas = Marca::query()->orderBy('desc_marca')->get();
		$tipos = Tipo::query()->orderBy('desc_tipo')->get();

		//return view('produtos.create');
		return view('produtos.create', compact('marcas','tipos'));
	}

	public function store(Request $request)
	{

		$produto =  $this->produtoService->criarProduto($request->nome, $request->marca, $request->tipo, $request->preco, $request->descricao);

		$request->session()->flash('mensagem',"Produto {$produto->nome} criada com sucesso");

		//return redirect()->route('listar_produtos');
	}
}
