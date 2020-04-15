<?php

use Illuminate\Database\Seeder;

class ClassRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_rooms')->insert(array(
            array(
                'class_name' => 'Primary One',
                'class_teacher_id' => 1,
                'students_id' => 3,
                'stream_id' => 1,
                'fees_amount' => 500000,
                'status'    => 'active'
        ),
            array(
                'class_name' => 'Primary One',
                'class_teacher_id' => 1,
                'students_id' => 2,
                'stream_id' => 1,
                'fees_amount' => 500000,
                'status'    => 'active'
            ),
            array(
                'class_name' => 'Primary One',
                'class_teacher_id' => 1,
                'students_id' => 1,
                'stream_id' => 1,
                'fees_amount' => 500000,
                'status'    => 'active'
            )
        ));
    }
}
