<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey='id';
   	protected $table='productos';
    protected $fillable = ['img','nombre', 'marca', 'preciocompra','cantidad','precioventa','estado','secciones_id'];
    protected $hidden = ['created_at','updated_at'];

    public function seccion(){
    	return $this->belongsTo('App\Models\Seccion', 'secciones_id');
    }

    public function ventas(){
        return $this->belongsToMany('App\Models\Venta');
    }

    public function compras(){
        return $this->belongsToMany('App\Models\Compra');
    }

}
