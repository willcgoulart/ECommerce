<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id_prod';
    public $timestamps = false;

    protected $fillable = ['desc_prod', 'id_marca', 'id_tipo', 'imagem'];

    public function marca()
    {
        return $this->hasOne(Marca::class, 'id_marca', 'id_marca');
    }

    public function tipo()
    {
        return $this->hasOne(Tipo::class, 'id_tipo ', 'id_tipo ');
    }

}

?>