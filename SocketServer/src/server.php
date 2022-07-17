<?php

use MyApp\Message;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

// print( dirname(__DIR__) . '/vendor/autoload.php');
    require dirname(__DIR__) . '/vendor/autoload.php';

    $server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new Message()
            )
        ),
        8080
    );

    $server->run();