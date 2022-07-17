<?php

namespace MyApp\Controller;
use MyApp\Utilities\Message_Handler;
use \Ratchet\ConnectionInterface;
class ServerController
{
    private array $students = array();
    private array $professors = array();
    public function __construct()
    {
    }

    public function handleMsg(ConnectionInterface $origin_connection, $msg)
    {
        echo "\nreciveing message \n";
        $msg_obj = json_decode($msg, true);
        //TODO validate the message more correctly
        //TODO handle exception
        if (!$msg_obj)
        {
            echo "invaild message";//should through error
            return;
        }


        if ($msg_obj['action'] == 'connect')
        {

            $this->connect($origin_connection, $msg_obj);

        }
        if($msg_obj['from'] == 'professor' && $msg_obj['action'] != 'connect')
        {
            echo "professor is sending an anction \n";
            $professor = $this->isProfConnectionExist($origin_connection);
//            echo $professor . "professor is\n";
            if(!is_object($professor))
            {
                echo "professor is not here\n";
                $plain_repsonse = (Professor::DENIED_ACCESS);
                $response = ['action'=> $plain_repsonse[0],'to'=>'professor', 'from'=>$plain_repsonse[1],
                'execute' => $plain_repsonse[2]
                ];
                $origin_connection->send(Message_Handler::encode_msg($response));
                return;

            }
            $action_array = Message_Handler::decrypt_msg($msg, $professor->getToken());
            $this->handle_professor_command($professor, $action_array);

        }
        if($msg_obj['to'] == 'student')
            $this->order_student($msg_obj['device_id'], $msg_obj['action'], $msg_obj['execute'], $msg_obj['from']);


    }

    private function connect(ConnectionInterface $from, $msg_obj)
    {
        if($msg_obj["from"] == 'student')
        {
            //create new student
            $this->students[] = new Professor($from, $msg_obj['device_id']);
        }
        if ($msg_obj['from'] == 'professor')
        {
            $this->professors[] = new Professor($from, $msg_obj['execute']['token'], $msg_obj['device_id']);
            //TODO throw error
        }
    }
    private function handle_professor_command($professor, $prof_command)
    {
        var_dump($prof_command);
        switch ($prof_command['action'])
        {
            case 'getStudents':

                break;
            default:
                echo 'invalid action\n';
                $professor->send_to(...Professor::BAD_REQUEST);

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

    private function isProfConnectionExist(ConnectionInterface $origin_connection)
    {
        foreach ($this->professors as  $professor)
        {
            if($origin_connection == $professor->getConnectionInterface())
            {
                return $professor;
            }
        }
        return false;
    }
}