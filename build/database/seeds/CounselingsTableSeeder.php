<?php

use Illuminate\Database\Seeder;

class CounselingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('counselings')->insert([
          'name' => 'Academic',
          'description' => 'Hard to following the Subject',
          'status' => 'active',
        ]);
    }
}
