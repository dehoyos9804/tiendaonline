<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $primaryKey='id';
   	protected $table='ventas';
    protected $fillable = ['fecha', 'clientes_id', 'users_id','descuento','total'];
    protected $hidden = ['created_at','updated_at'];

    public function clientes(){
    	return $this->belongsTo('App\Models\Cliente', 'clientes_id');
    }

    public function users(){
    	return $this->belongsTo('App\Models\User', 'users_id');
    }

    public function productos(){
        return $this->belongsToMany('App\Models\Producto');
    }

}
