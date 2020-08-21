<?php

use Illuminate\Http\Request;
use App\SeguimientoSolicitudes;
use App\Mail\AutoRespuesta;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/Login/GetUsers', ['middleware' => 'cors', 'uses' => 'LoginController@getUsuarios']);
Route::post('/Login/getpr', ['middleware' => 'cors', 'uses' => 'LoginController@adminPr']);
Route::post('/Login/Salir', ['middleware' => 'cors', 'uses' => 'LoginController@salir']);

//Retorna Edificios
Route::get('/Usuario/GetEdificios', ['middleware' => 'cors', 'uses' => 'EdificioController@index']);
//Route::get('/Usuario/GetEdificios', 'EdificioController@index');
//Retorna Servicios
Route::get('/Usuario/GetServicios', ['middleware' => 'cors', 'uses' => 'ServicioController@index']);
//Route::get('/Usuario/GetEdificios', 'ServicioController@index');
//Retorna Tipo Unidad Especifica
Route::get('/Usuario/GetUnidadEsp', ['middleware' => 'cors', 'uses' => 'UnidadExController@index']);
//Route::get('/Usuario/GetEdificios', 'UnidadExController@index');
//Retorna Tipo Reparacion
Route::get('/Usuario/GetTipoRep', ['middleware' => 'cors', 'uses' => 'TipoReparacionController@index']);
//Route::get('/Usuario/GetEdificios', 'TipoReparacionController@index');
//Retornar Usuarios Join
Route::get('/Usuario/GetUsuarios', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@getSolicitudUsuariosJoin']);

//Solicitud Usuario
//Traer Datos para el listado de tickets
Route::get('/Usuario/GetSolicitud', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@index']);
//Traer datos especificos
Route::get('/Usuario/TraerSolicitud/{id}', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@indexEspecifico']);
//Guardar Solicitud
Route::post('/Usuario/PostSolicitud', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@store']);
//Traer seguimiento
Route::get('/Usuario/TraerSeguimiento/{uuid}', ['middleware' => 'cors', 'uses' => 'SeguimientoController@indexSeguimiento']);
//Guardar Seguimiento
Route::post('/Usuario/GuardarSeguimiento/{uuid}', ['middleware' => 'cors', 'uses' => 'SeguimientoController@store']);
//Traer data especifica para generar correo
Route::get('/Usuario/GetDataCorreo/{id}', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@getDataCorreo']);
//Envio de data para el correo
Route::post('/Usuario/enviarCorreo', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@enviarCorreo']);

//Gestion Agentes
//Traer supervisores
Route::get('/Agente/GetSupervisores', ['middleware' => 'cors', 'uses' => 'SupervisorController@index']);
//Traer Trabajadores
Route::get('/Agente/GetTrabajadores', ['middleware' => 'cors', 'uses' => 'TrabajadorController@index']);
//Traer Estado
Route::get('/Agente/GetEstado', ['middleware' => 'cors', 'uses' => 'EstadoController@index']);
//Guardar Ticket
Route::post('/Agente/PostTicket', ['middleware' => 'cors', 'uses' => 'GestionTicketController@store']);
//Traer Tickets con sus usuarios
Route::get('/Agente/GetTickets', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@getSolicitudUsuariosJoin']);
//Traer seguimiento de tickets
Route::get('/Agente/TraerSeguimiento/{uuid}', ['middleware' => 'cors', 'uses' => 'SeguimientoController@indexSeguimiento']);
//Traer datos especificos
Route::get('/Agente/TraerSolicitud/{id}', ['middleware' => 'cors', 'uses' => 'SeguimientoController@indexEspecifico']);
//Guardar seguimiento agente
Route::post('/Agente/GuardarSeguimiento/{uuid}', ['middleware' => 'cors', 'uses' => 'SeguimientoController@store']);
//Traer data especifica para correo Asignado
Route::get('/Agente/GetDataCorreo/{uuid}', ['middleware' => 'cors', 'uses' => 'GestionTicketController@getDataCorreo']);
//Envio de data para el correo
Route::post('/Agente/enviarCorreo', ['middleware' => 'cors', 'uses' => 'GestionTicketController@enviarCorreo']);
//Validar Existencia de ticket asignado
Route::get('/Agente/GetTicketAsignado/{uuid}', ['middleware' => 'cors', 'uses' => 'GestionTicketController@GetTicketAsignado']);
//Guardar Ticket
Route::post('/Agente/PutTicket', ['middleware' => 'cors', 'uses' => 'GestionTicketController@modificarTicket']);
//Guardar Nuevo Ticket
Route::post('/Agente/PostNuevoTicket', ['middleware' => 'cors', 'uses' => 'GestionTicketController@NuevoTicket']);
//Traer Usuarios
Route::get('/Agente/getUsuarios', ['middleware' => 'cors', 'uses' => 'GestionTicketController@getUsuarios']);
//Traer el ticket especifico asignado
Route::get('/Agente/TraerTicket/{id}', ['middleware' => 'cors', 'uses' => 'GestionTicketController@getTicketCreado']);
