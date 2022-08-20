<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedor;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Unidad;

class Producto extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'proveedor_id','id');
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id','id');
    }
    public function marca(){
        return $this->belongsTo(Marca::class,'marca_id','id');
    }
    public function unidad(){
        return $this->belongsTo(Unidad::class,'unidad_id','id');
    }
}
