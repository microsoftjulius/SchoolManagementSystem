<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert(array(
            array(
                'user_id'=>1,
                'created_by'=>1,
                'first_name'=>'Alex',
                'last_name'=>'Mujjuni',
                'date_of_birth'  => '1994-03-10 12:00:00',
                'image_path' => 'alex.png',
                'role_id' => 1,
                'District' => 'Kampala',
                'Village'  => 'Makindye',
                'NIN'      => 'CMDT00ASSSL',
                'Telephone' => '256702913454',
                'level_of_education' => 'University',
                'certificates'       => 'degree.pdf',
                'status'             =>'active'
        ),
            array(
                'user_id'=>1,
                'created_by'=>1,
                'first_name'=>'Joseph',
                'last_name'=>'Katende',
                'date_of_birth'  => '1997-10-10 12:00:00',
                'image_path' => 'joseph.png',
                'role_id' => 1,
                'District' => 'Kampala',
                'Village'  => 'Makindye',
                'NIN'      => 'CMD0M0ASSSL',
                'Telephone' => '256702913454',
                'level_of_education' => 'University',
                'certificates'       => 'degree.pdf',
                'status'             =>'active' 
            ),
            array(
                'user_id'=>1,
                'created_by'=>1,
                'first_name'=>'Julius',
                'last_name'=>'Ssemakula',
                'date_of_birth'  => '1994-10-10 12:00:00',
                'image_path' => 'julius.png',
                'role_id' => 1,
                'District' => 'Kampala',
                'Village'  => 'Makindye',
                'NIN'      => 'CMD0P0ASSSL',
                'Telephone' => '256702913454',
                'level_of_education' => 'University',
                'certificates'       => 'degree.pdf',
                'status'             =>'active'
            )
        ));
    }
}