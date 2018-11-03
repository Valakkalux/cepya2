<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\usuarios;


class Usuario extends Controller
{
    public function altausuario(){
        $clavequesigue =usuarios::orderBy('id_usu','desc')
        ->take(1)
        ->get();

		$id_usu = $clavequesigue[0]->id_usu+1;
		
		return view ("sistema.altausuarios")
				->with('id_usu',$id_usu);
    }

    public function guardausuario(request $request)
	{
		//$id_usu = $request->id_usu;
		$nombre = $request->nombre;		
		$ap_pat = $request->ap_pat;
		$ap_mat = $request->ap_mat;
        $correo = $request->correo;
        $contrasena = $request->contrasena;
		$telefono = $request->telefono;
		$activo = $request->activo;
		
		$this->validate($request,[
            //'id_usu'=>'required|numeric',
            'nombre'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ]+$/'],
            'ap_pat'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ]+$/'],
            'ap_mat'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ]+$/'],
			'correo'=>['required','regex:/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/'],
			'contrasena'=>['required','regex:/^[A-Z,a-z,0-9]{8}$/'],
			'telefono'=>['required','regex:/^[0-9]{10}$/'],
			
		]);

		$usu = new usuarios;
		//$usu->id_usu = $request->id_usu;
		$usu->nombre = $request->nombre;
		$usu->ap_pat = $request->ap_pat;
		$usu->ap_mat = $request->ap_mat;
		$usu->correo = $request->correo;
		$usu->contrasena = $request->contrasena;
		$usu->telefono = $request->telefono;
		$usu->activo = $request->activo;
		$usu->tipo= $request->tipo;
		$usu->save();

		$proceso = "ALTA DE USUARIO";
		$mensaje = "Registro guardado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}	



	public function reporteusuarios(){
		$usuarios = usuarios::orderBy('id_usu','asc')->get();
		return view ('sistema.reporteusuarios')
		->with('usuarios',$usuarios	);
	}


}