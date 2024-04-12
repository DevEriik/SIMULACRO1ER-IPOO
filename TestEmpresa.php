<?php 
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'Venta.php';
include_once 'Empresa.php';

/** 
     * ! **********************************************************************
     * ! *************************** TESTING **********************************
     * ! **********************************************************************
     */

$objCliente1 = new Cliente("Eduardo", "Perez", true, "Masculino", 43372217);
$objCliente2 = new Cliente("Roxana", "Nievas", false, "Femenino", 41587624); 
// echo $objCliente1;
// echo $objCliente2;
$col_clientes = [$objCliente1, $objCliente2];
// print_r($col_clientes);
//* OBJETOS MOTOS

$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonia Eagle 250", 55, false);
// echo $objMoto1;
// echo $objMoto2;
// echo $objMoto3;
$col_motos = [$objMoto1, $objMoto2, $objMoto3];
//* OBJETO EMPRESA
$col_ventas = [];

$objEmpresa = new Empresa("Alta Gama", "Av Argentina 123", $col_clientes, $col_motos, $col_ventas);
echo $objEmpresa;

$col_codigos = [11,12,13];
$col_codigos2 = [0];
$col_codigos3 = [2];
echo $objEmpresa->registrarVenta($col_codigos, $objCliente2) . "\n";
echo $objEmpresa->registrarVenta($col_codigos2, $objCliente2);
echo $objEmpresa->registrarVenta($col_codigos3, $objCliente2);

echo $objEmpresa->retornarVentaXCliente("Masculino", 43372217);
echo $objEmpresa->retornarVentaXCliente("Femenino", 41587624);

