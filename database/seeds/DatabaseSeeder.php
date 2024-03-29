<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Roles;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
       //  $this->call([
       //    RoleSeeder::class,
      	// ]);
      	$this->call([
          RolesSeeder::class,
      	]);
      	$this->call([
          UsersSeeder::class,
      	]);
        $this->call([
          JurusanSeeder::class,
        ]);

    }
}
