<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    public $timestamps = false;

    protected $fillable = ['id_user', 'pago', 'status', 'data_entrega'];

    public function user()
    {
        return $this->hasOne(User::class, 'id_user', 'id_user');
    }
    
    
}

?>