<?php
require_once 'model/database.php';
$controller = 'empleado';
$controller2 = 'inicio';
// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c'])){
require_once "controller/$controller2.controller.php";
    $controller2 = ucwords($controller2) . 'Controller';
    $controller2 = new $controller2;
    $controller2->Index();
   // require_once "controller/$controller.controller.php";
   // $controller = ucwords($controller) . 'Controller';
   // $controller = new $controller;
   //$controller->Index();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);

    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    //$accion2=isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Index';
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
