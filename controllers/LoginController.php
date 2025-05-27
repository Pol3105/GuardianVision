<?php

namespace Controllers;

use Model\Cliente;
use Model\Carrito;
use MVC\Router;

class LoginController
{
    // ---------------- Controlador index ----------------------

    public static function inicio( Router $router )
    {   
        $alertas = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            if( isset($_GET['pagado'])){
                $carrito = Carrito::all();

                foreach( $carrito as $carro){
                    $carro->eliminar();
                }

                Cliente::setAlerta('exito','compra realizada con exito');
            }
        }

        $alertas = Cliente::getAlertas();

        $router->render('/index',[
            "alertas" => $alertas
        ]);
    }

    /*
        Controlador de Login según email y contraseña.
    */

    public static function login( Router $router )
    {
        $alertas = [];
        $usuario = null;

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            if( isset($_GET['error']))
                Cliente::setAlerta('error','Necesitas iniciar sesión');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // Primero encontramos a que usuario nos referimos
            $usuario = Cliente::where("Email", $_POST['email']);

            if( $usuario  ){
                if($usuario->ComprobacionContraseña($_POST['password'])){
                    $_SESSION['usuario_id'] = $usuario->id;
                    $_SESSION['usuario_nombre'] = $usuario->Nombre;
                    $_SESSION['usuario_email'] = $usuario->Email;
    
                    header('Location: /'); // Redirige al área privada
                    exit;
                }
                else{
                    Cliente::setAlerta('error','El email o contraseña son incorrectos');
                }
            }
            else{
                Cliente::setAlerta('error','El email o contraseña son incorrectos');
            }
            
         }

        $alertas = Cliente::getAlertas();

        $router->render('/auth/login',[
            "usuario" => $usuario,
            'alertas' =>$alertas
        ]);
    }


    /*
        Cerrado de sesión
    */

    public static function logout( ){
        // Elimina todas las variables de sesión
        $_SESSION = [];

        $carrito = Carrito::all();

        foreach( $carrito as $carro){
            $carro->eliminar();
        }

        header('Location: /login');
    }

    /*
        Creación de cuenta
    */


    public static function crearCuenta( Router $router ){

        $alertas = [];
        $usuario = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Primero encontramos a que usuario nos referimos
            $usuario = Cliente::where("Email", $_POST['Email']);
    
            if( $usuario ){
                Cliente::setAlerta('error','El email ya está registrado o no existe');
                $alertas = Cliente::getAlertas();
            }
            else{
                $usuario = new Cliente($_POST);

                $alertas = $usuario->validar();

                if( empty($alertas) ){
                    $usuario->guardar();
                    header("Location: /confirmacion");
                }
            }
        }
       
        $router->render('/auth/crear-cuenta',[
            "usuario" => $usuario,
            'alertas' =>$alertas
        ]);
    }

    public static function confirmacion( Router $router ){
        $router->render('/auth/confirmacion');
    }


}