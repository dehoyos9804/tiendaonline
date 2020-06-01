<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoVenta extends Model
{
    protected $primaryKey='id';
   	protected $table='producto_venta';
    protected $fillable = ['cantidad', 'ventas_id', 'productos_id','total'];
    protected $hidden = ['created_at','updated_at'];
}
