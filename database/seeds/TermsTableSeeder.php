<?php

use Illuminate\Database\Seeder;

class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('terms')->insert(array(
            array(
                'term'=>1,
                'year'=>'2019',
                'duration'=>'3 months',
        ),
            array(
                'term'=>2,
                'year'=>'2019',
                'duration'=>'4 months',                
            ),
            array(
                'term'=>3,
                'year'=>'2019',
                'duration'=>'3 months',  
            )
        ));
    }
}
