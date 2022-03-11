<?php

namespace App\WebSocket;

class SocketServer
{
    private $sock;
    public function __construct(private $address = '192.168.1.53',
                                private $port = 10000)
    {

        $this->create();
        $this->bind();
        $this->listen();
    }
    /**
     * @return void
     */
    public function create(): void
    {
        try {
            $this->sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        } catch (ErrorExceptionException $e) {
            echo "socket_create() failed: reason: " . $e->getMessage() . "\n"
                . socket_strerror(socket_last_error()) . "\n";
        }
    }
    private function bind()
    {

        try
        {
            socket_bind($this->sock, $this->address, $this->port);
        } catch (ErrorExceptionException $e) {
            echo "socket_bind() failed: reason: " . $e->getMessage() . "\n"
                . socket_strerror(socket_last_error()) . "\n";
        }
    }
    private function listen()
    {
        if (socket_listen($this->sock, 5) === false) {
            echo "socket_listen() failed: reason: " . socket_strerror(socket_last_error($this->sock)) . "\n";
        }
    }
    public function handle()
    {
        do {
            if (($msgsock = socket_accept($this->sock)) === false) {
                echo "socket_accept() failed: reason: " . socket_strerror(socket_last_error($this->sock)) . "\n";
                break;
            }
            $this->write($msgsock);
        } while (true);
    }
    public function accept()
    {
        if (($msgsock = socket_accept($this->sock)) === false) {
            echo "socket_accept() failed: reason: " . socket_strerror(socket_last_error($this->sock)) . "\n";
        }
        return $msgsock;
    }
    public function write($client_sock, $msg)
    {
        /* Send instructions. */
        $length = strlen($msg);
        while (true) {

            $sent = socket_write($client_sock, $msg, $length);

            if ($sent === false) {

                break;
            }

            // Check if the entire message has been sented
            if ($sent < $length) {

                // If not sent the entire message.
                // Get the part of the message that has not yet been sented as message
                $st = substr($st, $sent);

                // Get the length of the not sented part
                $length -= $sent;

            } else {

                break;
            }

        }
    }
    public function read($client_sock)
    {
        if (false === ($buf = socket_read($client_sock, 2048, PHP_BINARY_READ ))) {
            echo "socket_read() failed: reason: " . socket_strerror(socket_last_error($client_sock)) . "\n";

        }
        return $buf;
    }
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }


}
