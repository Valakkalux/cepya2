<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class niveles extends Model
{
	//use SoftDeletes;
   protected $primaryKey = 'id_n';  
   protected $fillable=['id_n','nivel'];

   //protected $date=['deleted_at'];
}
