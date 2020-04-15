<?php

use Illuminate\Database\Seeder;

class TimeTablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_tables')->insert(array(
            array(
                'class_id'=>1,
                'created_by'=>1,
                'time_table'=>'p1.pdf',
        ),
            array(
                'class_id'=>2,
                'created_by'=>1,
                'time_table'=>'p2.pdf',                
            ),
            array(
                'class_id'=>3,
                'created_by'=>1,
                'time_table'=>'p3.pdf',
            )
        ));
    }
}
