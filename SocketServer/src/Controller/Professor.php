<?php

namespace MyApp\Controller;



use MyApp\Utilities\Message_Handler;
use Ratchet\ConnectionInterface;

class Professor
{
    protected $destination;
    protected $device_id;
    protected $token;
    /**
     * @param ConnectionInterface $from
     * @param mixed $device_id
     */
    public function __construct(private ConnectionInterface $connection, string $token, $id)
    {
//        $this->connection->send(Message_Handler::encode_msg(
//            array('action' => 'response',
//                'from' => 'server',
//                'to' => 'professor',
//                'execute' => [
//                    'status' => "OK",
//                    'token' => $this->token,
//
//    ]
//            )));
        $execute = [
            'status' => "OK",
            'token' => $this->token,
        ];
        $this->device_id = $id;
        $this->destination = 'professor';
        $this->token = $token;
        $this->send_to('response', 'server', $execute);
    }
    public function send_to(string $action,  string $origin,  array $execute): void
    {
        $ecnrypted_msg = Message_Handler::encrypt_msg(
            array('action' => $action,
                'from'      => $origin, //admon| prof
                'to'        => $this->destination, //student|prof
                'device_id' => $this->device_id, //device id of rasperry pi
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
    public const  BAD_REQUEST =
        [
         'response',
        'server',
        [
            'status' => 'BAD_REQUEST'
        ]
        ];
    public const  DENIED_ACCESS =
        [
            'response',
            'server',
            [
                'status' => 'DENIED_ACCESS'
            ]
        ];

}