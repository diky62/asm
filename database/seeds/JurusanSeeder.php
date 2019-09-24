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
            'harga' => '300000'
          	
      ]);
        DB::table('jurusan')->insert([
          	'jurusan' => 'Kuningan - Jambi'
            'harga' => '350000'
      ]);
        DB::table('jurusan')->insert([
          	'jurusan' => 'Cirebon - Palembang'
            'harga' => '300000'
      ]);
        DB::table('jurusan')->insert([
          	'jurusan' => 'Cirebon - Jambi'
            'harga' => '350000'
      ]);
    }
}
