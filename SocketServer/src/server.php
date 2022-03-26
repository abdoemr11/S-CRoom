<?php

use MyApp\Message;
use Ratchet\Server\IoServer;

// print( dirname(__DIR__) . '/vendor/autoload.php');
    require dirname(__DIR__) . '/vendor/autoload.php';

    $server = IoServer::factory(
        new Message(),
        8080
    );

    $server->run();