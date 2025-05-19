<?php

namespace Controllers;

use MVC\Router;
use Model\Producto;

class CompraController
{
    // ---------------- Controlador index ----------------------

    public static function catalogo(Router $router)
    {
        // Recibir el término de búsqueda enviado por POST
        $buscar = $_POST['buscar'] ?? null;

        if($buscar){
            $productos = Producto::buscarPorNombre($buscar);
        } else {
            $productos = Producto::all();
        }

        $router->render('/catalogo/objetos',[
            'productos' => $productos,
            'buscar' => $buscar
        ]);
    }

}