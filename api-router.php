<?php
require_once './libs/Router.php';
require_once './app/controllers/catalogue-api.controller.php';

$router = new Router();

$router->addRoute('genre', 'GET', 'CatalogueApiController', 'getGenre');
$router->addRoute('catalogue', 'GET', 'CatalogueApiController', 'getCatalogue');
$router->addRoute('catalogue', 'POST', 'CatalogueApiController', 'insertFilmSerie'); 
$router->addRoute('catalogue/:ID', 'GET', 'CatalogueApiController', 'getFilmSerie');
$router->addRoute('catalogue/:ID', 'DELETE', 'CatalogueApiController', 'deleteFilmSerie');
//$router->addRoute('catalogue/:ID', 'PUT', 'CatalogueApiController', 'editeFilmSerie'); 

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);