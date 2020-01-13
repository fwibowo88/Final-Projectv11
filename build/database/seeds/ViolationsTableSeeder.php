<?php

use Illuminate\Database\Seeder;

class ViolationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('violations')->insert([
          'name' => 'Shoes Color',
          'description' => 'Wrong Shoes Color',
          'point' => '10',
          'status' => 'active',
        ]);
    }
}
