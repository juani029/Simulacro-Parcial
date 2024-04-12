<?php
include_once('Moto.php');
include_once('Venta.php');
include_once('Cliente.php');
include_once('Empresa.php');

$objCliente1 = new Cliente("Juan", "Perez", false, "33123432", "Masculino");
$objCliente2 = new Cliente("Pedro", "Lopez", false, "24675898", "Masculino");

$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

$col_objMoto = array($objMoto1, $objMoto2, $objMoto3);
$col_objCliente = array($objCliente1, $objCliente2);

$empresa = new Empresa("Alta Gama", "Av Argentina 123", $col_objCliente, $col_objMoto, []);

echo "\n*********************\n";
echo "precio final: " . $empresa->registrarVenta([11, 12, 13], $objCliente2) . "\n\n";
echo "Precio final: " . $empresa->registrarVenta([0], $objCliente2) . "\n\n";
echo "Precio final: " . $empresa->registrarVenta([2], $objCliente2) . "\n";
echo "*********************\n\n";

$colVentasCliente = $empresa->retornarVentasXCliente("Masculino", "24675898");
if (count($colVentasCliente) == 0) {
    echo "No hay ventas para el cliente " . $objCliente2->getNombre() . "\n";
} else {
    echo "*********************\n";
    echo "Cantidad de Ventas: " . count($colVentasCliente) . "\n";
    echo "Ventas al cliente " . $objCliente2->getNombre() . ":\n\n";
    echo $empresa->convertirArregloVentasAString($colVentasCliente);
    echo "*********************\n\n";
}

$colVentasCliente2 = $empresa->retornarVentasXCliente("Masculino", "33123432");
echo "*********************\n";
if (count($colVentasCliente2) == 0) {
    echo "No hay ventas para el cliente " . $objCliente1->getNombre() . "\n";
} else {
    echo "Cantidad de Ventas: " . count($colVentasCliente2) . "\n";
    echo "Ventas al cliente " . $objCliente1->getNombre() . ":\n";
    echo $empresa->convertirArregloVentasAString($colVentasCliente2);
}
echo "*********************\n\n";

echo $empresa;
