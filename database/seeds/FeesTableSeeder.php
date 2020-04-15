<?php

use Illuminate\Database\Seeder;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fees')->insert(array(
            array(
                'student_id'=>1,
                'term_id'=>1,
                'amount'=>250000,
                'created_by'=>1,
        ),
            array(
                'year'=>'2018',
                'class_id'=>2,
                'subject_id'=>1,
                'created_by'=>1,       
            ),
            array(
                'year'=>'2018',
                'class_id'=>2,
                'subject_id'=>1,
                'created_by'=>1, 
            )
        ));
    }
}
