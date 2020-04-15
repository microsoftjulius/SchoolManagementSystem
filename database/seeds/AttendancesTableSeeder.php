<?php

use Illuminate\Database\Seeder;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendances')->insert(array(
            array(
                'student_id'        => 1,
                'class_id'          => 1,
                'subject_id'        => 1,
                'teacher_id'        => 1,
                'attendance_status' => 'yes'
        ),
            array(
                'student_id'        => 2,
                'class_id'          => 1,
                'subject_id'        => 1,
                'teacher_id'        => 1,
                'attendance_status' => 'yes'
            ),
            array(
                'student_id'        => 3,
                'class_id'          => 1,
                'subject_id'        => 1,
                'teacher_id'        => 1,
                'attendance_status' => 'yes'
            )
        ));
    }
}
