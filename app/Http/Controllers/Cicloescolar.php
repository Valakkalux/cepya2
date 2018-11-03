<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ciclosescolares;
use App\grado;

class cicloescolar extends Controller
{
    public function altaciclos()
    {
			$grado=grado::withTrashed()->orderBy('nombre','Asc')
							->get();
		    $clavequesigue = ciclosescolares::withTrashed()->orderBy('id_ciclo','nombre')
								->take(1)
								->get();
            $idcs = $clavequesigue[0]->id_ciclo+1;
	    return view ("sistema.altaciclos")
		->with('grado',$grado)
	    ->with('idcs',$idcs);

	}	
    public function guardaciclos(request $request)
    {
		$ciclo = $request->ciclo;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		$this->validate($request,[
	    // 'id_a'=>'required|numeric',
		 'ciclo'=>['required','regex:/^[0-9]{4}[-][0-9]{4}$/'],
	     ]);

		    $grad = new ciclosescolares;
			$grad->id_gra = $request->id_gra;
			$grad->ciclo = $request->ciclo;
			$grad->save();

		$proceso = "ALTA DE alumno";	
	    $mensaje="Registro guardado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}		
	
	public function reporteciclos()
	{

	$ciclosescolares = ciclosescolares::withTrashed()
				->orderBy('id_ciclo','asc')->get();
	return view ('sistema.reporteciclos')
				->with('ciclosescolares',$ciclosescolares);
	
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






















