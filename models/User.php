<?php

namespace Model;

// IMPORTANTE -> El nombre tiene que ser el mismo de la clase y el archivo

class User extends ActiveRecord{


    //Base de datos

    protected static $tabla = 'user';

    // Un vector con las MISMAS columnas que tiene la base de datos
    protected static $columnasBD = ['id','nombre','apellido','email','admin','confirmado','token','password'];


    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $admin;
    public $confirmado;
    public $token;
    public $password;

    
    //-------Constructor-------//

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->apellido = $args['apellido'] ?? null;
        $this->email = $args['email'] ?? null;
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? null;
        $this->password = $args['password'] ?? null;
    }


    //-------Validaciones-------//

    public function validar(){
        if(!$this->nombre){
            self::$alertas['error'][] = "Debes añadir un nombre";
        }
        if(!$this->apellido){
            self::$alertas['error'][] = "Debes añadir un apellido";
        }
        if(!$this->email){
            self::$alertas['error'][] = "Debes añadir un email";
        }
        if(!$this->password){
            self::$alertas['error'][] = "Debes añadir un password";
        }
        if($this->password){
            if(strlen($this->password) < 6){
                self::$alertas['error'][] = "El password debe tener al menos 6 caracteres";
            }
        }
        
        return self::$alertas;
    }

    public function validarLogin(){
        
        if(!$this->password){
            self::$alertas['error'][] = "Debes añadir un password";
        }

        return self::$alertas;
    }

    public function validarEmail(){
        if(!$this->email){
            self::$alertas['error'][] = "Debes añadir un email";
        }

        return self::$alertas;
    }


    //-------Comprobaciones-------//

    public function existeUser(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);
        

        if($resultado->num_rows){
            self::$alertas['error'][] = "El email ya esta registrado";
        }

        return $resultado;
    }

    public function comprobarPassword($password){
        
        $resul = password_verify($password , $this->password );

        if( !$resul || !$this->confirmado ){
            self::$alertas['error'][] = 'Password incorrecto o la cuenta no ha sido confirmada';
        }else{
            return true;
        }
    }


    //-------Hash password Y Token-------//

    public function hashPassword(){
        if(!$this->password){
            return;
        }
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken(){
        $this->token = uniqid();
    }

    public function setPassword($password){
        $this->password = $password;
    }

}


