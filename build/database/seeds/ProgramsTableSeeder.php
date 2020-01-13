<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('programs')->insert([
          'name' => 'TKJ',
          'description' => 'Teknik Komputer Jaringan',
          'status' => 'active',
        ]);
        DB::table('programs')->insert([
          'name' => 'MM',
          'description' => 'Multimedia',
          'status' => 'active',
        ]);
        DB::table('programs')->insert([
          'name' => 'TAV',
          'description' => 'Teknik Audio Video',
          'status' => 'active',
        ]);
        DB::table('programs')->insert([
          'name' => 'TSM',
          'description' => 'Teknik Sepeda Motor',
          'status' => 'active',
        ]);
        DB::table('programs')->insert([
          'name' => 'TKR',
          'description' => 'Teknik Kendaraan Ringan',
          'status' => 'active',
        ]);
        DB::table('programs')->insert([
          'name' => 'TPM',
          'description' => 'Teknik Pemesinan',
          'status' => 'active',
        ]);
    }
}
