<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $primaryKey='id';
   	protected $table='ventas';
    protected $fillable = ['fecha', 'clientes_id', 'users_id','descuento','total'];
    protected $hidden = ['created_at','updated_at'];
}
