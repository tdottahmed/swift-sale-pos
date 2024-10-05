
<?php

namespace App\Helpers;

class PageHelper
{
    public static function getPageHeader()
    {
        // Get the current route name
        $route = \Route::currentRouteName();

        // Extracting and formatting the controller and method name from the route
        $controllerMethod = explode('@', $route);
        $controllerName = str_replace('Controller', '', $controllerMethod[0]);
        $methodName = str_replace('_', ' ', $controllerMethod[1]);
        $pageHeader = ucfirst($controllerName) . ' - ' . ucfirst($methodName);

        return $pageHeader;
    }
}
