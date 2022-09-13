<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pedidos';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    public function setValorTotalAttribute($value)
    {
        $this->attributes['valor_total'] = preg_replace("/\D+/", "", $value);
    }

    public function getValorTotalAttribute($value)
    {
        return number_format(($value / 100), 2, ',', '.');
    }

    public function produtos()
    {
        return $this->hasMany(PedidoProdutos::class, 'pedido_id', 'id');
    }
}
