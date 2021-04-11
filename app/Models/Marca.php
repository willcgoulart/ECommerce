<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Marca extends Model
{
    protected $table = 'marcas';
    protected $primaryKey = 'id_marca';
    public $timestamps = false;

    public function dadosProdutos()
    {
        return $this->belongsTo(Produto::class);
    }

}

?>