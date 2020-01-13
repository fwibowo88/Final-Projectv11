<?php

use Illuminate\Database\Seeder;

class BillingItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('billing_items')->insert([
          'name' => 'SPP',
          'description' => 'SPP for TKJ 2019',
          'price' => 700000,
          'status' => 'active',
        ]);
    }
}
