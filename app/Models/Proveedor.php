<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $primaryKey='id';
   	protected $table='proveedores';
    protected $fillable = ['nit', 'razonsocial', 'telefono','direccion'];
    protected $hidden = ['created_at','updated_at'];

    public function compras(){
    	return $this->hasMany('App\Models\Compras');
    }
}
