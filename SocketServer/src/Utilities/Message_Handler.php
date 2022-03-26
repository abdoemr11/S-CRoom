<?php

namespace MyApp\Utilities;

class Message_Handler
{
    public static function encode_msg(array $msg_arr )
    {
        $json_string= json_encode($msg_arr);
        $json_encoded = base64_encode($json_string);
        return $json_encoded;
    }
    public static function decode_msg($encoded_msg )
    {
        $decoded_json_str = base64_decode($encoded_msg);
        return json_decode($decoded_json_str, true);
    }
}