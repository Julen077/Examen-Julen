<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Airplane;

use App\Models\User;
use DB;
use Auth;

class ControladorAdmin extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function mostrar(){
        $rolUsuario = Auth::user()->rol;
            if($rolUsuario == true){
                $vuelos = DB::table('flights')->get();
                return view("admin", ['vuelos' => $vuelos]);
            }
            return redirect()->route('home');
    }
    public function asignarVuelo(){
        $rolUsuario = Auth::user()->rol;
        if($rolUsuario == true){
            $vuelos = DB::table('flights')->get();
            $aviones = DB::table('airplanes')->get();
            return view("asignar", ['vuelos' => $vuelos, 'aviones' => $aviones]);
        }
        return redirect()->route('home');
    }
    public function escogerVueloyAvion(Request $request){
        $id_avion = $request->aviones;
        $id_vuelo = $request->vuelos;
        $vuelo = Flight::find($id_vuelo);
        $vuelo->airplane_id = $id_avion;
        $avionEncontrar = Airplane::find($id_avion);
        $vuelo->available_seats= $avionEncontrar->seats;
        $vuelo->save();
        return back(); 
    }
    public function eliminarSeleccion($id){
        $vuelo = Flight::find($id);
        $vuelo->airplane_id = null;
        $vuelo->save();
        return back();
    }
}
