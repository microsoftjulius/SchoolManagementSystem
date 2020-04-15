<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert(array(
            array(
                'message'=>'Hey, we have a general meeting on 2nd may',
                'date_of_sending'=>'2020-02-20 12:00:00',
                'recievers_group'=>1,
                'senders_id'=>1,
                'status' => 'pending'
        ),
            array(
                'message'=>'This is to remind you that the visitation day is on sunday',
                'date_of_sending'=>'2020-02-20 12:00:00',
                'recievers_group'=>2,
                'senders_id'=>1,
                'status' => 'pending'       
            ),
            array(
                'message'=>'Hey, we have a class teachers meeting on 1st may',
                'date_of_sending'=>'2020-02-20 12:00:00',
                'recievers_group'=>1,
                'senders_id'=>1,
                'status' => 'pending'
            )
        ));
    }
}
