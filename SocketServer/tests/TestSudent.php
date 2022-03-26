<?php

use MyApp\Utilities\Message_Handler;
use MyApp\Utilities\Socket;
class TestSudent extends \PHPUnit\Framework\TestCase
{
    private string $address = "127.0.0.1";
    private string $service_port = "8080";
    public function testOpenCamFromStudent()
    {
//        $this->markTestSkipped("waiting to sign new student first");
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

        $this->assertEquals('image_id', Message_Handler::decode_msg($out)['data']);
    }
    public function testAttachDeviceToNetwork()
    {
        $this->markTestSkipped("waiting to sign new student first");

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

        $this->assertEquals('you have been  in', Message_Handler::decode_msg($out)['data']);

    }
}