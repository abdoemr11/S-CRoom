<?php

namespace MyApp\Controller;



use MyApp\Utilities\Message_Handler;
use Ratchet\ConnectionInterface;

class Student
{

    /**
     * @param ConnectionInterface $from
     * @param mixed $device_id
     */
    public function __construct(private ConnectionInterface $connection, public $device_id)
    {
        $this->connection->send(Message_Handler::encode_msg(
            array('type' => 'msg',
                'from' => 'server',
                'to' => $this->device_id,
                'data' => 'abdo'
                )));
    }
    public function send_to_student_device(string $action, string $data)
    {
        $this->connection->send(Message_Handler::encode_msg(
            array('action' => $action,
                'from' => 'server',
                'to' => $this->device_id,
                //optional there might be data
            )));
    }

}