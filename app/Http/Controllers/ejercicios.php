<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\maestros;
use App\planteles;


class ejercicios extends Controller
{
    public function muestrabienvenida()
    {
       return view('welcome');
    }
	public function mensaje()
    {
       echo "HOLA PKÑO PADAWAN";
    }
	public function mensajenombre($nombre)
    {
       echo "HOLA BIENVENIDO: $nombre";
    }
	public function mensajenombre2($nombre,$apodo)
    {
       echo "HOLA BIENVENIDO: $nombre ALIAS EL $apodo";
    }
	public function triangulo($base,$altura)
    {
       $area = ($base * $altura)/2;
	   return view('triangulo2')
	          ->with('area',$area)
			  ->with('base',$base)
			  ->with('altura',$altura);
    }
	public function exa($p1,$c1,$p2,$c2)
    {
		$total1 = $c1*10;
		$total2 = $c2*10;
		$totalf = $total1+$total2;
	   /*return view('reporte')
	          ->with('p1',$p1)
			   ->with('c1',$c1)
			    ->with('total1',$total1)
			  ->with('p2',$p2)
			  ->with('c2',$c2)
			  ->with('total2',$total2)
			  ->with('totalf',$totalf);*/
	    return view ('reporte',compact('p1','c1','total1',
		    'p2','c2','total2','totalf'));
    }
	public function principal()
	{
		return view ('sistema.principal');
    }
     public function altaestado()
	{
		return view ('sistema.altaestado');
	}
	public function reporteproductos()
	{
		return view ('sistema.reporteprod');
	}
	
	public function muestraformulario()
	{
		 
	 $clavequesigue = maestros::withTrashed()
	                            ->orderBy('idm','desc')
								->take(1)->get();
     $idms = $clavequesigue[0]->idm+1;
	 
	 $planteles = planteles::all();
	 
		return view ('sistema.altamaestros')
		->with('idms',$idms)
		->with('planteles',$planteles);
		       
	}
	public function recibeinformacion(Request $request)
	{
		 $idm = $request->idm;
		 $nombre = $request->nombre;
		 $edad = $request->edad;
		 $rfc = $request->rfc;
		 $correo = $request->correo;
		// echo "<br>".$idm;
		 //echo "<br>".$nombre;
		// echo "<br>".$edad;
		// echo "<br>".$rfc;
		 //echo "<br>".$correo;
		 
    $this->validate($request,[
	'idm'=>'required|numeric',
	'nombre'=>'required|alpha',
	'edad'=>'required|numeric|integer|max:40',
	'correo'=>'required|email',
	'img'=>'image|mimes:gif,jpeg,png',
   'rfc'=>['regex:/^[A-Z]{4}[0-9]{6}$/']
	]);
	
     $file = $request->file('img');
	 $ldate = date('Ymd_His_');
	 $img = $file->getClientOriginalName();
	 $img2 = $ldate.$img;
	 \Storage::disk('local')->put($img2, \File::get($file));
	 
		$maest = new maestros;
			$maest->idm = $request->idm;
			$maest->nombre = $request->nombre;
			$maest->edad =$request->edad;
			$maest->rfc= $request->rfc;
			$maest->correo=$request->correo;
			$maest->idp=$request->idp;
			$maest->save();
			
			$modulo = "Alta de maestros";
		$resultado =  "Registro Guardado Correctamente";
		
		return view ('sistema.mensajessistema')
		->with('modulo',$modulo)
		->with('resultado',$resultado);
	}
	
	
	public function muestraregistros()
   {
    $ma =maestros::withTrashed()
	->orderBy('idm')->paginate('3');
	return view('sistema.reporte',compact('ma')); 
   }
	
	public function borramaestro($idm)
   {
	    maestros::find($idm)->delete();
	    echo "El maestro eliminado es $idm";
   }
   	public function modificamaestro($idm)
   {
	   $consulta = maestros::withTrashed()
	          ->where('idm',$idm)
			  ->get();
	   $idp = $consulta[0]->idp;
	   
	   $plan = planteles::where('idp',$idp)
	           ->get();
	   $nombrep = $plan[0]->nombre;
     //  echo "$idp  $nombrep";	  
       $planteles = planteles::where('idp','<>',$idp)
	           ->get();	 
			
	return view ('sistema.modificamaestro')
	            ->with('consulta',$consulta[0])
				->with('idp',$idp)
				->with('nombrep',$nombrep)
				->with('planteles',$planteles);
   }
   
   public function modificamaestro2(Request $request)
	{
		 $idm = $request->idm;
		 $nombre = $request->nombre;
		 $edad = $request->edad;
		 $rfc = $request->rfc;
		 $correo = $request->correo;
		

    $this->validate($request,[
	'idm'=>'required|numeric',
	'nombre'=>'required|alpha',
	'edad'=>'required|numeric|integer|max:40',
	'correo'=>'required|email',
   'rfc'=>['regex:/^[A-Z]{4}[0-9]{6}$/']
	]);
	 
	
		
		    $maest = maestros::withTrashed()->find($idm);
			$maest->nombre = $request->nombre;
			$maest->edad =$request->edad;
			$maest->rfc= $request->rfc;
			$maest->correo=$request->correo;
			$maest->idp=$request->idp;
			$maest->save();
	
			$modulo = "Modifica Maestro";
		$resultado =  "Registro Modificado Correctamente";
		
		return view ('sistema.mensajessistema')
		->with('modulo',$modulo)
		->with('resultado',$resultado);
	}
}






























