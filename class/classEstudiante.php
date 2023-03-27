<?php

include('classPersona.php');

class Estudiante extends Persona {

    public $codEstudiante; //string
    public $nota1; //array
    public $nota2; //array
    public $nota3; //array
    public $notaPromedio = 0; //double
    public $esMayor;
    public $edad;

    public function __construct($nombre, $apellido, $fechaNacimiento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function calcularEdad(){
        $hoy = new DateTime();
        $this->fechaNacimiento = new DateTime($this->fechaNacimiento);
        $edad = $hoy->diff($this->fechaNacimiento);
        return $this->edad = $edad->y;
    }

    public function generarCodigo(){
        return $this->codEstudiante =  $this->nombre[0] . $this->apellido[0] . rand(0,20);
    }

    public function calcularEsMayor(){
        if( $this->edad >= 18 ){
            return $this->esMayorEdad = "Si";
        }
        else{return $this->esMayorEdad = "No";}

    }

    public function calcularPromedio() {
        $this->notaPromedio = ($this->nota1 + $this->nota2 + $this->nota3) / 3;
    }


}
