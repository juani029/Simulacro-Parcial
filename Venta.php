<?php

class Venta
{
    private $numero;
    private $fecha;
    private $objCliente;
    private $col_objMoto;
    private $precioFinal;

    public function __construct($numero, $fecha, Cliente $objCliente)
    {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->col_objMoto = array();
        $this->precioFinal = 0;
    }

    public function __toString()
    {
        return "Numero: " . $this->getNumero() . "\n Fecha: " . $this->getFecha() . "\n Cliente" . $this->getObjCliente() . "\n Precio Final: " . $this->getPrecioFinal() . "\n";
    }

    //Getters
    public function getNumero()
    {
        return $this->numero;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getObjCliente()
    {
        return $this->objCliente;
    }

    public function getCol_objMoto()
    {
        return $this->col_objMoto;
    }

    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }

    //Setters

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;
    }

    public function setCol_objMoto($col_objMoto)
    {
        // print_r($col_objMoto);
        $this->col_objMoto = $col_objMoto;
    }

    public function setPrecioFinal($precioFinal)
    {
        $this->precioFinal = $precioFinal;
    }

    // metodos

    public function incorporarMoto($objMoto)
    {
        if ($objMoto->darPrecioVenta() > 0 && $this->getObjCliente()->getDadoDeBaja() == false) {
            $coleccionMotos = $this->getCol_objMoto();
            array_push($coleccionMotos, $objMoto);
            $this->setCol_objMoto($coleccionMotos);
            $precioMoto = $objMoto->darPrecioVenta();
            $this->setPrecioFinal($this->getPrecioFinal() + $precioMoto);
        }
    }
}
