<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProdutos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pedido_produtos';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    public function setValorAttribute($value)
    {
        $this->attributes['valor'] = preg_replace("/\D+/", "", $value);
    }

    public function getValorAttribute($value)
    {
        return number_format(($value / 100), 2, ',', '.');
    }

    public function setQuantidadeAttribute($value)
    {
        $this->attributes['valor'] = preg_replace("/\D+/", "", $value);
    }

    public function getQuantidadeAttribute($value)
    {
        return number_format(($value / 100), 2, ',', '.');
    }

    public function categoria(){
        return $this->hasOne(Categorias::class, 'id', 'categoria_id');
    }

    public function pedidos()
    {
        return $this->belongsTo(Produtos::class, 'pedido_id', 'id');
    }
}
