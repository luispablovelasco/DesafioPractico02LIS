<?php

include('classPersona.php');

class Administrativo extends Persona {

    public $dependencia; //array
    public $salarioMensual; //double
    public $funcion; //string

    public $añosTrabajados; //int
    public $jubilar;
    //public $jubilar = false; //boolS
    public $codEmpleado; //string
    public $edad;
    //public $esMayor;

    public function __construct($nombre, $apellido, $fechaNacimiento, $fechaInicio) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->fechaInicio = $fechaInicio;
    }

    /*
    public function __construct($name, $lastName, $dui, $nit, $direccion, $correoElectronico, $telefonoMovil, $telefonoFijo, $sexo, $fechaNacimiento){
        $this->nombre=$name;
        $this->apellido=$lastName;
        $this->dui=$dui;
        $this->nit=$nit;
        $this->direccion=$direccion;
        $this->correo=$correoElectronico;
        $this->telMovil=$telefonoMovil;
        $this->telFijo=$telefonoFijo;
        $this->sexo=$sexo;
        $this->fechaNacimiento=$fechaNacimiento;
    }*/

    public function generarCodigo(){
        return $this->codEmpleado =  $this->nombre[0] . $this->apellido[0] . rand(0,20);
    }
    
    public function calcularEdad(){
        $hoy = new DateTime();
        $this->fechaNacimiento = new DateTime($this->fechaNacimiento);
        $edad = $hoy->diff($this->fechaNacimiento);
        return $this->edad = $edad->y;
    }


    public function calcularEsMayor(){
        if( $this->edad >= 18 ){
            return $this->esMayorEdad = true;
        }
        else{return $this->esMayorEdad = false;}

    }

    function calcularJubilacion($fechaInicio){

        $fechaActual = new DateTime();
        $fechaInicio = new DateTime($fechaInicio);

        $diferencia = $fechaInicio->diff($fechaActual);
        $añosTrabajados = $diferencia->y;

        if($añosTrabajados >= 30) {
            $jubilar = "Si";
        }else 
        {
            $jubilar = "No";
        }
        $this->añosTrabajados = $añosTrabajados;
        return $this->jubilar=$jubilar;
    }


}