<?php
use \Slim\App;
use \Slim\Views\Twig;

// DIC configuration
$container = $app->getContainer();

$container['dbService\connService'] = function ($c)
{
    $conn = new dbService\connService ($c);
    return $conn->getConn();
};

// db service
$container['dbService\ContasDAO'] = function ($c) 
{  
    $ContasDAO = new dbService\ContasDAO($c);
    
    return $ContasDAO;
};

$container['twig'] = function ($c) 
{
    $view = new Twig("views", array('cache' => 'cache/twig', 'debug' => true));
    return $view;
};

// controller
$container['controllers\api'] = function ($c) 
{
    return new controllers\api($c);
};