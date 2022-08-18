<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Proveedor;
use Auth;

class ProveedorController extends Controller
{
    public function ProveedorAll()
    {
        $proveedores = Proveedor::all();
        $proveedores = Proveedor::latest()->get();
        return view('backend.proveedor.proveedor_all', compact('proveedores'));
    }
    public function ProveedorAdd()
    {
        return view('backend.proveedor.proveedor_add');
    }

    public function ProveedorStore(Request $request)
    {
        Proveedor::insert([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Proveedor creado con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('proveedor.all')
            ->with($notification);
    }

    public function ProveedorEdit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('backend.proveedor.proveedor_edit', compact('proveedor'));
    }

    public function ProveedorUpdate(Request $request)
    {
        $proveedor_id = $request->id;
        Proveedor::findOrFail($proveedor_id)->update([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Proveedor modificado con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('proveedor.all')
            ->with($notification);
    }

    public function ProveedorDelete($id)
    {
        Proveedor::findOrFail($id)->delete();
        $notification = [
            'message' => 'Proveedor eliminado con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }
}
