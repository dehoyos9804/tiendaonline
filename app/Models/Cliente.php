<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey='id';
   	protected $table='clientes';
    protected $fillable = ['identificacion', 'nombre', 'apellido','telefono','direccion'];
    protected $hidden = ['created_at','updated_at'];

    public function ventas(){
        return $this->hasMany('App\Models\Venta');
    }
}
