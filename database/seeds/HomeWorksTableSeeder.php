<?php

use Illuminate\Database\Seeder;

class HomeWorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_works')->insert(array(
            array(
                'year'=>'2018',
                'class_id'=>2,
                'subject_id'=>1,
                'created_by'=>1,
                'paper_path' => 'science2019.pdf'
        ),
            array(
                'year'=>'2018',
                'class_id'=>2,
                'subject_id'=>1,
                'created_by'=>1,
                'paper_path' => 'math2019.pdf'        
            ),
            array(
                'year'=>'2018',
                'class_id'=>2,
                'subject_id'=>1,
                'created_by'=>1,
                'paper_path' => 'sst2019.pdf'  
            )
        ));
    }
}
