<?php

namespace Model;

// IMPORTANTE -> El nombre tiene que ser el mismo de la clase y el archivo

class Producto extends ActiveRecord{

    //Base de datos

    protected static $tabla = 'Producto';

    // Un vector con las MISMAS columnas que tiene la base de datos
    protected static $columnasBD = ['cod_producto','nombre','stock_actual','stock_minimo','precio','ubicacion','descripcion','imagen'];


    public $cod_producto;
    public $nombre;
    public $stock_actual;
    public $stock_minimo;
    public $precio;
    public $ubicacion;
    public $descripcion;
    public $imagen;
    
    //-------Constructor-------//

    public function __construct($args = []){
        $this->cod_producto = $args['cod_producto'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->stock_actual = $args['stock_actual'] ?? null;
        $this->stock_minimo = $args['stock_minimo'] ?? null;
        $this->precio = $args['precio'] ?? '0';
        $this->ubicacion = $args['ubicacion'] ?? null;
        $this->descripcion = $args['descripcion'] ?? null;
        $this->imagen = $args['imagen'] ?? null;
    }


    //-------Validaciones-------//

    public function validar(){
        if(!$this->nombre){
            self::$alertas['error'][] = "Debes añadir un nombre";
        }
        if(!$this->stock_actual){
            self::$alertas['error'][] = "Debes añadir un stock_actual";
        }
        if(!$this->stock_minimo){
            self::$alertas['error'][] = "Debes añadir un stock_minimo";
        }
        
        return self::$alertas;
    }

}


