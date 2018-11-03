<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\uniformes;
use App\tallas;
class Uniforme extends Controller
{
    public function altauniforme()
	{
		$tallas=tallas::where('activo','=','si')
							->orderBy('medida','Asc')
							->get();


				
		return view ("sistema.altauniforme")
				
				->with('tallas',$tallas);
	}

	public function guardauniforme(request $request)
	{
		//$id_u = $request->id_u;
		$tipo = $request->tipo;
		$id_t = $request->id_t;

		$this->validate($request,[
          //  'id_u'=>'required|numeric',
            'tipo'=>'required',['regex:/^[A-Z][A-Z,a-z, ,ñ]+$/'],
            'id_t'=>'required|numeric',
		]);
		
		$uni = new uniformes;
		$uni->id_u = $request->id_u;
		$uni->tipo = $request->tipo;
		$uni->id_t = $request->id_t;
		$uni->activo = $request->activo;
		$uni->save();

		$proceso = "ALTA DE UNIFORME";
		$mensaje = "Registro guardado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
    
    public function reporteuniformes(){
		$uniformes = uniformes::orderBy('id_u','asc')->get();
		return view ('sistema.reporteuniformes')
		->with('uniformes',$uniformes);
	}


}