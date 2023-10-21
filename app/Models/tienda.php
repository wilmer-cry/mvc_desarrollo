<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class tienda
 * @package App\Models
 * @version September 25, 2023, 2:22 am UTC
 *
 * @property \App\Models\Categorium $categoria
 * @property string $nombre
 * @property string $descripcion
 * @property integer $categoria
 */
class tienda extends Model
{

    use HasFactory;

    public $table = 'producto';
    
    public $timestamps = false;
    protected $primaryKey = 'id';

    public $fillable = [
        'nombre',
        'descripcion',
        'categoria'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'categoria' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:100',
        'descripcion' => 'required|string|max:300',
        'categoria' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categorium::class, 'categoria');
    }
    public function rel_id_categoria(){
        return $this->belongsTo(categoria::class, 'id_categoria', 'categoria');
    }
}
