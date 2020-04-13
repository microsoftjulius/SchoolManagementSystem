<?php

namespace App\Http\Controllers\MessagesPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\MessagesPackage\MessagesModel as Message;
use App\Http\Resources\MessagesPackage\MessagesResource;

class MessagesController extends Controller
{
    public function __construct(){
        $this->send_message = new SendingMessage();
    }

    protected function createMessage(){
        $date_of_sending = request()->date_of_sending;

        if(empty($date_of_sending)){ $date_of_sending = Carbon::now(); }

        $message = new Message();
        $message->message           = request()->message;
        $message->date_of_sending   = $date_of_sending;
        $message->recievers_group   = request()->recievers_group;
        $message->senders_id        = request()->senders_id;
        $message->save();
        return $this->send_message->sendMessage();
    }

    protected function editScheduledMessage(Message $message, $id){
        $message->find($id)->update(array(
            'message'           => 'I am sending a testing message on some day',
            'date_of_sending'   => '2020-02-03 02:20:00',
            'recievers_group'   => 1, //this is either parents or teachers
            'senders_message'   => 1
        ));
    }

    protected function deleteMessage(Message $message, $id){
        $message->find($id)->update(array('status' => 'deleted'));
    }

    protected function getAllMessages(){
        return MessagesResource::collection(Message::join('employees','employees.id','messages.recievers_group')->get());
    }

    protected function validateMessage(){
        if(empty(request()->message)){
            return redirect()->back()->withErrors("Please add a message to continue");
        }
        if(empty(request()->recievers_group)){
            return redirect()->back()->withErrors("Please select a group to which you want to send the message to");
        }else{
            return $this->createMessage();
        }
    }

}
