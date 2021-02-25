<?php

namespace Routes;

class Route
{
    public function findRoute($userRoute)
    {
        $routes = $this->getRoutes();

        foreach ($routes as $route => $call) {
            if ($userRoute == $route) {
                return $this->parseRouteCall($call);
            }
        }

        return null;
    }

    /**
     * Add any new routes into this method. The key is the path and the value follows Laravel's
     *  {class}@{method} format. Class namespace is required due to autoloader
     */
    private function getRoutes()
    {
        return [
            '/' => 'src\Controllers\CharacterController@all',
            '/search' => 'src\Controllers\CharacterController@search',
        ];
    }

    /**
     * Routes are in {controller}@{method} format
     */
    private function parseRouteCall($call)
    {
        $callSplit = explode('@', $call);

        return [
            'controller' => $callSplit[0],
            'method' => $callSplit[1]
        ];
    }
}
