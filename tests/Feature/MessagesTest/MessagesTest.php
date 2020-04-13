<?php

namespace Tests\Feature\MessagesTest;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\MessagesPackage\MessagesModel as Messages;
use Tests\TestCase;

class MessagesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createMessage(){
        $this->withoutExceptionHandling();
        $response = $this->post('/send-messages',[
            'message'           => 'I am sending a testing message',
            'date_of_sending'   => '2020-02-03 02:20:00',
            'recievers_group'   => 'parents', //this is either parents or teachers
            'senders_id'        => 1,
        ]);
        $this->assertDatabaseHas('messages',['message'=>'I am sending a testing message']);
    }

    /** @test */
    public function editScheduledMessage(){
        $this->createMessage();
        $message = Messages::first();
        $response = $this->patch('/edit-scheduled-message/'.$message->id,[
            'message'           => 'I am sending a testing message on some day',
            'date_of_sending'   => '2020-02-03 02:20:00',
            'recievers_group'   => 1, //this is either parents or teachers
            'senders_id'   => 1
        ]);
        $this->assertEquals('I am sending a testing message on some day',Messages::first()->message);
    }

    /** @test */
    public function deleteMessage(){
        $this->createMessage();
        $message = Messages::first();
        $response = $this->patch('/delete-message/'.$message->id,[
            'status' => 'deleted'
        ]);
        $this->assertEquals('deleted',Messages::first()->status);
    }

    /** @test */
    public function getAllMessages(){
        $this->createMessage();
        $response = $this->get('/get-all-messages');
        $response->assertOk();
    }
}
