<?php

use Illuminate\Database\Seeder;

class AchievmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('achievments')->insert([
          'name' => 'Sport',
          'description' => 'Achievment in Sport',
          'point' => 100,
          'grade' => 'city',
          'status' => 'active',
        ]);
        DB::table('achievments')->insert([
          'name' => 'Art',
          'description' => 'Achievment in Art',
          'point' => 100,
          'grade' => 'city',
          'status' => 'active',
        ]);
        DB::table('achievments')->insert([
          'name' => 'Academic',
          'description' => 'Achievment in Academic',
          'point' => 100,
          'grade' => 'city',
          'status' => 'active',
        ]);
    }
}
