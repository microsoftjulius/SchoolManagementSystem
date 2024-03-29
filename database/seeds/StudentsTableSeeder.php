<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert(array(
            array(
                'user_id'=>1,
                'created_by'=>1,
                'sfirst_name'=>'Julius',
                'slast_name'=>'Ssemakula',
                'date_of_birth' => '1994-10-09 12:00:00',
                'former_school' => 'Stephen Jota Childrens Center',
                'image_path'    => 'julius.png',
                'guardian_id'   => 1,
                'status'        => 'active'
        ),
            array(
                'user_id'=>1,
                'created_by'=>1,
                'sfirst_name'=>'Alex',
                'slast_name'=>'Mujjuni',
                'date_of_birth' => '1994-03-09 04:00:00',
                'former_school' => 'Stephen Jota Childrens Center',
                'image_path'    => 'alex.png',
                'guardian_id'   => 1,
                'status'        => 'active'      
            ),
            array(
                'user_id'=>1,
                'created_by'=>1,
                'sfirst_name'=>'Samuel',
                'slast_name'=>'Mukiibi',
                'date_of_birth' => '1994-07-09 12:00:00',
                'former_school' => 'Stephen Jota Childrens Center',
                'image_path'    => 'sam.png',
                'guardian_id'   => 1,
                'status'        => 'active' 
            )
        ));
    }
}
