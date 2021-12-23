<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use App\Models\Servicio;
use App\Models\Sucursal;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sucursal::create([
            'nombre'=>'Sucursal 1',
            'direccion'=>'Direccion 120',
        ]);
        Servicio::create(
        [
            'nombre'=>'Servicio 1',
            'precio'=>150,
            'sucursal_id'=>1,
        ]);

        GeneralSetting::create([]);

        $role1 = Role::create(['name'=>'Administrador']);
        $admin = User::create([
            'nombre'=>'Admin',
            'apellido'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('adminadmin'),
        ]);
        $admin->roles()->sync([1]);

        // ADMIN SETTING                            
        Permission::create(['name'=>'admin.settings',
                            'description'=>'Modificación de Vistas'])->syncRoles([$role1]);
        // PERMISO PARA ROLES
        Permission::create(['name'=>'admin.roles.index',
                            'description'=>'Ver listado de Roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.create',
                            'description'=>'Crear Rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.edit',
                            'description'=>'Editar Rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.destroy',
                            'description'=>'Eliminar Rol'])->syncRoles([$role1]);

        // PERMISO PARA USUARIOS
        Permission::create(['name'=>'admin.users.index',
                'description'=>'Ver listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.create',
                'description'=>'Crear Usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit',
                'description'=>'Editar Usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.destroy',
                'description'=>'Eliminar Usuario'])->syncRoles([$role1]);
    
        // PERMISO PARA SERVICIOS
        Permission::create(['name'=>'admin.servicios.index',
            'description'=>'Ver listado de Servicios'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.servicios.create',
            'description'=>'Crear Servicio'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.servicios.edit',
            'description'=>'Editar Servicio'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.servicios.destroy',
            'description'=>'Eliminar Servicio'])->syncRoles([$role1]);

        // PERMISO PARA SUCURSALES
        Permission::create(['name'=>'admin.sucursales.index',
            'description'=>'Ver listado de Sucursales'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.sucursales.create',
            'description'=>'Crear Sucursal'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.sucursales.edit',
            'description'=>'Editar Sucursal'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.sucursales.destroy',
            'description'=>'Eliminar Sucursal'])->syncRoles([$role1]);

        // PERMISO PARA PACIENTES
        Permission::create(['name'=>'admin.paciente.index',
            'description'=>'Ver información del paciente'])->syncRoles([$role1]);
        // PERMISO PARA CALENDARIO
        Permission::create(['name'=>'admin.calendario.index',
            'description'=>'Ver calendario'])->syncRoles([$role1]);
    }
}
