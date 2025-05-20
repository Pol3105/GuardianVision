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
            $carrito = new Carrito($_POST);

            debuguear($carrito);
        }
        
        $router->render('/catalogo/objetos',[
            'productos' => $productos
        ]);
    }

    public static function carrito( Router $router )
    {

        $carrito = Carrito::all();
        
        $router->render('/catalogo/objetos',[
            'carrito' => $carrito
        ]);
    }

}