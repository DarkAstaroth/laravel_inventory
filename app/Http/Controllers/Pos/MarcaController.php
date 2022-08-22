<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Marca;
use Auth;
use Image;

class MarcaController extends Controller
{
    public function marcaAll(){
        $marcas = Marca::latest()->get();
        return view('backend.marca.marca_all',compact('marcas'));
    }

    public function marcaAdd(){
        return view('backend.marca.marca_add');
    }

    public function marcaStore(Request $request){
        
        $image = $request->file('imagen_marca');
        $name_gen =
            hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)
            ->resize(200, 200)
            ->save('upload/marca/' . $name_gen);
        $save_url = 'upload/marca/' . $name_gen;

        Marca::insert([
            'nombre' => $request->nombre,
            'imagen_marca' => $save_url,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        
        $notification = [
            'message' => 'Marca creada con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('marca.all')
            ->with($notification);
    }

    public function marcaEdit($id){
        $marca = Marca::findOrFail($id);
        return view('backend.marca.marca_edit',compact('marca'));
    }

    public function marcaUpdate(Request $request){
        $marca_id = $request->id;
        if ($request->file('imagen_marca')) {
            $image = $request->file('imagen_marca');
            $name_gen =
                hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)
                ->resize(200, 200)
                ->save('upload/marca/' . $name_gen);
            $save_url = 'upload/marca/' . $name_gen;

            Marca::findOrFail($marca_id)->update([
                'nombre' => $request->nombre,
                'imagen_marca' => $save_url,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Marca modificada con exito',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('marca.all')
                ->with($notification);
        } else {
            Marca::findOrFail($marca_id)->update([
                'nombre' => $request->nombre,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Marca modificada con exito',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('marca.all')
                ->with($notification);
        }
    }

    public function marcaDelete($id){
        Marca::findOrFail($id)->delete();
        $notification = [
            'message' => 'Marca eliminada con exito',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }

}
