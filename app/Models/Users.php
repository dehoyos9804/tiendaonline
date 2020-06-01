<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $primaryKey='id';
   	protected $table='users';
    protected $fillable = ['name','email','email_verified_at','password'];
    protected $hidden = ['created_at','updated_at'];
}
