<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tallas;
use App\grado;
use App\pagos;

class Pago extends Controller
{
    public function altapagos()
	{
		$id_gra = grado::orderBy('nombre','Asc')
                            ->get();
                            
        $tallas = tallas::where('activo','=','si')
							->orderBy('medida','Asc')
                            ->get();
                            
        $clavequesigue = pagos::orderBy('id_p','desc')
                            //->take(1)
                            ->get();

		//$id_p = $clavequesigue[0]->id_p+1;
				
		return view ("sistema.altapago")
            //    ->with('id_p',$id_p)
                ->with('tallas',$tallas)
				->with('grado',$id_gra);
    }
    
    public function guardapago(request $request)
    {
       // $id_p = $request->id_p;
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
           // 'id_p' => 'required|numeric',
            'concepto' => 'required',['regex:/^[A-Z][A-Z,a-z, ,ñ]+$/'],
            'id_t' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'costo'=>'required|numeric',['regex:/^[0-9]+[.][0-9]{2}$/'],
            'id_gra' => 'required|numeric',
            'total' =>   'required|numeric',['regex:/^[0-9]+[.][0-9]{2}$/'],
            'fecha' => 'required|date_format:Y-m-d',
            'periodo' => 'required',['regex:/^[0-9]{4}$/'],
            'form_pago' => 'required',
            'id_ciclo' => 'required|numeric'
        ]);

        $pag = new pagos;
        $pag->id_p = $request->id_p;
        $pag->concepto = $request->concepto;
        $pag->id_t = $request->id_t;
        $pag->cantidad = $request->cantidad;
        $pag->costo = $request->costo;
        $pag->id_gra = $request->id_gra;
        $pag->total = $request->total;
        $pag->fecha = $request->fecha;
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

    public function reportepagos(){
		$pago = pagos::orderBy('id_p','asc')->get();
		return view ('sistema.reportepago')
        ->with('pago',$pago);
    }

    }
