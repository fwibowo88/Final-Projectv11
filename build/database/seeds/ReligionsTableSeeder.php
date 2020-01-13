<?php

use Illuminate\Database\Seeder;

class ReligionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('religions')->insert([
          'name' => 'Katolik',
          'description' => 'Agama Katolik',
          'status' => 'active',
        ]);
        DB::table('religions')->insert([
          'name' => 'Kristen',
          'description' => 'Agama Kristen',
          'status' => 'active',
        ]);
        DB::table('religions')->insert([
          'name' => 'Budha',
          'description' => 'Agama Budha',
          'status' => 'active',
        ]);
        DB::table('religions')->insert([
          'name' => 'Hindu',
          'description' => 'Agama Hindhu',
          'status' => 'active',
        ]);
        DB::table('religions')->insert([
          'name' => 'Islam',
          'description' => 'Agama Islam',
          'status' => 'active',
        ]);
    }
}
