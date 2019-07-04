<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Post;

// Estamos generando 5 usuarios. Al primer usuario generado le asignamos el rol de administrator y a los demás el rol user. Después, generamos 8 posts que van asociados al usuario con el id número 1 (el administrador).

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(User::class, 5)->create()->each(function($u){
    		if ($u->id ==1){
    			$u->assignRole('administrador');
    		} else{
    			$u->assignRole('user');
    		}
    	});
        //factory(Post::class, 8)->create(['user_id'=>1]);
    }
}
