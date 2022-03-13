<?php

namespace Tests\Feature;

use App\WebSocket\SocketServer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\WebSocket;
use function PHPUnit\Framework\assertEquals;

class SocketTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_server()
    {
        $this->markTestSkipped('must be revisited.');

        $server = new SocketServer("127.0.0.1", "12345");
        $client = $server->accept();
        $server->write($client, "end");

        $readed = $server->read($client);
        echo $readed;
        assertEquals("all is good", $readed);
    }
    public function test_button()
    {
        $response = $this->postJson('/register/cam', ['name' => 'Sally']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'image_id' => '1',
            ]);
    }
    public function test_client()
    {
        $this->markTestSkipped('must be revisited.');
        $client = new WebSocket\SocketClient("127.0.0.1", "10001");
        $client->create();
        $client->connect();
        $client->send();
    }

}
