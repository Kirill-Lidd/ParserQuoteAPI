<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\QuoteService;


class QuoteController extends Controller
{

    public function getInJson($token,$date,QuoteService $service)
    {

        $xml = $service->getXmlByUrl('http://www.cbr.ru/scripts/XML_daily.asp?date_req=',$date);

        if($service->isNotValidDate($xml)){
            return response()->json([
                'error_code' => 404,
                'descriprion' => 'Not Found'
            ],
                404);
        }

        return response()->json([
                'status' => 'ok',
                'code' => '200',
                'result' => $xml
            ],
            200);
    }

}
