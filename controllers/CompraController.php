<?php

namespace Controllers;

use MVC\Router;
use Model\Producto;

class CompraController
{
    // ---------------- Controlador index ----------------------

    public static function catalogo( Router $router )
    {

        $productos = Producto::all();
        
        $router->render('/catalogo/objetos',[
            'productos' => $productos
        ]);
    }

}