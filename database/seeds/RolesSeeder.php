<?php

use Illuminate\Database\Seeder;
use App\Roles; 

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>'Owner',
            'level'=>1
        ]);
        DB::table('roles')->insert([
            'name'=>'Divisi Shuttle',
            'level'=>2
        ]);
        DB::table('roles')->insert([
            'name'=>'Divisi Pariwisata',
            'level'=>3
        ]);
        DB::table('roles')->insert([
            'name'=>'Staff Pariwisata',
            'level'=>4
        ]);
    }
}
