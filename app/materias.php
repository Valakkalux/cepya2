<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materias extends Model
{
    protected $primaryKey = 'id_t';
    protected $fillable=['id_t','medida','activo'];
}
