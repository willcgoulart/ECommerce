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

		$produtos = Produto::query()->where('status', 'A')->orderBy('nome_prod')->get();

		foreach($produtos as $produto)
        {    
            $produtoJson['products'][] = array('name' => $produto->nome_prod,  'price' => $produto->preco, 'options' => '', 'image' => 'http://127.0.0.1:8000/storage/'.$produto->imagem, 'description' => $produto->desc_prod, 'id_prod' => $produto->id_prod);
        }

        $produtoJson = json_encode($produtoJson);
        file_put_contents('products.json', $produtoJson);

		return view('produtos.index', compact('produtos'));
	}
}
