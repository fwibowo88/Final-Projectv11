<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('banks')->insert([
          'name' => 'BCA',
          'description' => 'Bank Central Asia',
          'status' => 'active',
        ]);
        DB::table('banks')->insert([
          'name' => 'BRI',
          'description' => 'Bank Rakyat Indonesia',
          'status' => 'active',
        ]);
        DB::table('banks')->insert([
          'name' => 'BNI',
          'description' => 'Bank Negara Indonesia',
          'status' => 'active',
        ]);
        DB::table('banks')->insert([
          'name' => 'Mandiri',
          'description' => 'Bank Mandiri',
          'status' => 'active',
        ]);
        DB::table('banks')->insert([
          'name' => 'Panin',
          'description' => 'Bank Panin',
          'status' => 'active',
        ]);
    }
}
