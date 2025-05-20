<?php

namespace Model;

// IMPORTANTE -> El Nombre tiene que ser el mismo de la clase y el archivo

class Cliente extends ActiveRecord{


    //Base de datos

    protected static $tabla = 'Cliente';

    // Un vector con las MISMAS columnas que tiene la base de datos
    protected static $columnasBD = ['id','Nombre','Direccion','Email','Telefono','contraseña'];


    public $id;
    public $Nombre;
    public $Direccion;
    public $Email;
    public $Telefono;
    public $contraseña;
   

    
    //-------Constructor-------//

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->Nombre = $args['Nombre'] ?? null;
        $this->Direccion = $args['Direccion'] ?? null;
        $this->Email = $args['Email'] ?? null;
        $this->Telefono = $args['Telefono'] ?? '0';
        $this->contraseña = $args['contraseña'] ?? '0';
    }


    //-------Validaciones-------//

    public function validar(){
        if(!$this->Nombre){
            self::$alertas['error'][] = "Debes añadir un Nombre";
        }
        if(!$this->Direccion){
            self::$alertas['error'][] = "Debes añadir un Direccion";
        }
        
        return self::$alertas;
    }

}


