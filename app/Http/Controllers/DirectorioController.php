<?php

namespace App\Http\Controllers;
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
    
    public function store(Request $request) {
        //
    }

    public function show(Directorio $directorio) {
        return $directorio;
    }

    public function update(Request $request, $id) {
        //
    }

    
    public function destroy($id) {
        //
    }

}
