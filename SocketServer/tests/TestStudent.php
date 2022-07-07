<?php
use PHPUnit\Framework\TestCase;
use MyApp\Utilities\Message_Handler;
use MyApp\Utilities\Socket;
class TestServer extends TestCase
{

    public function testConnect                     ()
    {
    //        $this->markTestSkipped("waiting to sign new student first");

    $arr = array(
    'action' => 'connect',
    'from' => 'student', //|prof|admin
    'device_id' => '12345');

    $socket = new Socket($this->address, $this->service_port);
    $socket->connect();
    //        sleep(5);
    $socket->send(Message_Handler::encode_msg($arr));
    //        sleep(5);
    $out = $socket->recv();
    echo "\n".$out. "\n";
    echo "Closing socket...";
    sleep(20);
    $this->assertEquals('you have been  in', Message_Handler::decode_msg($out)['data']);

    }
    public function testResponseStartExam           ()
    {

        if (studend id == "not_exist " )
            $arr = array
            ([
                    "action" => " failed",
                    " to " => "proffessor ",
                    " from" => " student ",
                    " student_name" => msg [" student_name "],
                    "device_id" => "device_ID",
                    " student_id" => "studend_id",
                    " device_id " => "device_ID",
                    " execute" =>
                        [
                            " student_id" => "studend_id",
                            " device_id " => "device_ID",
                            " student_name" => msg [" student_name "],
                            " cause" => "not in data base "
                        ]
                ]);

            $arr = array
            ([
                    " action" => " done ",
                    " to" => " proffessor ",
                    " from" => " student ",
                    "student_name" => msg [" student_name"],
                    " device_id" => "device_ID",
                    " execute" =>
                        [
                            "studentid" => "student_id",
                            "device_id" => "device_ID",
                            "student_name" => "results [0]",
                            "correct " => "results [1]",
                            "wrong " => "results [2]",
                            " grade" => "results [3]",
                            " array" => "results [4]"
                        ]
                ]);

        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
        //sleep(5);
        $socket->send(Message_Handler::encode_msg($arr));
    }
    public function testResponseVote                ()
    {
        $arr = array
        ([
                "action"       => "failed"              ,
                "to"           => "proffessor"          ,
                "from"         => "student"             ,
                "student_name"  => msg["student_name"]   ,
                "device_id"     => "device_ID"           ,
                "execute"      =>
                    [
                        "student_id"       => "studendid"        ,
                        "device_id"        => "device_ID"        ,
                        "student_name"     => msg["student_name"] ,
                        "cause"           => "not in data base"

                    ]
        ]);
        


        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
        //sleep(5);
        $socket->send(Message_Handler::encode_msg($arr));

    }
    public function testResponseOpenCamForProfessor ()
    {
        $arr = array
        (
            "action" => "failed",
            "to" => "proffessor",
            "from" => "student",
            "student_name" => msg["student_name"],
            "device_id" => "device_ID",
            "execute" =>
                [
                    "student_id" => "studend_id",
                    "device_id" => "device_ID",
                    "studentname" => msg["student_name"],
                    "cause" => "not in data base"
                ]
        );

        if ("get_stud_name" == msg["student name"]) {
            $arr = array
            (
                "action" => "done",
                "to" => "proffessor",
                "from" => "student",
                "student_name" => "get_stud_name",
                "device_id" => "device_ID",
                "execute" =>
                    [
                        "student_id" => "studend_id",
                        "device_id" => "device_ID",
                        "student_name" => "getstud_name"
                    ]
            );


            $arr = array
            (
                "action" => "failed",
                "to" => "proffessor",
                "from" => "student",
                "studentname" => "getstudname",
                "deviceid" => "device_ID",
                "execute" =>
                    [
                        "studentid" => "studendid",
                        "deviceid" => "device_ID",
                        "studentname" => "getstud name",
                        "cause" => "another student"
                    ]
            );
        }


        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
//        sleep(5);
        $socket->send(Message_Handler::encode_msg($arr));
        echo "Closing socket...";
        //return done and student id from student device
        //send this student id to the client who requested it

        //receive ok statement

    }
    public function testResponseOpenCamForAdmin     (){
//                $this->markTestSkipped("waiting to sign new student first");

        $arr = array
        (
                "action"        => "done"                        ,
                "to"            => "adminstrator"                ,
                "from"          => "student"                     ,
                "studen_tname"  => msg["execute"]["student_[name"] ,
                "device_id"     => "device_ID"                   ,
                "execute"       =>
        [       "student_id"    => msg["execute"]["student_ID"]   ,
                "device_id"     => "device_ID"                   ,
                "student_name"  => msg["execute"]["student_name"]
        ]
        );

        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
        //sleep(5);
        $socket->send(Message_Handler::encode_msg($arr));
        echo "Closing socket...";
//        var_dump( Message_Handler::decode_msg($socket->recv()));
        //return done and student id from student device
        //send this student id to the client who requested it

        //receive ok statement

    }
    public function testResponseTrain               ()
    {


        $arr = array
        ([
            " action"     => " done"           ,
            " to "        => " adminstrator "  ,
            " from"       => " none "          ,
            "student_name" => " none"          ,
            " device_id"  => " none"           ,
            " execute"    => " none"
        ]);
        $socket = new Socket($this->"address", $this=>"service_port");
        $socket->connect();
        $socket->send(Message_Handler::encode_msg($arr));


    }



    }
}