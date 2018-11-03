<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ciclosescolares extends Model
{
	use SoftDeletes;
	protected $primaryKey = 'id_ciclo';  
	protected $fillable=['id_ciclo','ciclo'];
	protected $date=['deleted_at'];
}
