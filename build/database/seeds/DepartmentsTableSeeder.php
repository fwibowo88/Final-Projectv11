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
    }
}
