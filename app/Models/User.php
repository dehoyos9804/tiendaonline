<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey='id';
   	protected $table='users';
    protected $fillable = ['name', 'email', 'email_verified_at','password'];
    protected $hidden = ['created_at','updated_at'];

    public function persona(){
    	return $this->hasOne('App\Models\Persona');
    }
    public function ventas(){
        return $this->hasMany('App\Models\Venta');
    }
}
