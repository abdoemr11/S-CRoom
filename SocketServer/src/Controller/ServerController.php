<?php

namespace MyApp\Controller;
use MyApp\Utilities\Message_Handler;
use \Ratchet\ConnectionInterface;
class ServerController
{
    private array $students;

    public function __construct()
    {
    }

    public function handleMsg(ConnectionInterface $from,  $msg)
    {
        echo $msg;
        $msg_obj  = Message_Handler::decode_msg($msg);
        var_dump($msg_obj);
        //TODO verify the message it has correct format
        if($msg_obj['action'] == 'connect')
            $this->connect($from, $msg_obj);
        if($msg_obj['action'] == 'open_cam')
            $this->order_student($msg_obj['to'], $msg_obj['action']);
    }

    private function connect(ConnectionInterface $from, $msg_obj)
    {
        if($msg_obj["from"] == 'student')
        {
            //create new student
            $this->students[] = new Student($from, $msg_obj['device_id']);
        }
    }

    private function order_student(mixed $device_id, mixed $action)
    {
       foreach ($this->students as $std)
       {
           if($std->device_id == $device_id)
               $std->send($action);
       }
    }
}