<?php

use Illuminate\Database\Seeder;

class StreamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('streams')->insert(array(
            array(
                'stream_name'=>'West',
                'status'=>'active',
                'created_by'=>1
        ),
            array(
                'stream_name'=>'West',
                'status'=>'active',
                'created_by'=>1      
            ),
            array(
                'stream_name'=>'West',
                'status'=>'active',
                'created_by'=>1 
            )
        ));
    }
}
