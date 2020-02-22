<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->insert([
          'nik' => '111222222',
          'nisn' => '111222222',
          'nis' => '111222222',
          'password' => 'helloWorld',
          'fname' => 'Students',
          'lname' => 'S-01',
          'gender' => 'male',
          'b_place' => 'Surabaya',
          'b_date' => '1998-01-01',
          'address' => 'Surabaya',
          'district' => 'Rungkut',
          'sub_district' => 'Kalirungkut',
          'rt' => '1',
          'rw' => '2',
          'city' => 'Surabaya',
          'province' => 'Jawa Timur',
          'phone' => '+62891234567',
          'email' => 'student-01@smkstlouis.sch.id',
          'bank_acc' => '112233445566',
          'blood_type' => 'A',
          'height' => '170',
          'weight' => '65',
          'gr_from' => 'SMP Kr Imanul',
          'status' => 'active',
          'notes' => 'Student Notes',
          'religion_id' => '1',
          'class_id' => '1',
          'bank_id' => '1',
        ]);
    }
}
