<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
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
    }
}
