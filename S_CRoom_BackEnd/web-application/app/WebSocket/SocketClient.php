<?php

namespace App\WebSocket;

class SocketClient
{
    private $socket;
    public function __construct(private $address = '127.0.0.1',
                                private $port = 10000)
    {
    }
    public function create()
    {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($this->socket === false) {
            echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
        } else {
            echo "OK.\n";
        }
    }
    public function connect()
    {
        echo "Attempting to connect to '$this->address' on port '$this->port'...";
        $result = socket_connect($this->socket, $this->address, $this->port);
        if ($result === false) {
            echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($this->socket)) . "\n";
        } else {
            echo "OK.\n";
        }
    }
    public function send()
    {
        echo "Sending HTTP HEAD request...";
        $in = "hi i am client";
        //Note that socket_write don't necessiary send all the data you should check
        //TODO assign the resuslt of socket_wrtite to a variable
        socket_write($this->socket, $in, strlen($in));
        echo "OK.\n";
    }
}
