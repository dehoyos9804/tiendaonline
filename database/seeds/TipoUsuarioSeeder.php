<?php
use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'nombre'=>'ADMINISTRADOR'
        ];
        $data2=[
            'nombre'=>'VENDEDOR'
        ];
        $tipousuario = TipoUsuario::create($data);
        $tipousuario2 = TipoUsuario::create($data2);
    }
}
