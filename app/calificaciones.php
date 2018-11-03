<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class calificaciones extends Model
{
	use SoftDeletes;
   protected $primaryKey = 'idc';
   protected $fillable=['idc','esp','mat','his','id_a'];
    protected $date=['deleted_at'];
}
