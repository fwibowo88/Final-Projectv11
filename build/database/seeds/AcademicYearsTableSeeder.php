<?php

use Illuminate\Database\Seeder;

class AcademicYearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('academic_years')->insert([
          'name' => '2019/2020',
          'description' => 'Academic Year of 2019/2020',
          'type' => 'odd',
          'start_date' => '2019-07-01',
          'end_date' => '2019-12-31',
          'status' => 'active',
        ]);
        DB::table('academic_years')->insert([
          'name' => '2019/2020',
          'description' => 'Academic Year of 2019/2020',
          'type' => 'even',
          'start_date' => '2020-01-01',
          'end_date' => '2020-06-30',
          'status' => 'active',
        ]);
    }
}
