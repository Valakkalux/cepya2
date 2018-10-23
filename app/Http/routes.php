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
Route::get('/altacalificaciones','calificaciones@altacalificaciones');

Route::POST('/guardacalificaciones','calificaciones@guardacalificaciones')->name('guardacalificaciones');

Route::get('/reportecalificaciones','calificaciones@reportecalificaciones');
