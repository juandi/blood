<?php

namespace App\Helpers;

class WhiteBrandHelper
{
    /**
     *
     */
    public static function getWebCams($page=1)
    {
        $json = json_decode(file_get_contents("http://webcams.cumlouder.com/feed/webcams/online/61/".$page), true);
        return $json;
    }
}