<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $primaryKey='id';
   	protected $table='compras';
    protected $fillable = ['fecha','descuento','total', 'proveedores_id'];
    protected $hidden = ['created_at','updated_at'];
}
