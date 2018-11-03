<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class maestros extends Model
{
	
	 use SoftDeletes;
   protected $primaryKey = 'idm';  
   protected $fillable=['idm','nombre','edad','cp',
                       'sexo','beca','activo','idc'];
    protected $date=['deleted_at'];
}
