<?php

use MyApp\Utilities\Message_Handler;
use MyApp\Utilities\Socket;
class TestSudent extends \PHPUnit\Framework\TestCase
{
    private string $address = "127.0.0.1";
    private string $service_port = "8080";
    private function connect_student()
    {
        //        $this->markTestSkipped("waiting to sign new student first");

        $arr = array(
            'action' => 'connect',
            'from' => 'student', //|prof|admin
            'device_id' => '12345');

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
    public function testOpenCamFromStudent()
    {
        $this->markTestSkipped("waiting to sign new student first");
        $arr = array('from' => 'admin',
            'to' => '152',
            'action' => 'open_cam',
            );
        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
//        sleep(5);
        $socket->send(Message_Handler::encode_msg($arr));
//        sleep(5);
        $out = $socket->recv();
        echo "\n".$out. "\n";
        echo "Closing socket...";

//        $this->assertEquals('image_id', Message_Handler::decode_msg($out)['data']);
    }
    public function testAttachDeviceToNetwork()
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
    public function testOpenCamForRegisteration() {
//                $this->markTestSkipped("waiting to sign new student first");

        $arr = array(
            'action' => 'open_cam_for_admin',
            'from' => 'adminstrator', //|prof|admin
            'to' => 'student',
            'device_id' => '1',
            'pic_nums' => 10,
            'execute' => ['student_name' => 'abdo', 'n.o pictures' => 10]
            );

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
    public function testOpenCamForRecognition()
    {
        $arr = array(
            'action' => 'open_cam_for_prof',
            'from' => 'proffessor', //|prof|admin
            'to' => 'student',
            'device_id' => '1',
            'student_name' => 'hossam',
            'execute' => ['']
        );

        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
//        sleep(5);
        $socket->send(Message_Handler::encode_msg($arr));
        echo "Closing socket...";
        //return done and student id from student device
        //send this student id to the client who requested it

        //receive ok statement

    }
    public function testExam() {
        $arr = array(
            'action' => 'exam',
            'from' => 'professor', //|prof|admin
            'device_id' => '12345',
            'to' => '00000',
            'exam_contents' => 'test exam'
        );
        echo "hi";
        $socket = new Socket($this->address, $this->service_port);
        $socket->connect();
        $socket->send(Message_Handler::encode_msg($arr));

        $out = $socket->recv();
    }
}