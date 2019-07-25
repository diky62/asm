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
        DB::table('users')->insert([
          'roles_id' => 2,
            'name' => 'Shuttle',
            'alamat' => 'Bandung',
            'no_hp' => '083148302377',
            'email' => 'shuttle@shuttle.com',
            'password' => bcrypt('shuttle')
            
      ]);
        DB::table('users')->insert([
          'roles_id' => 3,
            'name' => 'Pariwisata',
            'alamat' => 'Bandung',
            'no_hp' => '083148302377',
            'email' => 'pariwisata@pariwisata.com',
            'password' => bcrypt('pariwisata')
            
      ]);
        DB::table('users')->insert([
          'roles_id' => 4,
            'name' => 'Staff',
            'alamat' => 'Bandung',
            'no_hp' => '083148302377',
            'email' => 'staff@staff.com',
            'password' => bcrypt('staff')
            
      ]);
    }
}
