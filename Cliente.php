<?php

class Cliente
{
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipo;
    private $dni;

    public function __construct($nombre, $apellido, $dadoDeBaja, $dni, $tipo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->dni = $dni;
        $this->tipo = $tipo;
    }

    public function __toString()
    {
        $dadoDeBaja = $this->getDadoDeBaja() ? "Si" : "No";
        return "Nombre: " . $this->getNombre() . "\nApellido: " . $this->getApellido() . "\nDado de baja: " . $dadoDeBaja . "\nDNI: " . $this->getDni() . "\nTipo: " . $this->getTipo();
    }

    //getters

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getDadoDeBaja()
    {
        return $this->dadoDeBaja;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    //setters

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setDadoDeBaja($dadoDeBaja)
    {
        $this->dadoDeBaja = $dadoDeBaja;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
}
