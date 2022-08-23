<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Unidad;
use Auth;
use Image;

class DefaultController extends Controller
{
    public function GetCategorias(Request $request){
        $proveedor_id = $request->proveedor_id;
        $categorias = Producto::with(['categoria'])->select('categoria_id')->where('proveedor_id',$proveedor_id)->groupBy('categoria_id')->get();
        return response()->json($categorias);
        
    }
}
