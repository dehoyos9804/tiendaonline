<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $primaryKey='id';
   	protected $table='tipousuarios';
    protected $fillable = ['nombre'];
    protected $hidden = ['created_at','updated_at'];
}
