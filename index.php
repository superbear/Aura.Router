<?php
/**learn file
 *:D
 **/
$router_map = require 'Aura.Router/scripts/instance.php';

$router_map->add("home", "/");

//add a simple unnamed route with params
$router_map->add(null, '/{:controller}/{:action}/{:id:(\d+)}');
/*url = /test/get/2
 *it will return controller  test
 *action get
 *id  2
 **/

//add a complex name route
$router_map->add("read","/blog/read/{:id}{:format}",[
    "params" => [
        "id" => "(\d+)",
        "format" => "(\..+)?"],
    "values" => [
        "controller" => "blog",
        "action" => "read",
        "format" => ".html",
    ]
    ]);
/*url = /blog/read/2.html
 *It will return controller blog
 *action  read
 *format .html
 *id 2
 **/

$path = parse_url($_SERVER["PATH_INFO"], PHP_URL_PATH);
$route = $router_map->match($path, $_SERVER);
$params = $route->values;
echo var_dump($params);

echo "***********************";
