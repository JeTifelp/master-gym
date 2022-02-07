<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
//Route::get('/','LibroController@index'); este
//Route::get('/','login');
Route::get('/', function () {
    return view('auth.login');
});
Route::resource('/libros', 'LibroController');
Route::resource('/usuarios', 'UsuarioController');
Route::get('/cambiartema', 'UsuarioController@CambiarTema');

Route::resource('/productos', 'ProductoController');
Route::resource('/alimentaciones', 'AlimentacionController');
Route::resource('/asistencias', 'AsistenciaController');
Route::resource('/ventas', 'VentaController');
Route::resource('/mensualidades', 'MensualidadController');
Route::resource('/sociorutinas', 'SocioRutinaController');
Route::resource('/estadisticas', 'EstadisticaController');



Route::get('/home', 'HomeController@index')->name('home');
