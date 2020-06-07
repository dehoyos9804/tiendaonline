<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $primaryKey='id';
   	protected $table='ventas';
    protected $fillable = ['fecha', 'cliente_id', 'user_id','total'];
    protected $hidden = ['created_at','updated_at'];

    public function clientes(){
    	return $this->belongsTo('App\Models\Cliente', 'cliente_id');
    }

    public function users(){
    	return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function productos(){
        return $this->belongsToMany('App\Models\Producto');
    }

}
