<?php

namespace core;

use ClanCats\Hydrahon\Query\Sql\Exists;
use \core\RouterBase;


class Router extends RouterBase
{
    public $routes;

    public function get($endpoint, $trigger)
    {
        $this->routes['get'][$endpoint] = $trigger;
    }

    public function post($endpoint, $trigger)
    {

        $this->routes['post'][$endpoint] = $trigger;
    }

    public function put($endpoint, $trigger)
    {
        $this->routes['put'][$endpoint] = $trigger;
    }

    public function delete($endpoint, $trigger)
    {
        $this->routes['delete'][$endpoint] = $trigger;
    }

    public function loadRouteFile($file)
    {
        if (file_exists('src/routes/' . $file . '.routes.php')) {
            require 'src/routes/' . $file . '.routes.php';
        }
    }
}
