<?php
/**
 * Created by PhpStorm.
 * User: Franceskynov
 * Date: 5/15/2019
 * Time: 1:36 PM
 */

namespace App\Utils;
class DataManipulation
{
    /**
     * @example [1, 2, 3, 4] && [1, 2, 3, 5] => [4, 5]
     * @param $t
     * @param $ch
     * @return array
     */
    public static function tagDiff($t, $ch)
    {
        return array_merge(
            array_values(
                array_diff($t, $ch)
            ),
            array_values(
                array_diff($ch,
                    array_values(
                        array_intersect($t, $ch)
                    )
                )
            )
        );
    }

    /**
     * @param $errors
     * @return string
     */
    public static function getMessages($errors)
    {
        $newArr   = [];
        $messages = '';
        foreach ($errors->toArray() as $key => $value)
        {
            foreach ($value as $k => $v) {
                array_push($newArr, $v);
            }
        }

        foreach ($newArr as $key => $value)
        {
            $messages =  '; ' .$value . ' ';
        }

        return $messages;
    }

    /**
     * @param $request
     * @return mixed
     */
    public static function getRowsPerPage($request)
    {
        return $request
            ->rows_per_page ? $request
            ->rows_per_page : env('ROWS_PER_PAGE', 4);
    }
}