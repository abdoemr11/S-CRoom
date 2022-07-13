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

        $msg_obj = Message_Handler::decode_msg($msg);
        var_dump($msg_obj);
        //TODO verify the message it has correct format
        //Messages from student
        if ($msg_obj['action'] == 'connect')
            $this->connect($from, $msg_obj);
        else if ($msg_obj['action'] == 'open_cam_for_admin') {
            $this->order_student($msg_obj['device_id'], $msg_obj['action'], $msg_obj['execute'], $msg_obj['from']);
        } else if ($msg_obj['action'] == 'open_cam_for_prof') {
            $this->order_student($msg_obj['device_id'], $msg_obj['action'], $msg_obj['execute'], $msg_obj['from']);
        } else if ($msg_obj['action'] == 'exam') {
            echo 'send exams to students';
            $this->order_student($msg_obj['to'], $msg_obj['action'],
                array('exam_contents' => $msg_obj['exam_contents']));
        } else if ($msg_obj['action'] == 'done') {
            //
        }
        else if ($msg_obj['action'] == 'done') {
            $this->order_admin($msg_obj[]);
        }
//        array(6) {
//        ["action"]=>
//  string(4) "Done"
//        ["to"]=>
//  string(12) "adminstrator"
//        ["from"]=>
//  string(7) "student"
//        ["student_name"]=>
//  string(6) "hossam"
//        ["device_id"]=>
//  string(1) "1"
//        ["execute"]=>
//  string(4) "none"
//    }
//        array(6) {
//        ["action"]=>
//  string(4) "Done"
//        ["to"]=>
//  string(10) "proffessor"
//        ["from"]=>
//  string(7) "student"
//        ["student_name"]=>
//  string(6) "hossam"
//        ["device_id"]=>
//  string(1) "1"
//        ["execute"]=>
//  string(4) "none"
//}


    }

    private function connect(ConnectionInterface $from, $msg_obj)
    {
        if($msg_obj["from"] == 'student')
        {
            //create new student
            $this->students[] = new Student($from, $msg_obj['device_id']);
        }
    }

    private function order_student(mixed $device_id, mixed $action, array $options, $origin)
    {
        if($device_id == '00000')
        {
            //send to all students
            foreach ($this->students as $std)
            {
                $std->send_to_student_device($action, $options, $origin);
            }
            return;
        }
       foreach ($this->students as $std)
       {
           echo $std->device_id . "  " . $device_id;
           if($std->device_id == $device_id)
           {
               echo 'sendin' . '\n';
               $std->send_to_student_device($action, $options, $origin);

           }
       }
    }

}