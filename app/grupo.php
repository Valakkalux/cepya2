<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class grupo extends Model
{
	use SoftDeletes;
   protected $primaryKey = 'id_gru';  
   protected $fillable=['id_gru','nombre'];
   protected $date=['deleted_at'];
}
