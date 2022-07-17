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
            $professor = $this->getProfessorByConnection($origin_connection);
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
            echo "professor has valid connection\n";
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
            $this->students[] = new Student($from,"",$msg_obj['device_id'], $msg_obj['execute']['name']);
        }
        if ($msg_obj['from'] == 'professor')
        {
            $this->professors[] = new Professor($from, $msg_obj['execute']['token'], $msg_obj['device_id'], $msg_obj['execute']['name']);
            //TODO throw error
        }
    }
    private function handle_professor_command($professor, $prof_command): void
    {
        var_dump($prof_command);
        switch ($prof_command['action'])
        {
            case 'getStudents':
                $student_names = array();
                echo "number of unverified stduents". count($this->students) . "\n";
                foreach ($this->students as $student)
                {
                    echo $student->get_name() . "\n";
                    $student_names[] = $student->get_name();

                }
                $professor->send_to('responseStudents', 'server', ['studentNames' => $student_names]);

                break;
            case 'verifyStudents':
                if(!$this->orderStudents('open cam for prof', 'professor', array(), $prof_command['device_id']))
                    $professor->send_to(...Professor::BAD_REQUEST);
                break;
            case 'startExam':
                if(!$this->orderStudents('startExam', 'professor', $prof_command['execute'], $prof_command['device_id']))
                    $professor->send_to(...Professor::BAD_REQUEST);
                break;
            case 'sendFile':
                if(!$this->orderStudents('sendFile', 'professor', $prof_command['execute'], $prof_command['device_id']))
                    $professor->send_to(...Professor::BAD_REQUEST);
                break;
            default:
                echo 'invalid action\n';
                $professor->send_to(...Professor::BAD_REQUEST);

        }
    }
    private function orderStudents($action, $origin, $execute, $id): bool
    {
        if($id == '00000')
        {
            echo "sending to all student\n";
            foreach ( $this->students as $student)
            {
                $student->send_to($action, $origin, $execute);
            }
            return true;

        }
        $student = $this->getPersonByDeviceId($this->students, $id);
        if (!is_object($student))
        {
            return false;
        }
        $student->send_to($action, $origin, $execute);
        return true;
    }

    private function getProfessorByConnection(ConnectionInterface $origin_connection)
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
    private function getPersonByDeviceId($persons, $id)
    {
        foreach ($persons as $person)
        {
            if($person->getDeviceId == $id)
                return $person;
        }
        return false;
    }


}