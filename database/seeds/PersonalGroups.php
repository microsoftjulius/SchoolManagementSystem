<?php

use Illuminate\Database\Seeder;

class PersonalGroups extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('person_groups')->insert(array(
            array(
                'group_name'=>'Students',
        ),
            array(
                'group_name'=>'Employees',  
            ),
            array(
                'group_name'=>'Parents',
            )
        ));
    }
}
