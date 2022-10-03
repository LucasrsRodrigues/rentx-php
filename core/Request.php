<?php

namespace core;

use src\Config;

class Request
{

    public static function getUrl()
    {

        $url = str_replace("", "", $_SERVER["REQUEST_URI"]);

        $url = str_replace(Config::BASE_DIR, '', $url);
        return $url;
    }

    public static function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
