<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    protected $primaryKey = 'id_usu';
    protected $fillable=['id_usu','idc','nombre','ap_pat','ap_mat','correo','contrasena','telefono','activo','tipo'];
}
