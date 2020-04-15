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
        $this->call(UsersTableSeed::class);
        $this->call(TermsTableSeeder::class);
        $this->call(TimeTablesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(StreamsTableSeeder::class);
        $this->call(PublicDaysTableSeeder::class);
        $this->call(PastPapersTableSeeder::class);
        $this->call(ParentsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(HomeWorksTableSeeder::class);
        $this->call(FeesTableSeeder::class);
        $this->call(ExamsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(DutiesTableSeeder::class);
        $this->call(CurricularActivitiesTableSeeder::class);
        $this->call(ClassRoomsTableSeeder::class);
        $this->call(AttendancesTableSeeder::class);
        
        
    }
}
