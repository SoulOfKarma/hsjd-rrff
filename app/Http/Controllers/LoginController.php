<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\LoginCollection;
use App\Login;
use DB;
use App\permiso_usuario;
use SebastianBergmann\Environment\Console;

class LoginController extends Controller
{

  public function getUsuarios(Request $request)
  {

    $rut = str_replace('.', '', $request->input('rut'));
    $rut = strtoupper($rut);
    $pasword = str_replace('.', '', $request->input('pasword'));
    $pasword = strtoupper($pasword);
    $get_all = DB::table('users')
      ->where('run', '=', $rut)
      ->where('password', '=',  $pasword)
      ->get();
    // crypt($request->input('password'), '123123123')
    return $get_all;
  }

  public function adminPr(Request $request)
  {
    $run = str_replace('.', '', $request->input('rut'));
    $run = strtoupper($run);
    $salida = DB::table('tbl_permiso_usuarios')
      ->where('run_usuario', '=', $run)
      ->get(['run_usuario', 'permiso_usuario', 'estado_login']);
    // $salida = permiso_usuario::where('run_usuario', '=', $run)->get(['run_usuario', 'permiso_usuario', 'estado_login']);
    foreach ($salida as $p) {
      if ($p->estado_login == 1) {
        $request->session()->put('login', '1');
        $request->session()->put('run_usuario', $request->input('rut'));
        $request->session()->put('permiso_usuario', $p->permiso_usuario);
      }
    }
    return $salida;
  }

  public function salir(Request $request)
  {
    $request->session()->forget('login');
    $request->session()->forget('run_usuario');
    $request->session()->forget('permiso_usuario');
    $request->session()->flush();
  }
}
