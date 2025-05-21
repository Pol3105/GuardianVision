<?php

namespace Controllers;

use Model\Carrito;
use MVC\Router;
use Model\Producto;

class CompraController
{
    // ---------------- Controlador index ----------------------

    public static function catalogo( Router $router )
    {

        $productos = Producto::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $carrito_existe = Carrito::encontrarCarrito($_POST['idCliente'],$_POST['idProducto']);

            if( $carrito_existe){
                $carrito_existe->aumentarCantidad();
                $carrito_existe->actualizar();
            }
            else{
                $carrito = new Carrito($_POST);
                $carrito->guardar();
            }
        }
        
        $router->render('/catalogo/objetos',[
            'productos' => $productos
        ]);
    }

    public static function carrito( Router $router )
    {

        $carrito = Carrito::all();

        $pago_total = 0;
        
        $router->render('/catalogo/carrito',[
            'carrito' => $carrito,
            'pago_total' => $pago_total
        ]);
    }

}