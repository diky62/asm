<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'roles_id' => 1,
          	'name' => 'Owner',
          	'alamat' => 'Bandung',
          	'no_hp' => '083148302377',
          	'email' => 'owner@owner.com',
          	'password' => bcrypt('owner')
          	
      ]);
    }
}
