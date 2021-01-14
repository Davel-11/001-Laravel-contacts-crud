<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDirectorioRequest;
use App\Http\Requests\UpdateDirectorioRequest;
use App\Models\Directorio;
use Illuminate\Http\Request;

class DirectorioController extends Controller{
        
    public function index(Request $request) {

        if( $request->has('txtBuscar') ) {
            
            $directorios = Directorio::where('nombre', 'like', '%' . $request->txtBuscar . '%' )
            ->orWhere('telefono', $request->txtBuscar)
            ->get();

        } else {

            $directorios = Directorio::all();

        }

        return $directorios;
    }
    
    public function store(CreateDirectorioRequest $request) {

        $input = $request->all();

        if( $request->has('foto') ) {
            $input['foto'] = $this->cargarArchivo($request->foto);
        }

        Directorio::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro creado correctamente'
        ], 200);
    }

    public function show(Directorio $directorio) {
        return $directorio;
    }

    public function update(UpdateDirectorioRequest $request, Directorio $directorio) {

        $input = $request->all();

        if( $request->has('foto') ) {
            $input['foto'] = $this->cargarArchivo($request->foto);
        }

        $directorio->update($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado correctamente'
        ], 200);

    }

    
    public function destroy($id) {

        Directorio::destroy($id);

        return response()->json([
            'res' => true,
            'message' => 'Registro elimninado correctamente'
        ], 200);

    }

    private function cargarArchivo($file) {

        $nombreArchivo = 'pic_' .  time() . "." . $file->getClientOriginalExtension();
        $file->move( public_path('fotografias'), $nombreArchivo );
        return $nombreArchivo;
    }

}
