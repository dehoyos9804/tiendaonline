<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $primaryKey='id';
   	protected $table='secciones';
    protected $fillable = ['nombre','descripcion'];
    protected $hidden = ['created_at','updated_at'];

    public function producto(){
    	return $this->hasMany('App\Models\Producto');
    }
}
