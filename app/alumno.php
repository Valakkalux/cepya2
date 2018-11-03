<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class alumno extends Model
{
	
	 use SoftDeletes;
   protected $primaryKey = 'id_a';  
   protected $fillable=['id_a','nombre', 'ap_p','ap_m','id_usu',
   						'id_ni','id_gru','id_gra','id_ciclo'];
    protected $date=['deleted_at'];
}