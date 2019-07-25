<?php

use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->insert([
          	'jurusan' => 'Kuningan - Palembang'
          	
      ]);
        DB::table('jurusan')->insert([
          	'jurusan' => 'Kuningan - Jambi'
            
      ]);
        DB::table('jurusan')->insert([
          	'jurusan' => 'Cirebon - Palembang'
            
      ]);
        DB::table('jurusan')->insert([
          	'jurusan' => 'Cirebon - Jambi'
            
      ]);
    }
}
