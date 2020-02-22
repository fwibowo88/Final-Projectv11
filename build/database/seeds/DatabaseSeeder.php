<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(ReligionsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(TokensTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(CounselingsTableSeeder::class);
        $this->call(AchievmentsTableSeeder::class);
        $this->call(ViolationsTableSeeder::class);
        $this->call(AcademicYearsTableSeeder::class);
        $this->call(BillingItemsTableSeeder::class);
        $this->call(ComplaintsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
    }
}
