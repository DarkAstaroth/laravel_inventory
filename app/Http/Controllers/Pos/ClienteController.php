<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Cliente;
use Auth;
use Image;

class ClienteController extends Controller
{
    public function ClienteAll()
    {
        $clientes = Cliente::latest()->get();
        return view('backend.cliente.cliente_all', compact('clientes'));
    }

    public function clienteAdd()
    {
        return view('backend.cliente.cliente_add');
    }

    public function clienteStore(Request $request)
    {
        $image = $request->file('imagen_cliente');
        $name_gen =
            hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)
            ->resize(200, 200)
            ->save('upload/cliente/' . $name_gen);
        $save_url = 'upload/cliente/' . $name_gen;

        Cliente::insert([
            'nombre' => $request->nombre,
            'imagen_cliente' => $save_url,
            'nit' => $request->nitcliente,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Cliente creado con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('cliente.all')
            ->with($notification);
    }

    public function clienteEdit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('backend.cliente.cliente_edit', compact('cliente'));
    }

    public function clienteUpdate(Request $request)
    {
        $cliente_id = $request->id;
        if ($request->file('imagen_cliente')) {
            $image = $request->file('imagen_cliente');
            $name_gen =
                hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)
                ->resize(200, 200)
                ->save('upload/cliente/' . $name_gen);
            $save_url = 'upload/cliente/' . $name_gen;

            Cliente::findOrFail($cliente_id)->update([
                'nombre' => $request->nombre,
                'imagen_cliente' => $save_url,
                'nit' => $request->nitcliente,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'direccion' => $request->direccion,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Cliente modificado con exito',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('cliente.all')
                ->with($notification);
        } else {
            Cliente::findOrFail($cliente_id)->update([
                'nombre' => $request->nombre,
                'nit' => $request->nitcliente,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'direccion' => $request->direccion,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Cliente modificado con exito',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('cliente.all')
                ->with($notification);
        }
    }

    public function clienteDelete($id)
    {
        $cliente = Cliente::findOrFail($id);
        $image = $cliente->imagen_cliente;
        unlink($image);

        Cliente::findOrFail($id)->delete();
        
        $notification = [
            'message' => 'Cliente eliminado con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }
}
