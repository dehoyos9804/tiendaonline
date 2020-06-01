<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $primaryKey='id';
   	protected $table='personas';
    protected $fillable = ['nombre', 'apellido','telefono','direccion','tipousuarios_id','users_id'];
    protected $hidden = ['created_at','updated_at'];
}
