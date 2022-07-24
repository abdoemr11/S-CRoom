<?php

namespace MyApp\Controller;

use MyApp\Utilities\Message_Handler;
use Ratchet\ConnectionInterface;

class Person
{
    protected $destination;
    protected $token;
    protected $name = "abdo";
    protected $id;
    public function __construct(private ConnectionInterface $connection, string $token, $id, $name, $dest)
    {
        $execute = [
            'status' => "OK",
            'type' => 'connectProfessor',
            'id' => $id
        ];
        $this->id = $id;
        $this->destination = 'professor';
        $this->token = $token;
        $this->name = $name;
        $this->send_to('response', 'server', $execute);
    }
    public function send_to(string $action,  string $origin,  array $execute): void
    {
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
        echo $this->connection->resourceId;
        $this->connection->send($ecnrypted_msg);
    }
    public function getConnectionInterface(): ConnectionInterface
    {
        return $this->connection;
    }
    public function getToken()
    {
        return $this->token;
    }
    public function getName ()
    {
        return $this->name;
    }
    public function getId ()
    {
        return $this->id;
    }
    public function setConnection($newConnection)
    {
        $this->connection =$newConnection;
    }
    public static function getPersonById($persons, $id)
    {
        foreach ($persons as $person)
        {
            if($person->getId() == $id)
                return $person;
        }
        return false;
    }
}