<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produtos';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'unidade', 'estoque', 'valor', 'categoria_id', 'fornecedor_id'];

    public function setValorAttribute($value)
    {
        $this->attributes['valor'] = preg_replace("/\D+/", "", $value);
    }

    public function getValorAttribute($value)
    {
        return number_format(($value / 100), 2, ',', '.');
    }

    public function categoria(){
        return $this->hasOne(Categorias::class, 'id', 'categoria_id');
    }
}
