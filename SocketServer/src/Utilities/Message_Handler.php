<?php

namespace MyApp\Utilities;

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

class Message_Handler
{
    public static function encode_msg(array $msg_arr )
    {
        $json_string= json_encode($msg_arr);
//        $json_encoded = base64_encode($json_string);
        $json_encoded = $json_string;
        return $json_encoded;
    }
    public static function decode_msg($encoded_msg )
    {
//        $decoded_json_str = base64_decode($encoded_msg);
        $decoded_json_str = $encoded_msg;
        return json_decode($decoded_json_str, true);
    }

    /**
     * @throws \Defuse\Crypto\Exception\EnvironmentIsBrokenException
     * @throws \Defuse\Crypto\Exception\BadFormatException
     */
    public static function encrypt_msg(array $msg, $key)
    {
//        var_dump($key);
//        $ready_key = Key::loadFromAsciiSafeString($key);
////        $ready_key = Key::createNewRandomKey();
//        var_dump ($ready_key);
//        echo '\n the line before me should print the key';
//        $ciphertext = Crypto::encrypt(json_encode($msg), $ready_key);
//        return $ciphertext;
        return json_encode($msg);

    }

    public static function decrypt_msg($msg, $getToken)
    {
        return json_decode($msg, true);
    }

}