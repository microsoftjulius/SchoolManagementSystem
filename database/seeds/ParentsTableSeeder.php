<?php

use Illuminate\Database\Seeder;

class ParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parents')->insert(array(
            array(
                'user_id'=>1,
                'created_by'=>1,
                'pfirst_name'=>'Jane',
                'plast_name'=>'Nabuyondo',
                'date_of_birth' => '1973-10-09 12:00:00',
                'RelationShip'  => 'Mother',
                'image_path'    => 'jane.png',
                'District'      => 'Kampala',
                'Village'       => 'Makindye',
                'NIN'           => 'CMOOP92POLS',
                'Telephone'     => '256753630441'
        ),
            array(
                'user_id'=>1,
                'created_by'=>1,
                'pfirst_name'=>'Charles',
                'plast_name'=>'Mayanja',
                'date_of_birth' => '1964-10-09 12:00:00',
                'RelationShip'  => 'Father',
                'image_path'    => 'charles.png',
                'District'      => 'Kampala',
                'Village'       => 'Masaka',
                'NIN'           => 'CMOOPL92POLS',
                'Telephone'     => '256777630441'   
            ),
            array(
                'user_id'=>1,
                'created_by'=>1,
                'pfirst_name'=>'Ruth',
                'plast_name'=>'Namakula',
                'date_of_birth' => '1991-10-09 12:00:00',
                'RelationShip'  => 'Mother',
                'image_path'    => 'ruth.png',
                'District'      => 'Kampala',
                'Village'       => 'Bweyogerere',
                'NIN'           => 'CMOP92POLS',
                'Telephone'     => '256788922290'
            )
        ));
    }
}
