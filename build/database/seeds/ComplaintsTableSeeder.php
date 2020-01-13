<?php

use Illuminate\Database\Seeder;

class ComplaintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('complaints')->insert([
          'name' => 'Air Conditioner',
          'description' => 'Problem with Air Conditioner',
          'status' => 'active',
          'department_id' => '2',
        ]);
    }
}
