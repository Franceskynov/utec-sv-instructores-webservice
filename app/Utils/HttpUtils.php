<?php


namespace App\Utils;

use Illuminate\Http\Request;

class HttpUtils
{

    public static function getServerUri(Request $request)
    {
        $host = $request->getHttpHost();
        $protocol = $request->isSecure() ? 'https://' : 'http://';
        return $protocol . $host;
    }

    public static function checkClient(Request $request)
    {
        $clientHeader = $request->header('Client', 'default_value--');
        $platformHeader = $request->header('Platform', 'default_value--');
        return $clientHeader == env('CLIENT_AUTHORIZATION') && $platformHeader == 'website';
    }
}
