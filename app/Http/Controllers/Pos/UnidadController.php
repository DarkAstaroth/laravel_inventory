<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Unidad;
use Auth;

class UnidadController extends Controller
{
    public function unidadAll(){
        $unidades = Unidad::latest()->get();
        return view('backend.unidad.unidad_all',compact('unidades'));
    }

    public function unidadAdd(){
        return view('backend.unidad.unidad_add');
    }

    public function unidadStore(Request $request){
        Unidad::insert([
            'nombre'=> $request->nombre,
            'created_by'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
        ]);
        $notification = [
            'message' => 'Unidad creada con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('unidad.all')
            ->with($notification);
    }

    public function unidadEdit($id){
        $unidad = Unidad::findOrFail($id);
        return view('backend.unidad.unidad_edit',compact('unidad'));;
    }

    public function unidadUpdate(Request $request){
        $unidad_id=$request->id;
        Unidad::findOrFail($unidad_id)->update([
            'nombre'=> $request->nombre,
            'updated_by'=> Auth::user()->id,
            'updated_at'=> Carbon::now(),
        ]);
        $notification = [
            'message' => 'Unidad modificada con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('unidad.all')
            ->with($notification);
    }

    public function unidadDelete($id){
        Unidad::findOrFail($id)->delete();
                
        $notification = [
            'message' => 'Unidad Eliminada con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('unidad.all')
            ->with($notification);

    }
    
}
