<?php

namespace core;

use ClanCats\Hydrahon\Query\Sql\Exists;
use core\Middleware\Queue;
use \core\RouterBase;


class Router extends RouterBase
{
    public $routes;

    public function get($endpoint, $trigger)
    {
        return $this->routes['get'][$endpoint] = $trigger;
    }

    public function post($endpoint, $trigger)
    {
        return $this->routes['post'][$endpoint] = $trigger;
    }

    public function put($endpoint, $trigger)
    {
        return $this->routes['put'][$endpoint] = $trigger;
    }

    public function delete($endpoint, $trigger)
    {
        return $this->routes['delete'][$endpoint] = $trigger;
    }
}
