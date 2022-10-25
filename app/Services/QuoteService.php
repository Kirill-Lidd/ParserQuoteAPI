<?php

namespace App\Services;

class QuoteService
{
    private $date;

    public function getXmlByUrl($url,$date)
    {
        $this->date = $date;

        $url_xml = file_get_contents($url.$date);

        return simplexml_load_string($url_xml);
    }

    public function isNotValidDate($xml)
    {
        $array = json_decode(json_encode($xml),true);
        $date = str_replace('-','.',$this->date);

        if(!isset($array['@attributes']['Date'])){
            return true;
        }
        if($date !== $array['@attributes']['Date']){
            return true;
        }

        return false;
    }
}
