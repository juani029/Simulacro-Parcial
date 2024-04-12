<?php

class Moto
{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }

    public function __toString()
    {
        $activa = $this->getActiva() ? "Si" : "No";
        return "Codigo: " . $this->getCodigo() . "\nCosto: " . $this->getCosto() . "\nAnio de fabricacion: " . $this->getAnioFabricacion() . "\nPorcentaje de incremento anual: " . $this->getPorcentajeIncrementoAnual() . "\nActiva: " . $activa . "\n";
    }

    // getters

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function getAnioFabricacion()
    {
        return $this->anioFabricacion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPorcentajeIncrementoAnual()
    {
        return $this->porcentajeIncrementoAnual;
    }

    public function getActiva()
    {
        return $this->activa;
    }

    //setters

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function setAnioFabricacion($anioFabricacion)
    {
        $this->anioFabricacion = $anioFabricacion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual)
    {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }

    public function setActiva($activa)
    {
        $this->activa = $activa;
    }

    // metodos

    public function darPrecioVenta()
    {
        $_venta = -1;
        if ($this->getActiva() == true) {
            $_compra = $this->getCosto();
            $anio = 2024 - $this->getAnioFabricacion();
            $porc_inc_anual = $this->getPorcentajeIncrementoAnual() / 100; // 50/100 = 0.5
            $porc_total = $anio * $porc_inc_anual;                         // $porc_total = 5 * 0.5 = 2.5
            $incrementoTotal =  $_compra * $porc_total;                         // $incremento = 1000 * 2.5 = 2500
            $_venta = $_compra + $incrementoTotal;                              // $_venta = 1000 + 2500 = 3500
        }
        return $_venta;
    }
}
