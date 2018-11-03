<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class planteles extends Model
{
	//use SoftDeletes;
   protected $primaryKey = 'idp'; 
   protected $fillable=['idp','nombre'];

   //protected $date=['deleted_at'];
}
