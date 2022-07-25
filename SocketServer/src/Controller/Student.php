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
public function getVote()
{
    return $this->vote_value;
}
}