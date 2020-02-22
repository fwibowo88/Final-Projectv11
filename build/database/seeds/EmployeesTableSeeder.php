<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employees')->insert([
          'nik' => '11223344',
          'password' => 'helloWorld',
          'fname' => 'Employee',
          'lname' => '01',
          'address' => 'Surabaya',
          'email' => 'employee-01@smkstlouis.sch.id',
          'phone' => '+62812345678',
          'status' => 'active',
          'department_id' => '1',
        ]);
        DB::table('employees')->insert([
          'nik' => '11223355',
          'password' => 'helloWorld',
          'fname' => 'Employee',
          'lname' => '01',
          'address' => 'Surabaya',
          'email' => 'employee-01@smkstlouis.sch.id',
          'phone' => '+62812345678',
          'status' => 'active',
          'department_id' => '1',
        ]);
    }
}
