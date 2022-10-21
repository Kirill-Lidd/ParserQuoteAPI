<?php

namespace App\Http\Controllers;

use App\Models\User;



class ParserController extends Controller
{
    function parserFromXmlToJson($token,$date)
    {
        $user = User::where('token', '=', $token)->first();
        $url_xml = file_get_contents('http://www.cbr.ru/scripts/XML_daily.asp?date_req='.$date);
        $xml = simplexml_load_string($url_xml, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_decode(json_encode($xml),true);
        $resource_date = $json['@attributes']['Date'];
        $converted_date = str_replace('-','.',$date);

        if (!$user) {
            return response()->json(
                [
                    'error_code' => 401,
                    'descriprion' => 'Unauthorized'
                ],
                401);
        }

        if($converted_date !== $resource_date){
            return response()->json(
                [
                    'error_code' => 404,
                    'descriprion' => 'Not Found'
                ],
                404);
        }

        return response()->json(
            [
                'status' => 'ok',
                'code' => '200',
                'result' => $xml
            ],
            200);
    }


}
