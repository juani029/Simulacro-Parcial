<?php

class Empresa
{
    private $denominacion;
    private $direccion;
    private $col_objCliente;
    private $col_objMoto;
    private $col_objVenta;

    public function __construct($denominacion, $direccion, $col_objCliente, $col_objMoto, $col_objVenta)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->col_objCliente = $col_objCliente;
        $this->col_objMoto = $col_objMoto;
        $this->col_objVenta = $col_objVenta;
    }

    public function __toString()
    {
        $col_clientes = $this->convertirArregloClientesAString($this->col_objCliente);
        $col_motos = $this->convertirArregloMotosAString($this->col_objMoto);
        $col_ventas = $this->convertirArregloVentasAString($this->col_objVenta);

        return "Denominacion: " . $this->getDenominacion() . "\nDireccion: " . $this->getDireccion() . "\n\nClientes:\n" . $col_clientes . "\nColección de Motos:\n" . $col_motos . "\nVentas Realizadas:\n\n" . $col_ventas;
    }

    //getters

    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getCol_objCliente()
    {
        return $this->col_objCliente;
    }

    public function getCol_objMoto()
    {
        return $this->col_objMoto;
    }

    public function getCol_objVenta()
    {
        return $this->col_objVenta;
    }

    //setters

    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setCol_objCliente($col_objCliente)
    {
        $this->col_objCliente = $col_objCliente;
    }

    public function setCol_objMoto($col_objMoto)
    {
        $this->col_objMoto = $col_objMoto;
    }

    public function setCol_objVenta($col_objVenta)
    {
        $this->col_objVenta = $col_objVenta;
    }

    //metodos

    public function convertirArregloClientesAString($col_objCliente)
    {
        $string = "";
        foreach ($col_objCliente as $cliente) {
            $dadoDeBaja = $cliente->getDadoDeBaja() ? "Si" : "No";
            $string = $string . "\nNombre: " . $cliente->getNombre() . "\nApellido: " . $cliente->getApellido() . "\nDado de baja: " . $dadoDeBaja . "\nDNI: " . $cliente->getDni() . "\nTipo: " . $cliente->getTipo() . "\n";
        }
        return $string;
    }

    public function convertirArregloMotosAString($col_objMoto)
    {
        $string = "";

        foreach ($col_objMoto as $moto) {
            $activa = $moto->getActiva() ? "Si" : "No";
            $string = $string . "\nDescripcion: " . $moto->getDescripcion() . "\nCodigo: " . $moto->getCodigo() . "\nCosto: " . $moto->getCosto() . "\nAnio de fabricacion: " . $moto->getAnioFabricacion() . "\nPorcentaje de incremento anual: " . $moto->getPorcentajeIncrementoAnual() . "\nActiva: " . $activa . "\n";
        }
        return $string;
    }

    public function convertirArregloVentasAString($col_objVenta)
    {
        $string = "";
        foreach ($col_objVenta as $venta) {
            $string = $string . "Numero de Venta: " . $venta->getNumero() . "\nFecha de la Venta: " . $venta->getFecha() . "\nCliente:\n" . $venta->getObjCliente() . "\nPrecio Final: " . $venta->getPrecioFinal() . "\n";
        }
        return $string;
    }

    public function retornarMoto($codigoMoto)
    {
        $col_objMoto = $this->getCol_objMoto();
        foreach ($col_objMoto as $moto) {
            if ($moto->getCodigo() == $codigoMoto) {
                return $moto;
            }
        }
    }

    public function agregarVenta($objVenta)
    {
        if ($objVenta != null) {
            $col_objVenta = $this->getCol_objVenta();
            array_push($col_objVenta, $objVenta);
            $this->setCol_objVenta($col_objVenta);
        }
    }

    public function registrarVenta($colCodigosMoto, $objCliente)
    {
        $col_objMotoActual = [];
        foreach ($colCodigosMoto as $key => $codigoMoto) { // recorro la coleccion de codigos y me guardo la coleccion de motos que coincida
            $objMoto = $this->retornarMoto($codigoMoto);
            if ($objMoto != null) {
                array_push($col_objMotoActual, $objMoto);
            }
        }
        $numVenta = count($this->getCol_objVenta()) + 1;
        $fecha = date("Y-m-d"); // me guardo la fecha actual
        $objVenta = new Venta($numVenta, $fecha, $objCliente);
        foreach ($col_objMotoActual as $moto) {
            $objVenta->incorporarMoto($moto);
        }
        if ($objVenta->getPrecioFinal() > 0) {
            $this->agregarVenta($objVenta);
        }
        return $objVenta->getPrecioFinal();
    }

    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $col_objVenta = $this->getCol_objVenta();
        $col_objVentasRealizadas = [];
        foreach ($col_objVenta as $key => $objVenta) {
            if ($objVenta->getObjCliente()->getTipo() == $tipo && $objVenta->getObjCliente()->getDni() == $numDoc) {
                array_push($col_objVentasRealizadas, $objVenta);
            }
        }
        return $col_objVentasRealizadas;
    }
}
