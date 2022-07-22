<?php

namespace MyApp\Utilities;

use Psy\Util\Json;

class CommandHelper
{
    public static function response($status, $type, $msg, array $restOp)
    {
        $remainingOp = json_encode($restOp);
        $remainingOp = substr($remainingOp, 1,-1);
        $plain_res = <<< EOD
{
    "action": "response",
    "from": "server",
    "to": "professor",
    "execute": {
        "status": $status,
        "type": $type,
        "msg" : $msg,
        $remainingOp
    }
}

EOD;
    echo $plain_res;
    return $plain_res;
    }
}