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
//Retorna Categorias
Route::get('/Usuario/GetCategoria', ['middleware' => 'cors', 'uses' => 'CategoriaController@index']);
//Route::get('/Usuario/GetEdificios', 'ServicioController@index');
//Retorna Tipo Unidad Especifica
Route::get('/Usuario/GetUnidadEsp', ['middleware' => 'cors', 'uses' => 'UnidadExController@index']);
//Route::get('/Usuario/GetEdificios', 'UnidadExController@index');
//Retorna Tipo Reparacion
Route::get('/Usuario/GetTipoRep', ['middleware' => 'cors', 'uses' => 'TipoReparacionController@index']);
//Route::get('/Usuario/GetEdificios', 'TipoReparacionController@index');
//Retornar Usuarios Join
Route::get('/Usuario/GetSolicitudUsuarios/{iduser}', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@getSolicitudUsuariosJoin']);

//Solicitud Usuario
//Traer Datos para el listado de tickets
Route::get('/Usuario/GetSolicitud', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@index']);
//Traer Datos para el listado de tickets
Route::get('/Usuario/correo', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@correo']);
//Traer datos especificos
Route::get('/Usuario/TraerSolicitud/{id}', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@indexEspecifico']);
//Guardar Solicitud
Route::post('/Usuario/PostSolicitud', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@store']);
//Modificar Solicitud
Route::post('/Usuario/PutSolicitud', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@ModificarSolicitud']);
//Traer seguimiento
Route::get('/Usuario/TraerSeguimiento/{uuid}', ['middleware' => 'cors', 'uses' => 'SeguimientoController@indexSeguimiento']);
//Guardar Seguimiento
Route::post('/Usuario/GuardarSeguimiento/{uuid}', ['middleware' => 'cors', 'uses' => 'SeguimientoController@store']);
//Traer Datos para el listado de tickets
Route::get('/Usuario/GetSolicitudCreada/{id}', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@GetSolicitudCreada']);
//Eliminar Ticket
Route::get('/Usuario/destroyTicket/{id}', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@destroy']);

//Gestion Agentes
//Traer supervisores
Route::get('/Agente/GetSupervisores', ['middleware' => 'cors', 'uses' => 'SupervisorController@index']);
//Traer Todos los tickets asignados
Route::get('/Agente/GetTicketAsignadosInfra', ['middleware' => 'cors', 'uses' => 'GestionTicketController@ticketsCategoriaInfra']);
//Traer Todos los tickets asignados
Route::get('/Agente/GetTicketAsignadosEM', ['middleware' => 'cors', 'uses' => 'GestionTicketController@ticketsCategoriaEM']);
//Traer Todos los tickets asignados
Route::get('/Agente/GetTicketAsignadosIND', ['middleware' => 'cors', 'uses' => 'GestionTicketController@ticketsCategoriaIND']);
//Traer Todos los tickets asignados
Route::get('/Agente/GetTicketAsignadosCA', ['middleware' => 'cors', 'uses' => 'GestionTicketController@ticketsCategoriaCA']);
//Traer Trabajadores
Route::get('/Agente/GetTrabajadores', ['middleware' => 'cors', 'uses' => 'TrabajadorController@index']);
//Retorna Categorias
Route::get('/Agente/GetCategoria', ['middleware' => 'cors', 'uses' => 'CategoriaController@index']);
//Traer Estado
Route::get('/Agente/GetEstado', ['middleware' => 'cors', 'uses' => 'EstadoController@index']);
//Guardar Ticket
Route::post('/Agente/PostTicket', ['middleware' => 'cors', 'uses' => 'GestionTicketController@store']);
//Guardar Ticket
Route::post('/Agente/PostTicketEM', ['middleware' => 'cors', 'uses' => 'GestionTicketController@AsignarTicketEM']);
//Guardar Ticket
Route::post('/Agente/PostTicketIND', ['middleware' => 'cors', 'uses' => 'GestionTicketController@AsignarTicketIND']);
//Guardar Ticket
Route::post('/Agente/PostTicketCA', ['middleware' => 'cors', 'uses' => 'GestionTicketController@AsignarTicketCA']);
//Traer Tickets con sus usuarios Infraestructura
Route::get('/Agente/GetSolicitudTickets', ['middleware' => 'cors', 'uses' => 'GestionTicketController@getSolicitudUsuariosJoin']);
//Traer Tickets con sus usuarios Equipos Medicos
Route::get('/Agente/GetSolicitudTicketsEM', ['middleware' => 'cors', 'uses' => 'GestionTicketController@getSolicitudUsuariosJoinEM']);
//Traer Tickets con sus usuarios Industrial
Route::get('/Agente/GetSolicitudTicketsIND', ['middleware' => 'cors', 'uses' => 'GestionTicketController@getSolicitudUsuariosJoinIND']);
//Traer Tickets con sus usuarios CA
Route::get('/Agente/GetSolicitudTicketsCA', ['middleware' => 'cors', 'uses' => 'GestionTicketController@getSolicitudUsuariosJoinCA']);

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
//Validar Existencia de ticket asignado Para modificar
Route::get('/Agente/ValidarTicketAsignadoMod/{id}', ['middleware' => 'cors', 'uses' => 'GestionTicketController@ValidarTicketAsignadoMod']);
//Guardar Ticket
Route::post('/Agente/PutTicket', ['middleware' => 'cors', 'uses' => 'GestionTicketController@modificarTicket']);
//Guardar Ticket
Route::post('/Agente/PutTicketCA', ['middleware' => 'cors', 'uses' => 'GestionTicketController@modificarTicketCA']);
//Guardar Ticket
Route::post('/Agente/PutTicketEM', ['middleware' => 'cors', 'uses' => 'GestionTicketController@modificarTicketEM']);
//Guardar Ticket
Route::post('/Agente/PutTicketIND', ['middleware' => 'cors', 'uses' => 'GestionTicketController@modificarTicketIND']);
//Guardar Nuevo Ticket
Route::post('/Agente/PostNuevoTicket', ['middleware' => 'cors', 'uses' => 'GestionTicketController@NuevoTicket']);
//Guardar Nuevo Ticket
Route::post('/Agente/PostNuevoTicketEM', ['middleware' => 'cors', 'uses' => 'GestionTicketController@NuevoTicketEM']);
//Guardar Nuevo Ticket
Route::post('/Agente/PostNuevoTicketIND', ['middleware' => 'cors', 'uses' => 'GestionTicketController@NuevoTicketIND']);
//Guardar Nuevo Ticket
Route::post('/Agente/PostNuevoTicketCA', ['middleware' => 'cors', 'uses' => 'GestionTicketController@NuevoTicketCA']);
//Traer Usuarios
Route::get('/Agente/getUsuarios', ['middleware' => 'cors', 'uses' => 'GestionTicketController@getUsuarios']);
//Traer el ticket especifico asignado
Route::get('/Agente/TraerTicket/{id}', ['middleware' => 'cors', 'uses' => 'GestionTicketController@getTicketCreado']);
//Traer Dato Join Calendario
Route::get('/Agente/getDatoCalendario', ['middleware' => 'cors', 'uses' => 'GestionTicketController@GetDatoCalendario']);
//Traer Trabajadores EX
Route::get('/Agente/GetTrabajadoresEX', ['middleware' => 'cors', 'uses' => 'TrabajadorController@GetTrabajadoresEX']);
//Eliminar Ticket
Route::get('/Agente/destroyTicket/{id}', ['middleware' => 'cors', 'uses' => 'GestionTicketController@destroy']);
//Traer ticket asignado
Route::get('/Agente/GetTicketAsignado/{id}', ['middleware' => 'cors', 'uses' => 'GestionTicketController@GetTicketAsignado']);
//Validar Existencia de ticket asignado para asignar
Route::get('/Agente/ValidarTicketAsignado/{id}', ['middleware' => 'cors', 'uses' => 'GestionTicketController@ValidarTicketAsignado']);

//Api Trabajador
//Traer datos especificos
Route::get('/Trabajador/TraerTickets/{id}', ['middleware' => 'cors', 'uses' => 'SolicitudUsuarioController@getTicketsAsignadosJoin']);

//Traer Dato Join Calendario
Route::get('/Agente/getDatoCalendarioEM', ['middleware' => 'cors', 'uses' => 'GestionTicketController@GetDatoCalendarioEM']);
//Traer Dato Join Calendario
Route::get('/Agente/getDatoCalendarioIND', ['middleware' => 'cors', 'uses' => 'GestionTicketController@GetDatoCalendarioIND']);
//Traer Dato Join Calendario
Route::get('/Agente/getDatoCalendarioCA', ['middleware' => 'cors', 'uses' => 'GestionTicketController@GetDatoCalendarioCA']);
//Traer Dato Join Calendario
Route::post('/Agente/ModificarCategoria', ['middleware' => 'cors', 'uses' => 'GestionTicketController@ModificarCategoria']);
//Imprimir
Route::get('/Agente/imprimir', ['middleware' => 'cors', 'uses' => 'PdfController@imprimir']);
