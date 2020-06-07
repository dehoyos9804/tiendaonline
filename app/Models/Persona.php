<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $primaryKey='id';
   	protected $table='personas';
    protected $fillable = ['nombre', 'apellido','telefono','direccion','tipousuario_id','user_id'];
    protected $hidden = ['created_at','updated_at'];

    public function tipousuario(){
    	return $this->belongsTo('App\Models\TipoUsuario', 'tipousuario_id');
    }

    public function users(){
    	return $this->belongsTo('App\Models\User', 'user_id');
    }
}
