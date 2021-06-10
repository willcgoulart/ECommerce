<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_user';
    
    protected $fillable = [
        'name',
        'cpf',
        'sobrenome',
        'telefone',
        'email',
        'cep',
        'numero',
        'endereco',
        'complemento',
        'ponto_referencia',
        'password',
        'tipo_user',
        'tipo_pano',
        'updated_at',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dadosPedidos()
    {
        return $this->belongsTo(Pedido::class);
    }
}
