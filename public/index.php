<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;

$router = new Router();

//-------Index-------//

$router->get('/',[LoginController::class,'inicio']);
$router->post('/',[LoginController::class,'inicio']);


//-------Login-------//

//$router->get('/login',[LoginController::class,'login']);
//$router->post('/login',[LoginController::class,'login']);
//$router->get('/logout',[LoginController::class,'logout']);


//-------Olvidar Contraseña-------//

//$router->get('/olvidar',[LoginController::class,'olvidar']);
//$router->post('/olvidar',[LoginController::class,'olvidar']);
//$router->get('/recuperar',[LoginController::class,'recuperar']);
//$router->post('/recuperar',[LoginController::class,'recuperar']);


//-------Crear Cuenta-------//

//$router->get('/crear-cuenta',[LoginController::class,'crearCuenta']);
//$router->post('/crear-cuenta',[LoginController::class,'crearCuenta']);


//-------Confirmar cuenta-------//

//$router->get('/confirmar-cuenta',[LoginController::class,'confirmarCuenta']);
//$router->get('/mensaje',[LoginController::class,'mensaje']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();