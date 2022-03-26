<?php

use PHPUnit\Framework\TestCase;

class TestServer extends TestCase
{
    public function testOpenCamFromAdmin()
    {
        //create json object
        $arr = array('from' => 'admin',
                    'to' => '12345',
                    'action' => 'open_cam');
        $json_string= json_encode($arr);
        $json_encoded = base64_encode($json_string);
        echo $json_encoded;
        $address = "127.0.0.1";
        $service_port = "8080";
        /* Create a TCP/IP socket. */
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
            echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
        } else {
            echo "OK.\n";
        }

        echo "Attempting to connect to '$address' on port '$service_port'...";
        $result = socket_connect($socket, $address, $service_port);
        if ($result === false) {
            echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
        } else {
            echo "OK.\n";
        }
        socket_write($socket, $json_encoded, strlen($json_encoded));
        echo "done writing";
//        while ($out = socket_read($socket, 2048)) {
//            echo "rec";
//            echo $out;
//        }
        sleep(10);
        $out = socket_read($socket, 2048);
        echo "\n".$out. "\n";
        echo "Closing socket...";
        socket_close($socket);
        $out = base64_decode($out);
        $json_out = json_decode($out);
        var_dump($json_out);
        $this->assertEquals('imagedata', $json_out->{'data'});
    }

}