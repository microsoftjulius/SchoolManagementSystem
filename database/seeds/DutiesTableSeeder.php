<?php

use Illuminate\Database\Seeder;

class DutiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('duties')->insert(array(
            array(
                'teacher_id' => 1,
                'week'       => 1,
                'term_id'    => 1,
                'created_by' => 1,
        ),
            array(
                'teacher_id' => 2,
                'week'       => 2,
                'term_id'    => 1,
                'created_by' => 1,  
            ),
            array(
                'teacher_id' => 3,
                'week'       => 3,
                'term_id'    => 1,
                'created_by' => 1,
            )
        ));
    }
}
