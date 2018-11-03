<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
 
Route::get('/', function () {
    return view('welcome');
});
//ALUMNOS
Route::get('/altaalumno','alumnos@altaalumno');

Route::POST('/guardaalumno','alumnos@guardaalumno')->name('guardaalumno');

Route::get('/reportealumnos','alumnos@reportealumnos');



//GRADOS
Route::get('/altagrados','grados@altagrados');

Route::POST('/guardagrados','grados@guardagrados')->name('guardagrados');

Route::get('/reportegrados','grados@reportegrados');


//GRUPOS
Route::get('/altagrupos','grupos@altagrupos');

Route::POST('/guardagrupos','grupos@guardagrupos')->name('guardagrupos');

Route::get('/reportegrupos','grupos@reportegrupos');


//CALIFICACIONES
Route::get('/altacalificaciones','Calificacion@altacalificaciones');

Route::POST('/guardacalificaciones','Calificacion@guardacalificaciones')->name('guardacalificaciones');

Route::get('/reportecalificaciones','Calificacion@reportecalificaciones');

Route::get('/altausuario','usuario@altausuario'); // alta de usuarios
Route::POST('/guardausuario','usuario@guardausuario')->name('guardausuario'); //recibe los valores del formulario
Route::get('/reporteusuarios','usuario@reporteusuarios');

Route::get('/altauniforme','Uniforme@altauniforme');//alta de uniformes
Route::POST('/guardauniforme','uniforme@guardauniforme')->name('guardauniforme');
Route::get('/reporteuniformes','uniforme@reporteuniformes');

Route::get('/altamateria','materia@altamateria');//alta de materias
Route::POST('/guardamateria','materia@guardamateria')->name('guardamateria');
Route::get('/reportematerias','materia@reportematerias');

Route::get('/altapago','pago@altapagos');//alta de materias
Route::POST('/guardapago','pago@guardapago')->name('guardapago');
Route::get('/reportepago','pago@reportepagos');

Route::get('/altaciclo','cicloescolar@altaciclos');//alta de materias
Route::POST('/guardaciclos','cicloescolar@guardaciclos')->name('guardaciclos');
Route::get('/reporteciclo','cicloescolar@reporteciclos');


