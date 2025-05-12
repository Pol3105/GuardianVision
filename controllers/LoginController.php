<?php

namespace Controllers;

use Model\User;
use MVC\Router;

class LoginController
{
    // ---------------- Controlador index ----------------------

    public static function inicio( Router $router )
    {
        $router->render('/index');
    }

    /*
        Controlador de Login según email y contraseña.
    */

    /*
    public static function login( Router $router )
    {
        $alertas = [];
        $usuario = null;

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // Primero encontramos a que usuario nos referimos
            $usuario = Usuarios::where("email", $_POST['email']);
            
            if($usuario){
                
                if( $usuario->ComprobacionContraseña($_POST['contraseña']) ){

                    if( $usuario->EstaVerificado()){
                        $_SESSION['usuario_id'] = $usuario->id;
                        $_SESSION['usuario_nombre'] = $usuario->nombre;
                        $_SESSION['usuario_email'] = $usuario->email;
                        $_SESSION['es_admin'] = $usuario->admin === '1';
                        header('Location: /'); // Redirige al área privada
                        exit;
                    }
                    else{
                        Usuarios::setAlerta('error','El email no esta verificado, compruebe el email');
                    }
                }
                else{
                    Usuarios::setAlerta('error','El email o contraseña son incorrectos');
                }
            }
            else{
                Usuarios::setAlerta('error','El email o contraseña son incorrectos');
            }
            
        }

        $alertas = Usuarios::getAlertas();

        $router->render('/auth/login',[
            "usuario" => $usuario,
            'alertas' =>$alertas
        ]);
    }

    */

    /*
        Cerrado de sesión
    */

    public static function logout( ){
        // Elimina todas las variables de sesión
        $_SESSION = [];

        header('Location: /login');
    }

    /*
        Creación de cuenta
    */

    /*

    public static function CrearCuenta( Router $router ){

        $alertas = [];
        $usuario = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Primero encontramos a que usuario nos referimos
            $usuario = Usuarios::where("email", $_POST['email']);

            if( $usuario ){
                Usuarios::setAlerta('error','El email ya está registrado o no existe');

                $alertas = Usuarios::getAlertas();
            }
            else{
                $usuario = new Usuarios($_POST);

                $usuario->HasheoContraseña();

                $usuario->Verificaciones();

                $alertas = Usuarios::getAlertas();

                if( empty($alertas)){

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

    */
    
    // ---------------- Controlador login ----------------------

    /*

    public static function cerrar( Router $router )
    {
        
        $_SESSION = [];          // Vacía todas las variables de sesión
        session_destroy();       // Destruye la sesión activa

        $router->render('/index');
    }

    public static function login( Router $router )
    {

        $alertas = [];
        $cliente = null;

        $alertas = Cliente::getAlertas();

        $router->render('/auth/login',[
            "cliente" => $cliente,
            'alertas' =>$alertas
        ]);
    }

    public static function CrearCuenta( Router $router )
    {
        // Iniciar la sesión si no está iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        
        $alertas = [];
        $cliente = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {

            $cliente = new Cliente($_POST);


            if (empty($alertas))
            {
                $resultado = $cliente->guardar();

                if ($resultado)
                {
                    Cliente::setAlerta('exito','Usuario creado correctamente');
                }
                else
                {
                    Cliente::setAlerta('error','El usuario no se pudo crear');
                }
            }
            
        }

        $alertas = Cliente::getAlertas();
        
        $router->render('/auth/crear-cuenta',[
            "cliente" => $cliente,
            'alertas' =>$alertas
        ]);
    }

    */

}