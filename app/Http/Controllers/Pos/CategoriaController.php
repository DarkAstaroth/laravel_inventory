<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Categoria;
use Auth;
use Image;

class CategoriaController extends Controller
{
    public function categoriaAll()
    {
        $categorias = Categoria::latest()->get();
        return view('backend.categoria.categoria_all', compact('categorias'));
    }

    public function categoriaAdd()
    {
        return view('backend.categoria.categoria_add');
    }

    public function categoriaStore(Request $request)
    {
        Categoria::insert([
            'nombre' => $request->nombre,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Categoria creada con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('categoria.all')
            ->with($notification);
    }

    public function categoriaEdit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('backend.categoria.categoria_edit', compact('categoria'));
    }

    public function categoriaUpdate(Request $request)
    {
        $categoria_id = $request->id;
        Categoria::findOrFail($categoria_id)->update([
            'nombre' => $request->nombre,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Categoria modificada con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('categoria.all')
            ->with($notification);
    }

    public function categoriaDelete($id)
    {
        Categoria::findOrFail($id)->delete();
        $notification = [
            'message' => 'Categoria eliminada con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('categoria.all')
            ->with($notification);
    }
}
