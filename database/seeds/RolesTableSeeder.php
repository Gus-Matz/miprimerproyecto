<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

// ejemplo, podemos añadir los roles que queramos y asignarle los permisos que queramos

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrador']);
        $role->givePermissionTo('post_create','post_edit','post_delete','comment_create');

        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('comment_create');
    }
}
