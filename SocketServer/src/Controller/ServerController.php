<?php

namespace MyApp\Controller;
use MyApp\Utilities\CommandHelper;
use MyApp\Utilities\Message_Handler;
use \Ratchet\ConnectionInterface;
class ServerController
{
    private array $students = array();
    private array $professors = array();
    private bool $isEncrypted = false;
    public function __construct()
    {
    }

    public function handleMsg(ConnectionInterface $origin_connection, $msg)
    {
        var_dump($msg);
        echo "\nreciveing message \n";
        $msg_obj = json_decode($msg, true);
        var_dump($msg_obj);
        //TODO validate the message more correctly
        //TODO handle exception
        if ($this->isEncrypted)
        {
            //check if it has previous connection
            $person = $this->getPersonByConnection(array_merge($this->professors, $this->students), $origin_connection);
            if(!is_object($person))
            {
                $plain_repsonse = (Professor::DENIED_ACCESS);
                $response = ['action'=> $plain_repsonse[0], 'from'=>$plain_repsonse[1],'to'=>'unknown',
                    'execute' => $plain_repsonse[3]
                ];
                $origin_connection->send(Message_Handler::encode_msg($response));
                return;

            }
            //check if it is professor

            return;
        }
        if (!$msg_obj)
        {
            echo "invaild message";//should through error
            $response = ['response', 'server', 'unknown', '00000', ['status'=>'BAD_REQUEST']];
            $this->sendToConnection($origin_connection,...$response);
            return;
        }
        if ($msg_obj['action'] == 'connect')
        {

            $this->connect($origin_connection, $msg_obj);

        }
        //if the message is not plain object, it will be encrypted
        if($msg_obj['action'] != 'connect' && $msg_obj['from'] == 'professor')
        {
            $action_array = $msg_obj;

            $person_type = $action_array['from'];
            $person = $this->getPersonByToken($this->professors, $msg_obj['execute']['token']);
//            echo $professor . "professor is\n";
            if(!is_object($person))
            {
                $plain_repsonse = (Professor::DENIED_ACCESS);
                $response = ['action'=> $plain_repsonse[0], 'from'=>$plain_repsonse[1],'to'=>$person_type,
                'execute' => $plain_repsonse[3]
                ];
                $origin_connection->send(Message_Handler::encode_msg($response));
                return;

            }
            echo "person has valid connection\n";
            if($person instanceof Professor)
            {
//                $action_array = Message_Handler::decrypt_msg($msg, $professor->getToken());
                $this->handle_professor_command($person, $action_array);
            } elseif ($person instanceof Student)
            {
                $this->handle_student_command($person, $action_array);
            }


        }
        if ($msg_obj['from'] == 'student' && $msg_obj['action'] != 'connect')
        {
            $professor = Person::getPersonById($this->professors, $msg_obj['execute']['professor_id']);
            if(!is_object($professor))
            {
                $origin_connection->send(CommandHelper::response('FAILED', $msg_obj['action'],
                    'bad professor id', []));
                return;
            }
            echo " find student professor\n";
            $student = Person::getPersonById($professor->getStudents(), $msg_obj['execute']['student_id']);
            if (!is_object($student))
            {
                $origin_connection->send(CommandHelper::response('FAILED', $msg_obj['action'],
                    "student doesn't exist", []));
                return;
            }
            echo " find student\n";

            $this->handle_student_command($student, $professor, $msg_obj);
        }
//        if($msg_obj['to'] == 'student')
//            $this->order_student($msg_obj['device_id'], $msg_obj['action'], $msg_obj['execute'], $msg_obj['from']);


    }
/*
 * connect:
 * we need to check duplicate first
 */
    private function connect(ConnectionInterface $from, $msg_obj)
    {

        if($msg_obj["from"] == 'student')
        {
            //TODO how the server know that certain javascript connection know about certain rasperry pi
            $professor  = Professor::getPersonById($this->professors,$msg_obj['execute']['professor_id']);
            if(!is_object($professor))
            {
                $plain_repsonse = CommandHelper::response('FAILED', "connectStudent",
                "No professor is found with this id", []);
                $this->sendToConnection($from, $plain_repsonse);
                return;

            }

            $professor->addStudent($from,$msg_obj['execute']['device_id'], $msg_obj['execute']['student_id'],$msg_obj['execute']['name']);
        }
        if ($msg_obj['from'] == 'professor')
        {
            $professor  = $this->getPersonByToken($this->professors,$msg_obj['execute']['token']);
            if(is_object($professor))
            {

                $plain_repsonse = CommandHelper::response('FAILED', 'connectProfessor', " h"
                ,["id" => $professor->getId()]);

                $this->sendToConnection($from, $plain_repsonse);
                return;

            }
            $randomId = "123456";
            $this->professors[] = new Professor($from, $msg_obj['execute']['token'], $randomId, $msg_obj['execute']['name']);
            //TODO throw error
        }
    }
    private function handle_professor_command($professor, $prof_command): void
    {
        var_dump($prof_command);
        $students = $professor->getStudents();
        switch ($prof_command['action'])
        {
            case 'getStudents':
                $student_names = array();
                echo "number of unverified stduents". count($students) . "\n";
                foreach ($students as $student)
                {
                    echo $student->getName() . "\n";
                    $student_names[] = $student->getName();

                }
                echo $professor->getToken(). "\n";
                $professor->send_to('response', 'server', ['studentNames' => $student_names]);

                break;
            case 'verifyStudents':
                foreach ($students as $student)
                {
                    $student->send_to('open_cam_for_prof', 'professor', ["name"=> $student->getName()]);
                }
                break;
            case 'vote':
                foreach ($students as $student)
                {
                    $student->send_to('vote', 'professor', ["name"=> $student->getName()]);
                }
                break;
            case 'resultVote':
                $resultAr= array();
                foreach ($students as $student)
                {
                    echo "vote value ". $student->getVote() . "\n";
                    $resultAr[] = $student->getVote();
                }
                print_r(array_count_values($resultAr));
                $executeAr = [
                    "status" => "OK",
                    "type"=> "resultVote",
                    "msg"=> "Sucessfully Vote",
                    "asnwer"=> array_count_values($resultAr)
                ];
                $professor->send_to('response', 'server', $executeAr);
                break;
            case 'mute_all':
                foreach ($students as $student)
                {
                    $student->send_to('mute_all', 'professor', []);

                }
                break;
            case 'startExam':
                if(!$this->orderStudents('startExam', 'professor', $prof_command['execute'], $prof_command['device_id']))
                    $professor->send_to(...Professor::BAD_REQUEST);
                break;
            case 'sendFile':
                if(!$this->orderStudents('sendFile', 'professor', $prof_command['execute'], $prof_command['device_id']))
                    $professor->send_to(...Professor::BAD_REQUEST);
                break;
            case 'response':
//                $professor->send_to('response', 'server', $prof_command['execute']);
                break;
            default:
                echo 'invalid action\n';
                $professor->send_to('response', 'server', ['status'=>'BAD_REQUEST']);

        }
    }
    private function handle_student_command(Student $student, Professor $professor,array $student_command)
    {
        switch ($student_command['action'])
        {
            case 'vote':
                echo $student->getName()." voting ". $student_command['execute']['choice'] . "\n";
                $student->setVote($student_command['execute']['choice']);
                break;

            case 'response':
                $this->handle_student_response($student, $professor, $student_command);
                break;
            default:
                echo 'bad request for student'. "\n";
                $student->send_to('response', 'server', ['status'=>'FAILED']);
        }
    }
    private function orderStudents($students, $action, $origin,  $id): bool
    {
        if($id == '00000')
        {
            echo "sending to all student\n";
            foreach ( $this->students as $student)
            {
                $student->send_to($action, $origin, array("name"=> $student->getName()));
            }
            return true;

        }
        $student = $this->getPersonById($students, $id);
        if (!is_object($student))
        {
            return false;
        }
        $student->send_to($action, $origin, $execute);
        return true;
    }

    private function getPersonByConnection(array $persons, ConnectionInterface $origin_connection)
    {
        foreach ($persons as  $person)
        {
            if($origin_connection == $person->getConnectionInterface())
            {
                return $person;
            }
        }
        return false;
    }
    private function getPersonByToken(array $persons, string $token)
    {
        foreach ($persons as  $person)
        {
            if($token == $person->getToken())
            {
                return $person;
            }
        }
        return false;
    }

    private function isDuplicate($persons, $origin_connection, $id): bool
    {
        foreach ($persons as  $person)
        {
            if($origin_connection == $person->getConnectionInterface() || $id == $person->getId())
            {
                $person->setConnection($origin_connection);
                return true;
            }
        }
        return false;
    }

    /**
     * @param ConnectionInterface $from
     * @return void
     */
    private function sendToConnection(ConnectionInterface $from, string $response): void
    {
//        $response = ['action' => $action, 'to' => $destination, 'from' => $origin, 'device_id' => $device_id,
//            'execute' => $execute
//        ];
//        $from->send(Message_Handler::encode_msg($response));
        $from->send($response);
    }

    private function handle_student_response(Student $student, Professor $professor, array $student_command)
    {
        switch ($student_command['execute']['type'])
        {
            case 'verify':
                $professor->send_to('response', 'student', $student_command);

                break;
            case 'mute_all':
                $professor->send_to('response', 'student', $student_command);

                break;
            case 'vote':

                break;
        }
    }


}