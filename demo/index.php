<?php
/**learn file
 *:D
 **/
$router_map = include '../scripts/instance.php';
//echo var_dump($router_map);
$router_map->add("about", "/about");
$router_map->add("home", "/");

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$route = $router_map->match($path, $_SERVER);
echo "router is ";
echo print_r($route->values);
