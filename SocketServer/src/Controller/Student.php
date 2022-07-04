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
    public string $device_id;
    private string $student_name='hossam';
    public function __construct(private ConnectionInterface $connection, string $id)
    {
        $this->device_id = $id;
        $this->connection->send(Message_Handler::encode_msg(
            array('type' => 'msg',
                'from' => 'server',
                'to' => $this->device_id,
                'msg' => 'hello student'
                )));
    }
    public function send_to_student_device(string $action, array $options, string $origin): void
    {
        $encoded_msg = Message_Handler::encode_msg(
            array('action' => $action,
                'from'      => $origin, //admon| prof
                'to'        => 'student', //student|prof
                'device_id' => $this->device_id, //device id of rasperry pi
                'student_name'=> $this->student_name,
                'execute'=> $options
//                   ...
                //optional there might be data
            ));
        echo 'from send_to_student_device' . $encoded_msg;
//        echo $this->connection;
        echo $this->connection->resourceId;
        $this->connection->send($encoded_msg);
    }

}