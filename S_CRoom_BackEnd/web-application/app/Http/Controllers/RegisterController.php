<?php

namespace App\Http\Controllers;

use App\WebSocket\SocketServer;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function open_cam()
    {
        $server = new SocketServer("127.0.0.1", "12345");
        $client = $server->accept();

        //recive the value from the rasperry pi
        $readed = $server->read($client);
        return response()->json([
            'image_id' => $readed

        ]);
    }
}
