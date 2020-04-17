<?php

namespace App\Http\Controllers\MessagesPackage;

use App\UsersPackage\Employeesmodel as Employee;
use App\UsersPackage\Parentsmodel as Parents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendingMessage extends Controller
{
    
    public function sendMessage(){
        $msgData_array = [];
        if(request()->recievers_group == 3){
            $get_contacts = Parents::all();
            foreach($get_contacts as $contact){
                if(in_array(array('number' => $contact, 'message' => request()->message, 'senderid' => 'Good'), $msgData_array)){
                    continue;
                }else{
                    array_push($msgData_array, array('number' => $contact, 'message' => request()->message, 'senderid' => 'Good'));
                }
            }
        }
        elseif(request()->recievers_group == 2){
            $get_contacts = Employee::all();
            foreach($get_contacts as $contact){
                if(in_array(array('number' => $contact, 'message' => request()->message, 'senderid' => 'Good'), $msgData_array)){
                    continue;
                }else{
                    array_push($msgData_array, array('number' => $contact, 'message' => request()->message, 'senderid' => 'Good'));
                }
            }
        }
        if($this->getTotalSmsLeft() < count($msgData_array)){
            return redirect()->back()->withErrors("You have insuffucient balance on your account to send this messages to the selected category,
                Once you have bought messages this message will be sent Automatically");
        }else{
            $data = array('method' => 'SendSms', 'userdata' => array('username' => 'microsoftjulius','password' => 123456),'msgdata' => $msgData_array);
            $json_builder = json_encode($data);
            $ch = curl_init('http://www.egosms.co/api/v1/json/');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_builder); 
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $ch_result = curl_exec($ch);
            curl_close($ch);
        }
        return redirect()->back()->withErrors("Message Sending Was Successful");
    }

    public function getMessagesAccountBalance(){
        if(!$sock = @fsockopen('www.google.com', 80))
        {
            return null;
        }
        else
        {
            $url = "http://www.egosms.co/api/v1/plain/?method=Balance&username=microsoft&password=123456";
            return file_get_contents($url);
        }
    }

    public function getTotalSmsLeft(){
        $number_of_sms = $this->getMessagesAccountBalance()/33.3;
        if(!$sock = @fsockopen('www.google.com', 80))
        {
            return null;
        }
        else
        {
            return floor($number_of_sms);
        }
    }
}
