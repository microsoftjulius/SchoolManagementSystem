<?php

use Illuminate\Database\Seeder;

class PublicDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('public_days')->insert(array(
            array(
                'public_day'=>'Easter Monday',
                'date'=>'2020-04-12',
                'created_by'=>1
        ),
            array(
                'public_day'=>'Valentine',
                'date'=>'2020-02-14',
                'created_by'=>1    
            ),
            array(
                'public_day'=>'Labour Day',
                'date'=>'2020-03-12',
                'created_by'=>1 
            )
        ));
    }
}
