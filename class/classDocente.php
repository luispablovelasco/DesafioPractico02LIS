<?php

include('classPersona.php');

class Docente extends Persona {

    public $materia1; //array
    public $materia2; //array
    public $materia3; //array

    public $esMayor;
    public $horasTrabajadas; //int
    public $pagoHoraTrabajada; //double
    public $salario; //double
    public $codDocente;
    public $edad;

    
    public function __construct($nombre, $apellido, $fechaNacimiento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function generarCodigo(){
        return $this->codDocente =  $this->nombre[0] . $this->apellido[0] . rand(0,20);
    }
    
    public function calcularEdad(){
        $hoy = new DateTime();
        $this->fechaNacimiento = new DateTime($this->fechaNacimiento);
        $edad = $hoy->diff($this->fechaNacimiento);
        return $this->edad = $edad->y;
    }

    public function calcularEsMayor(){
        if( $this->edad >= 18 ){
            return $this->esMayorEdad = "Si";
        }
        else{return $this->esMayorEdad = "No";}

    }

    function calcularSalario(){
        return $this->salario = $this->horasTrabajadas * $this->pagoHoraTrabajada;
    }


}
