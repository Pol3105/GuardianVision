<?php

namespace Model;

// IMPORTANTE -> El nombre tiene que ser el mismo de la clase y el archivo

class Carrito extends ActiveRecord{

    //Base de datos

    protected static $tabla = 'Carrito';

    // Un vector con las MISMAS columnas que tiene la base de datos
    protected static $columnasBD = ['id','Cantidad','idProducto','idCliente'];


    public $id;
    public $Cantidad;
    public $idProducto;
    public $idCliente;
    
    //-------Constructor-------//

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->Cantidad = $args['Cantidad'] ?? null;
        $this->idProducto = $args['idProducto'] ?? null;
        $this->idCliente = $args['idCliente'] ?? null;
    }

    public static function encontrarCarrito( $idCliente , $idProducto ){
        $query = "SELECT * FROM " . static::$tabla  ." WHERE idProducto = '$idProducto' and idCliente = '$idCliente'";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    public function aumentarCantidad(){
        $this->Cantidad ++;
    }

    public function eliminarCantidad()
    {
        $this->Cantidad--;
    }

}


