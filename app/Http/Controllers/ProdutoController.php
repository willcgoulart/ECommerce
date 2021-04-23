<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Marca;
use App\Models\Tipo;

use App\Services\ProdutoService;
use App\Http\Requests\ProdutosRequest;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
	//Service do CriarProduto
    protected $produtoService;

    function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }

	public  function index()
	{
		$produtos = Produto::query()->where('status', 'A')->orderBy('nome_prod')->get();

		return view('produtos.index', compact('produtos'));
	}


    public  function create()
	{
		$marcas = Marca::query()->where('status', 'A')->orderBy('desc_marca')->get();
		$tipos = Tipo::query()->where('status', 'A')->orderBy('desc_tipo')->get();

		//return view('produtos.create');
		return view('produtos.create', compact('marcas','tipos'));
	}

	public function store(ProdutosRequest $request)
	{
		$imagem = $request->imagem->store('produtos');
		$produto =  $this->produtoService->criarProduto($request->nome, $request->marca, $request->tipo, $request->preco, $request->descricao, $imagem);

		$request->session()->flash('mensagem',"Produto {$produto->nome} criada com sucesso");

		//return redirect()->route('listar_produtos');
	}
}
