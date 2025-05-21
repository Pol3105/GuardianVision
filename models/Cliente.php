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
        self::$alertas = []; // Reiniciar alertas por si se reutiliza
        if (!$this->Nombre) {
            self::$alertas['error'][] = "Debes añadir un nombre";
        }
        if (!$this->Direccion) {
            self::$alertas['error'][] = "Debes añadir una dirección";
        }
    
        if (!$this->Email) {
            self::$alertas['error'][] = "Debes añadir un correo electrónico";
        } elseif (!filter_var($this->Email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = "El formato del correo no es válido";
        }
    
        if (!$this->Telefono) {
            self::$alertas['error'][] = "Debes añadir un número de teléfono";
        } elseif (!preg_match('/^[0-9]{9}$/', $this->Telefono)) {
            self::$alertas['error'][] = "El teléfono debe tener 9 dígitos";
        }
    
        if (!$this->contraseña) {
            self::$alertas['error'][] = "Debes añadir una contraseña";
        } elseif (strlen($this->contraseña) < 6) {
            self::$alertas['error'][] = "La contraseña debe tener al menos 6 caracteres";
        }
    
        return self::$alertas;
    }
    
    public function ComprobacionContraseña($valor) {
        return $valor == $this->contraseña;
    }
}


