<?php

use App\Models\User;
use App\Models\Persona;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'id'=>8,
            'name'=>'Jesus Villarreal',
            'email'=>'admin1@mail.com',
            'password'=>'$2y$10$WWEdjwBa2boMuaxt2Lt3hu6HFwmCdBc1sZ7AeN2b8PCrVvETeQnRy'//secret123
        ];
        $data2=[
            'id'=>1,
            'nombre'=>'Jesus',
            'apellido'=>'Villarreal',
            'telefono'=>'312121212',
            'direccion'=>'calle Falsa 123',
            'tipousuario_id'=>1,
            'user_id'=>8
        ];
        $user = User::create($data);
        $persona = Persona::create($data2);
    }
}
