<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompraProducto extends Model
{
    protected $primaryKey='id';
   	protected $table='compra_producto';
    protected $fillable = ['cantidad','total','compras_id', 'productos_id'];
    protected $hidden = ['created_at','updated_at'];
}
