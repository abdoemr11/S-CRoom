<?php

namespace MyApp\Controller;



use MyApp\Utilities\CommandHelper;
use MyApp\Utilities\Message_Handler;
use Psy\Command\Command;
use Ratchet\ConnectionInterface;

class Professor extends Person
{
    private array $students = array();
    public function __construct(private ConnectionInterface $connection, string $token, $id, $name)
    {
        parent::__construct($connection, $token, $id, $name);
    }
    public function addStudent($from, string $device_id, string $id, $name)
    {
        $student = Person::getPersonById($this->students, $id);
        if(is_object($student))
        {
            $from->send(CommandHelper::response('FAILED', 'ConnectStudent',
                'student already exist', []));
            return;
        }

        $this->students[] = new Student($from,"",$device_id, $id,$name);

    }
    public function getStudents()
    {
        return $this->students;
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