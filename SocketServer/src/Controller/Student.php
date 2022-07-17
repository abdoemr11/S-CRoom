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
    public function __construct(private ConnectionInterface $connection, string $token = "", $id, $name)
    {
        parent::__construct($connection, $token, $id, $name);
    }


}