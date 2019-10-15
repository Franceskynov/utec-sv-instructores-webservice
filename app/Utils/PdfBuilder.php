<?php

/*
|--------------------------------------------------------------------------
| Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
|--------------------------------------------------------------------------
|
*/
namespace App\Utils;


class PdfBuilder
{
    public static function makePdf($title, $view, $data, $option, $fileName = null, $orientation = null)
    {
        $pdf = \View::make($view, ['title'=> $title, 'data' => $data])->render();
        $pdf = preg_replace('/>\s+</', '><', $pdf);

        if ($orientation == true){
            return \PDF::loadHtml($pdf)->setPaper('L', 'landscape')->stream();
        }

        switch ($option)
        {
            case 1:
                return \PDF::loadHtml($pdf)->stream($title . time() . '.pdf');
                break;

            case 2:
                if ($fileName != null)
                {
                    return \PDF::loadHtml($pdf)->download($fileName . time() . '.pdf');

                }else {
                    return \PDF::loadHtml($pdf)->download('reporte.pdf');
                }
                break;
        }
    }
}
