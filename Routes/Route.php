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

    private function getRoutes()
    {
        // Array of routes and the namespaced controllers they call
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
