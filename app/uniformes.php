<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class uniformes extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_u';
    protected $fillable=['id_u','tipo','id_t','activo'];
        protected $date=['deleted_at'];
    }

