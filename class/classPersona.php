<?php

abstract class Persona {
    
    //Propiedades
    protected $nombre; //string
    protected $apellido; //string
    protected $dui; //int
    protected $nit; //int
    protected $direccion; //string
    protected $correo; //string
    protected $telMovil; //int
    protected $telFijo; //int
    protected $sexo; //string
    protected $fechaNacimiento; //date
    protected $edad; //int
    protected $esMayorEdad = false; //bool
}

//Funciones

abstract protected function GenerarCodigo(){

}

abstract protected function EsMayorEdad(){

}

abstract protected function CalcularEdad(){

}

