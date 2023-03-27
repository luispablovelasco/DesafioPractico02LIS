<?php

abstract class Persona {
    
    //Propiedades
    public $nombre; //string
    public $apellido; //string
    public $dui; //int
    public $nit; //int
    public $direccion; //string
    public $correo; //string
    public $telMovil; //int
    public $telFijo; //int
    public $sexo; //string
    public $fechaNacimiento; //date

    //protected $edad; //int
    //protected $esMayorEdad = false; //bool
    //protected $codigo;
    
    abstract public  function generarCodigo();
    abstract public function calcularEsMayor();
    abstract public function calcularEdad();



}

