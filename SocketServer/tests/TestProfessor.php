<?php

use MyApp\Utilities\Message_Handler;
use MyApp\Utilities\Socket;
class TestProfessor extends \PHPUnit\Framework\TestCase
{
    private string $address = "127.0.0.1";
    private string $service_port = "8080";
    private function connect_student()
    {
        //        $this->markTestSkipped("waiting to sign new student first");

        $arr = array(
            "action" => "connect",
            "from" => "student", //|prof|admin
            "device_id" => "12345");

        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
        sleep(5);
        echo "sending \n";
        $socket->send(Message_Handler::encode_msg($arr));
//        sleep(5);
        $out = $socket->recv();
        echo "\n".$out. "\n";
        echo "Closing socket...";


    }


    public function testStartExamForProfessor()
    {

        $arr = array
        ([
                "action"      => "startexam"  ,
                "to"          => "student"    ,
                "from"        => "proffessor" ,
                "studentname" => "Mohammed"   ,
                "device id"   => "devicelD"   ,
                "execute"     =>
[
 [ "question" =>  "hwat is your name?"       , "correctanswer"  => "Tantawy "     , "incorrectanswers"       =>    ["Hossam", "G "   ]],
 [ "question" =>  "How old are you?"         , "correctanswer"  => "22"           , "incorrectanswers"       =>    ["20", "21", "19" ]],
 [ "question" =>  "where are you from?"      , "correct answer" =>  "benha"       , "incorrectanswers"       =>    ["giza", "aswan"  ]],
 [ "question" =>  "what is your job?"        , "correctanswer"  => "still student", "incorrectanswers"       =>    ["engineer"       ]],
 [ "question" =>  "predicted graduated year?", "correctanswer"  => "2022"         , "incorrectanswers"       =>    ["2021", "21"     ]],
 [ "question" =>  "your best friend?"        , "correctanswer"  => "Tantawy"      , "incorrectanswers"       =>    ["sayed", "saber" ]]
]
        ]);
        echo "hi_start_exam";
        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
        $socket->send(Message_Handler::encode_msg($arr));

//        $out = $socket->recv();
    }
    public function voteForProfessor         ()
    {
        $arr = array
        (
        "action"      =>   "vote"           ,
        "to"          =>   "student"        ,
        "from"        =>   "proffessor"     ,
        "student name"=>  "Mohammed"        ,
        "device id"   =>   "device ID"      ,
        "execute"     =>
            [
              "question"    =>  "what is your best color" ,
              "first"       =>  "red"                     ,
              "second"      =>  "blue"                    ,
              "third"       =>  "black"                   ,
              "fourth"      =>  "white"
            ]
    );
        echo "hi";
        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
        $socket->send(Message_Handler::encode_msg($arr));

//        $out = $socket->recv();
    }
    public function testOpenCamForProfessor   ()
    {
        $arr = array
        (
            "action"      => "open cam for prof",
            "to"          => "student"          ,
            "from"        => "proffessor"       ,
            "student name"=> "hosam"            ,
            "device id"   => "device ID"        ,
            "execute"     => "none"
        );

        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
        //sleep(5);
        $socket->send(Message_Handler::encode_msg($arr));
        echo "Closing socket...";
        //return done and student id from student device
        //send this student id to the client who requested it

        //receive ok statement

    }
    public function testOpenCamForAdmin       (){
//                $this->markTestSkipped("waiting to sign new student first");

        $arr = array
        ([
                "action"       => "open cam for admin"         ,
                "to"           => "student"                    ,
                "from"         => "adminstrator"               ,
                "student name" =>"hosam"                       ,
                "device id"    =>"device ID"                   ,
                "execute"      =>
                    [
                        "student name" => "khaled" ,
                        "n.o pictures" => 20       ,
                        "student ID"   => 50
                    ]
        ]);


        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
//        sleep(5);
        $socket->send(Message_Handler::encode_msg($arr));
        echo "Closing socket...";
//        var_dump( Message_Handler::decode_msg($socket->recv()));
        //return done and student id from student device
        //send this student id to the client who requested it

        //receive ok statement

    }
    public function testTrainForProfessor     ()
    {
        $arr = array
        ([
                    "action"      => "train"       ,
                    "to"          => "none"        ,
                    "from"        => "adminstrator",
                    "student name"=> "none"        ,
                    "device id"   => "none"        ,
                    "execute"     => "none"
        ]);
        echo "hi_train_message";
        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
        $socket->send(Message_Handler::encode_msg($arr));

    }

}