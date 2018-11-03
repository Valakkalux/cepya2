<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\usuarios;
use App\alumno;
use App\niveles;
use App\grupo;
use App\grado;
use App\materias;
use App\calificaciones;
use App\ciclosescolares;

class Calificacion extends Controller
{
    public function altacalificaciones()
    {
			$alumno=alumno::where('activo','=','Si')
		                    ->orderBy('nombre','Asc')
							->get();
	   return view ("sistema.calificacion")
	   ->with('alumno',$alumno);
	}	
    public function guardacalificaciones(Request $request)
    {
		$id_cal = $request->id_cal;
		$esp = $request->esp;
		$mat = $request->mat;
		$his = $request->his;
		$id_a = $request->id_a;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		$this->validate($request,[
		 'esp'=>'required|numeric',
		 'mat'=>'required|numeric',
		 'his'=>'required|numeric'
	     ]);

		    $gru = new calificaciones;
			$gru->id_cal = $request->id_cal;
			$gru->esp = $request->esp;
			$gru->mat = $request->mat;
			$gru->his = $request->his;
			$gru->id_a = $request->id_a;
			$gru->save();

		$proceso = "ALTA DE calificaciones";	
	    $mensaje="Registro guardado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}		
	
	public function reportecalificaciones()
	{

	$calificaciones=\DB::select("SELECT c.id_cal,c.esp,c.mat,c.his,a.nombre AS alum,c.deleted_at
		from calificaciones AS c
		INNER JOIN alumnos AS a on a.id_a = c.id_a");
	return view ('sistema.reportecalificaciones')
	->with('calificaciones',$calificaciones);
//	return $calificaciones;
	
	}
	public function eliminam($idm)
	{
		    maestros::find($idm)->delete();
		    $proceso = "ELIMINAR MAESTROS";
			$mensaje = "El maestro ha sido borrado Correctamente";
			return view ('sistema.mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificam($idm)
	{
		$maestro = maestros::where('idm','=',$idm)->get();
		
		$idc = $maestro[0]->idc;
		
		$carrera = carreras::where('idc','=',$idc)->get();
		$demascarreras = carreras::where('idc','!=',$idc)
		                           ->get();
		
		
		return view('sistema.guardamaestro')
	                             ->with('maestro',$maestro[0])
								 ->with('idc',$idc)
								 ->with('carrera',$carrera[0]->nombre)
								 ->with('demascarreras',$demascarreras);
	}
	public function editamaestro(Request $request)
	{
	$nombre = $request->nombre;
		$idm = $request->idm;
		$edad= $request->edad;
		$sexo = $request->sexo;
		$beca= $request->beca;
		$cp = $request->cp;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
		 'nombre'=>'required',['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		 'edad'=>'required|integer|min:18|max:60',
		 'cp'=>'required',['regex:/^[0-9]{5}$/'],
		 'beca'=>'required',['regex:/^[0-9]+[.][0-9]{2}$/'],
		 'archivo'=>'image|mimes:jpg,jpeg,png,gif'
	     ]);
		 
		  $file = $request->file('archivo');
	 if($file!="")
	 {
	 $ldate = date('Ymd_His_');
	 $img = $file->getClientOriginalName();
	 $img2 = $ldate.$img;
	 \Storage::disk('local')->put($img2, \File::get($file));
	 }
		 
		    $maest = maestros::find($idm);
			$maest->idm = $request->idm;
			$maest->nombre = $request->nombre;
			$maest->edad =$request->edad;
			$maest->sexo= $request->sexo;
			$maest->cp=$request->cp;
			$maest->beca=$request->beca;
			$maest->idc=$request->idc;
			if($file!='')
			{
			$maest->archivo = $img2;
			}
			$maest->save();
		$proceso = "Modificacion DE MAESTRO";	
	    $mensaje="Registro modificado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	public function restauram($idm)
	{
		maestros::withTrashed()->where('idm',$idm)->restore();
		$proceso = "RESTAURACION DE MAESTRO";	
	    $mensaje="Registro restaurado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);

		
	}
}






















