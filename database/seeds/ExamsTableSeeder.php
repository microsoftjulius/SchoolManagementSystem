<?php

use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exam_marks')->insert(array(
            array(
                'subject_id'=>1,
                'student_id'=>1,
                'marks'=>78,
                'created_by'=>1,
                'comment'  => 'Very Good',
                'class_id' => 1
        ),
            array(
                'subject_id'=>1,
                'student_id'=>1,
                'marks'=>78,
                'created_by'=>1,
                'comment'  => 'Very Good',
                'class_id' => 1      
            ),
            array(
                'subject_id'=>1,
                'student_id'=>1,
                'marks'=>78,
                'created_by'=>1,
                'comment'  => 'Very Good',
                'class_id' => 1
            )
        ));
    }
}
