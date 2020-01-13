<?php

use Illuminate\Database\Seeder;

class TokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tokens')->insert([
          'code' => 'ABCDEF',
          'status' => 'active',
        ]);
    }
}
