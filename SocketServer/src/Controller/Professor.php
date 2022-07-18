<?php

namespace MyApp\Controller;



use MyApp\Utilities\Message_Handler;
use Ratchet\ConnectionInterface;

class Professor extends Person
{

    public function __construct(private ConnectionInterface $connection, string $token, $id, $name)
    {
        parent::__construct($connection, $token, $id, $name);
    }

    public const  BAD_REQUEST =
        [
         'response',
        'server',
            'professor',
        [
            'status' => 'BAD_REQUEST'
        ]
        ];
    public const  DENIED_ACCESS =
        [
            'response',
            'server',
            'professor',
            [
                'status' => 'DENIED_ACCESS'
            ]
        ];

}