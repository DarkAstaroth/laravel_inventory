<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Unidad;


class CompraController extends Controller
{
    public function compraAll(){
        $allData = Compra::orderBy('date','desc')->orderBy('id','desc');
        return view('backend.compra.compra_all',compact('allData'));
    }
}
