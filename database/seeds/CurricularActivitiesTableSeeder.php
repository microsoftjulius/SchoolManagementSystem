<?php

use Illuminate\Database\Seeder;

class CurricularActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cocuricular_activites')->insert(array(
            array(
                'activity'   => 'Soccer',
                'date'       => '2020-02-13 00:00:00',
                'created_by' => 1
        ),
            array(
                'activity'   => 'Music Dance And Dramma',
                'date'       => '2020-02-20 00:00:00',
                'created_by' => 1 
            ),
            array(
                'activity'   => 'Swimming',
                'date'       => '2020-02-27 00:00:00',
                'created_by' => 1
            )
        ));
    }
}
