<?php


namespace App\Utils;


class CarnetUtils
{
    /**
     * @param $request
     * @return bool
     */
    public static function check($request)
    {
        if ($carnet = $request->carnet)
        {
            if (strlen($carnet) == 10)
            {
                $response = true;

            } else {
                $message = 'el carnet es invalido';
                $response = false;
            }

        } else {
            $message = 'se requiere el carnet';
            $response = false;
        }

        return $response;
    }

    public static function getCarnet($request)
    {
        return $request->carnet;
    }
}
