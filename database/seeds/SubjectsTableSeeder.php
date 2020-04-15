<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert(array(
            array(
                'subject_name'=>'Reading',
                'subject_code'=>'R008D',
                'teacher_id'=>1,
                'created_by'=>1
        ),
            array(
                'subject_name'=>'Social Studies',
                'subject_code'=>'S00SD',
                'teacher_id'=>3,
                'created_by'=>1         
            ),
            array(
                'subject_name'=>'Science',
                'subject_code'=>'SCOL2',
                'teacher_id'=>2,
                'created_by'=>2   
            )
        ));
    }
}
