<?php 

include_once "Route.php";
include_once "Router.php";
include_once "Routes/CommentRoutes.php";
include_once "Routes/PersonRoutes.php";
include_once "Routes/EntertainmentRoutes.php";
include_once "Routes/CategoryRoutes.php";
include_once "Routes/AdminRoutes.php";

function startRouter(): Router 
{
    $routes = [];

    $routes = array_merge($routes, CommentRoutes::getRoutes());
    $routes = array_merge($routes, PersonRoutes::getRoutes());
    $routes = array_merge($routes, EntertainmentRoutes::getRoutes());
    $routes = array_merge($routes, CategoryRoutes::getRoutes());
    $routes = array_merge($routes, AdminRoutes::getRoutes());

    $routesClass = [];
    foreach ($routes as $route) {
        $routesClass[] = Route::fromArray($route);
    }

    return new Router($routesClass);
}