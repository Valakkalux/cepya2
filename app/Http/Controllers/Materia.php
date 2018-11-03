<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\materias;
use App\usuarios;
use App\grupo;
class Materia extends Controller
{ 
    public function altamateria()
	{
		$id_usu = usuarios::where('tipo','=','pro')
							->orderBy('nombre','Asc')
							->get();

		$id_gru = grupo::orderBy('nombre','Asc')
							->get();

		$clavequesigue =materias::orderBy('id_ma','desc')
        ->take(1)
		->get();		

		$id_ma = $clavequesigue[0]->id_ma+1;
				
		return view ("sistema.altamaterias")
				->with('id_ma',$id_ma)
				->with('id_usu',$id_usu)
				->with('id_gru',$id_gru);
	}
	public function guardamateria(request $request)
	{
		$id_ma = $request->id_ma;
		$nombre = $request->nombre;
		$id_usu = $request->id_usu;
		$id_gru= $request->id_gru;
		
		$this->validate($request,[
            'id_ma'=>'required|numeric',
            'nombre'=>['required|regex:/^[A-Z][A-Z,a-z, ,ñ]*$/'],
			'id_usu'=>'required|numeric',
			'id_gru'=>'required|numeric',
		]);
		
		$mat = new materias;
		$mat->id_ma = $request->id_ma;
		$mat->nombre = $request->nombre;
		$mat->id_usu = $request->id_usu;
		$mat->id_gru = $request->id_gru;
		$mat->activo = $request->activo;
		$mat->save();

		$proceso = "ALTA DE materia";
		$mensaje = "Registro guardado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
    
    public function reportematerias(){
		$materias = materias::orderBy('id_ma','asc')->get();
		return view ('sistema.reportematerias')
        ->with('materias',$materias);
    }
}