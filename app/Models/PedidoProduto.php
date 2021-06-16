<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PedidoProduto extends Model
{
    protected $table = 'pedido_produtos';
    protected $primaryKey = 'id_pedido_produto';
    public $timestamps = false;

    protected $fillable = ['id_user', 'id_pedido', 'id_prod', 'quantidade', 'preco'];

    
    
    public function dados()
    {
        return $this->belongsTo(Pedido::class);
    }
}

?>