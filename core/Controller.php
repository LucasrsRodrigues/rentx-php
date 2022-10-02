<?php

namespace core;

use \src\Config;

class Controller
{

    protected function redirect($url)
    {
        header("Location: " . $this->getBaseUrl() . $url);
        exit;
    }

    private function getBaseUrl()
    {
        $base = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://';
        $base .= $_SERVER['SERVER_NAME'];
        if ($_SERVER['SERVER_PORT'] != '80') {
            $base .= ':' . $_SERVER['SERVER_PORT'];
        }
        $base .= Config::BASE_DIR;

        return $base;
    }

    public function returnJson($data = [], $statusCode = 200)
    {
        http_response_code($statusCode);
        return json_encode($data);
    }


    public function getData()
    {
        $data = json_decode(file_get_contents("php://input"));
        $array = json_decode(json_encode($data), true);
        return $array;
    }
}
