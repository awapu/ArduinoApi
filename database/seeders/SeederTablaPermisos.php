<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permisos = [
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //tabla establecimiento
            'ver-establecimientos',
            'crear-establecimientos',
            'editar-establecimientos',
            'borrar-establecimientos',

            /*/tabla establecimiento
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
            */
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
