<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
// ejemplo, podemos añadir los permisos que queramos
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create(['name' => 'post_create']);
        Permission::create(['name' => 'post_edit']);
        Permission::create(['name' => 'post_delete']);
        Permission::create(['name' => 'comment_create']);
    }
}
