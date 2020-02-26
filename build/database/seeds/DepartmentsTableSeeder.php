<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departments')->insert([
          'name' => 'Administration',
          'description' => 'Dept of Administration',
          'status' => 'active',
        ]);
        DB::table('departments')->insert([
          'name' => 'Facilities',
          'description' => 'Dept of Facilities',
          'status' => 'active',
        ]);
        DB::table('departments')->insert([
          'name' => 'Academic',
          'description' => 'Dept of Academic',
          'status' => 'active',
        ]);
        DB::table('departments')->insert([
          'name' => 'Health',
          'description' => 'Dept of Health',
          'status' => 'active',
        ]);
        DB::table('departments')->insert([
          'name' => 'Counseling',
          'description' => 'Dept of Counseling',
          'status' => 'active',
        ]);
        DB::table('departments')->insert([
          'name' => 'TKJ-Teknik Komputer Jaringan',
          'description' => 'Dept of TKJ',
          'status' => 'active',
        ]);
        DB::table('departments')->insert([
          'name' => 'MM-Multimedia',
          'description' => 'Dept of Multimedia',
          'status' => 'active',
        ]);
        DB::table('departments')->insert([
          'name' => 'TAV-Teknik Audio Video',
          'description' => 'Dept of TAV',
          'status' => 'active',
        ]);
        DB::table('departments')->insert([
          'name' => 'TSM-Teknik Sepeda Motor',
          'description' => 'Dept of TSM',
          'status' => 'active',
        ]);
        DB::table('departments')->insert([
          'name' => 'TKR-Teknik Kendaraan Ringan',
          'description' => 'Dept of TKR',
          'status' => 'active',
        ]);
        DB::table('departments')->insert([
          'name' => 'TPM-Teknik Pemesinan',
          'description' => 'Dept of TPM',
          'status' => 'active',
        ]);
    }
}
