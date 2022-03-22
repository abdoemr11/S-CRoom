<?php
use Ratchet\Server\IoServer;
use MyApp\Chat;
    // print( dirname(__DIR__) . '/vendor/autoload.php');
    require dirname(__DIR__) . '/vendor/autoload.php';

    $server = IoServer::factory(
        new Chat(),
        8080
    );

    $server->run();