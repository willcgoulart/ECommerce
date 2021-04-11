<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tipo extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id_tipo';
    public $timestamps = false;

    public function dadosProdutos()
    {
        return $this->belongsTo(Produto::class);
    }

}

?>