<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use DB;

class UsersController extends Controller
{
    public function traerTodoUsuarios()
    {
        $get_all = Users::select('id',DB::raw("CONCAT(nombre,' ',apellido) as nombrecompleto"))
        ->where('id_cargo',1)
        ->get();

        return  $get_all;
        //
    }

    public function registrarUsuario(Request $request){
        log::info($request->email);
        return Users::create([
            'run' => $request->run,
            'email' => $request->email,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'anexo' => $request->anexo,
            'id_cargo' => $request->id_cargo,
            'id_edificio' => $request->id_edificio,
            'id_servicio' => $request->id_servicio,
            'id_unidadEspecifica' => $request->id_unidadEspecifica,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(60),
        ]);

        
    }
}
