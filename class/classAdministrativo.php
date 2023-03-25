<?php

include('classPersona.php');

class Administrativo extends Persona {

    private $dependencia; //array
    private $salarioMensual; //double
    private $funcion; //string
    private $añosTrabajados; //int
    private $jubilar = false; //bool
    private $codEmpleado; //string

}

private function CalcularJubilacion(){
    
}