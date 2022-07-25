<?php

namespace MyApp\Controller;



use MyApp\Utilities\Message_Handler;
use Ratchet\ConnectionInterface;

class Student extends Person
{

    /**
     * @param ConnectionInterface $from
     * @param mixed $device_id
     */
    private $device_id;
    private $vote_value;
    private ConnectionInterface $pythonConnection;

    public function __construct(private ConnectionInterface $connection, string $token = "", mixed $device_id, $id, $name)
    {
        $this->device_id = $device_id;
        parent::__construct($connection, $token, $id, $name, 'student');
    }

public function setVote($choice)
{
    $this->vote_value = $choice;
}
public function setPythonConnection($conn) {
        $this->pythonConnection = $conn;
}
public function sendToPython(string $action,  string $origin,  array $execute)
{
    echo "sending to python device\n";
    $ecnrypted_msg = Message_Handler::encrypt_msg(
        array('action' => $action,
            'from'      => $origin, //admon| prof
            'to'        => $this->destination, //student|prof
            'execute'=> $execute
//                   ...
            //optional there might be data
        ), $this->token);
    echo 'from send to professor' . $ecnrypted_msg;
//        echo $this->connection;
    echo $this->pythonConnection->resourceId;
    $this->pythonConnection->send($ecnrypted_msg);
}
public function getVote()
{
    return $this->vote_value;
}
}