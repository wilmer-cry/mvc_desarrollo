<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class categorias
 * @package App\Models
 * @version October 1, 2023, 3:35 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $productos
 * @property string $tipo
 */
class categorias extends Model
{

    use HasFactory;

    public $table = 'categoria';
    
    public $timestamps = false;



    protected $primaryKey = 'id_categoria';

    public $fillable = [
        'tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_categoria' => 'integer',
        'tipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo' => 'required|string|max:50'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productos()
    {
        return $this->hasMany(\App\Models\Producto::class, 'categoria');
    }
    public static function listado_opciones($vacio=null){
        $arreglo = self::orderby('tipo')->pluck('tipo', 'id_categoria')->toArray();
        if(!is_null($vacio)){
            $arreglo = [0=>$vacio] + $arreglo;
        }
    }
}
