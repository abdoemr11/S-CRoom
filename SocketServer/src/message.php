<?php
namespace MyApp;
use MyApp\Controller\ServerController;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use MyApp\Utilities\Message_Handler;

//TODO build student and staff class

class Message implements MessageComponentInterface {
    protected $clients;
    protected $controller;
    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->controller = new ServerController();
    }
    //TODO when open student should send welcome message with their id
    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
        $conn->send(Message_Handler::encode_msg(array('action' => 'hello',
        'from'=> 'server', 'to' => 'student', 'execute'=>[])));
//        $conn->close();
//        foreach ($this->clients as $client) {
//
//                // The sender is not the receiver, send to each client connected
////                $client->send("Welcome to the server");
//
//        }    }
    }
    /** TODO if message come from the admin to a student
        the controller singleton should have a list of student{id, ConnectionInterface connection}
     */
    public function onMessage(ConnectionInterface $from, $msg) {
        $this->controller->handleMsg( $from, $msg);
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}