<?php
namespace controllers;
use \Psr\Container\ContainerInterface;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class api
{
   protected $container;

   public function __construct(ContainerInterface $container) 
   {
       $this->container = $container;
   }
   public function __invoke(Request $request, Response $response, $args)  
   {
        $contasDAO = $this->container['dbService\ContasDAO'];
        $iterador = $contasDAO->getAllContas();
        $view = $this->container["twig"];
        return $view->render($response, "index.html",[
            "contas" => $iterador
        ]);
   }
}
?>