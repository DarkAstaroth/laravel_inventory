<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Unidad;

use Auth;
use Image;

class ProductoController extends Controller
{
    public function productoAll()
    {
        $productos = Producto::latest()->get();
        return view('backend.producto.producto_all', compact('productos'));
    }

    public function productoAdd()
    {
        $proveedores = Proveedor::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $unidades = Unidad::all();

        return view(
            'backend.producto.producto_add',
            compact('proveedores', 'categorias', 'marcas', 'unidades')
        );
    }

    public function productoStore(Request $request)
    {
        Producto::insert([
            'nombre' => $request->nombre,
            'proveedor_id' => $request->proveedor_id,
            'categoria_id' => $request->categoria_id,
            'marca_id' => $request->marca_id,
            'unidad_id' => $request->unidad_id,
            'cantidad' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Producto creado con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('producto.all')
            ->with($notification);
    }

    public function productoEdit($id)
    {
        $proveedores = Proveedor::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $unidades = Unidad::all();
        $producto = Producto::findOrFail($id);

        return view(
            'backend.producto.producto_edit',
            compact(
                'producto',
                'proveedores',
                'categorias',
                'marcas',
                'unidades'
            )
        );
    }

    public function productoUpdate(Request $request)
    {
        $producto_id = $request->id;
        Producto::findOrFail($producto_id)->update([
            'nombre' => $request->nombre,
            'proveedor_id' => $request->proveedor_id,
            'categoria_id' => $request->categoria_id,
            'marca_id' => $request->marca_id,
            'unidad_id' => $request->unidad_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Producto editado con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('producto.all')
            ->with($notification);
    }

    public function productoDelete($id)
    {
        Producto::findOrFail($id)->delete();
        $notification = [
            'message' => 'Producto eliminado con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }
}
