<?php

namespace Controllers;

use Model\Carrito;
use Model\Cliente;
use MVC\Router;
use Model\Producto;

class CompraController
{
    // ---------------- Controlador index ----------------------

    public static function catalogo( Router $router )
    {

        $productos = Producto::all();
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            if( !$_POST['idCliente']){

                header("Location: /login");
                exit;
            }
            else{
                $carrito_existe = Carrito::encontrarCarrito($_POST['idCliente'],$_POST['idProducto']);

                if( $carrito_existe){
                    $carrito_existe->aumentarCantidad();
                    $carrito_existe->actualizar();
                    Cliente::setAlerta('exito','Se ha aumentado la cantidad');
                }
                else{
                    $carrito = new Carrito($_POST);
                    $carrito->guardar();
                    Cliente::setAlerta('exito','Se ha añadido el objeto al carrito');
            }
            }
        }

        $alertas = Cliente::getAlertas();
        
        $router->render('/catalogo/objetos',[
            'productos' => $productos,
            'alertas' =>$alertas
        ]);
    }

    public static function carrito( Router $router )
    {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $carrito_existe = Carrito::encontrarCarrito($_POST['idCliente'],$_POST['idProducto']);

            if( $carrito_existe->Cantidad == '1'){
                $carrito_existe->eliminar();
                Cliente::setAlerta('error','Se ha eliminado el objeto del carrito');
            }
            else{
                $carrito_existe->eliminarCantidad();

                $carrito_existe->actualizar();
                Cliente::setAlerta('error','Se ha decrementado el objeto del carrito');
            }
        }

        $carrito = Carrito::all();
        $alertas = Cliente::getAlertas();

        $pago_total = 0;
        
        $router->render('/catalogo/carrito',[
            'carrito' => $carrito,
            'pago_total' => $pago_total,
            'alertas' =>$alertas
        ]);
    }

}