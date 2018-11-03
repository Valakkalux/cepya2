<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\usuarios;
use App\tallas;
use App\grado;
class Pagos extends Controller
{

public function altapagos()
	{
		$tallas = tallas::where('activo','=','si')
							->orderBy('medida','Asc')
							->get();

		$id_gra = grado::orderBy('nombre','Asc')
							->get();

		$clavequesigue =materias::orderBy('id_ma','desc')
        ->take(1)
		->get();		

		$id_p = $clavequesigue[0]->id_ma+1;
				
		return view ("sistema.altamaterias")
				->with('id_ma',$tallas)
				->with('id_p',$id_p)
				->with('id_gra',$id_gra);
    }
    
    public function guardapago(request $request)
    {
        $id_p = $request->id_p;
        $concepto = $request->concepto;
        $id_t = $request->id_t;
        $cantidad = $request->cantidad;
        $costo = $request->costo;
        $id_gra = $request->id_gra;
        $total  = $request->total;
        $fecha = $request->fecha;
        $periodo = $request->periodo;
        $form_pago = $request->form_pago;
        $id_ciclo = $request->id_ciclo;

        $this->validate($request,[
            'id_p' => 'required|numeric',
            'concepto' => 'required',['regex:/^[A-Z][A-Z,a-z, ,ñ]+$/'],
            'id_t' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'costo' => 'required',['regex:/^[0-9]+[.][0-9]{2}$/'],
            'id_gra' => 'required|numeric',
            'total' =>   'required',['regex:/^[0-9]+[.][0-9]{3}$/'],
            'fecha' => 'required',
            'periodo' => 'required',['regex:/^[0-9]{4}$/'],
            'form_pago' => 'required',
            'id_ciclo' => 'required|numeric'
        ]);

        $pag = new pago;
        $pag->id_p = $request->id_p;
        $pag->concepto = $request->concepto;
        $pag->id_t = $request->id_t;
        $pag->cantidad = $request->cantidad;
        $pag->costo = $request->costo;
        $pag->id_gra = $request->id_gra;
        $pag->total = $request->total;
        $pag->periodo = $request->periodo;
        $pag->form_pago = $request->form_pago;
        $pag->id_ciclo = $request->id_ciclo;
        $pag->save();

        $proceso = "ALTA DE PAGO";
		$mensaje = "Registro guardado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }

    }
