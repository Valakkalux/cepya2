<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tallas extends Model
{
   use SoftDeletes;
    protected $primaryKey = 'id_t';
    protected $fillable=['id_t','medida','precio','activo']; 
    protected $date=['deleted_at'];   
}
