<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class grado extends Model
{
   use SoftDeletes;
   protected $primaryKey = 'id_gra';

   protected $fillable=['id_gra','nombre'];

   protected $date=['deleted_at'];
}
