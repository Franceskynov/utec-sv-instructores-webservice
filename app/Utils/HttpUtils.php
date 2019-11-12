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
}
