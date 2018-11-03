<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class pagos extends Model
{
	use SoftDeletes;
    protected $primaryKey = 'id_p';
    protected $fillable=['id_p','concepto','id_t','cantidad','costo','id_gra','total','fecha','periodo','form_pago','id_ciclo'];
     protected $date=['deleted_at'];

}
