<?php
include_once 'Venta.php';
class Empresa{
    //!ATRIBUTOS
    private $denominacion;
    private $direccion;
    private $col_clientes; //TODO:Coleccion de clientes
    private $col_motos; //TODO: Coleccion de motos
    private $col_ventasR; //TODO: Coleccion de ventas

    /** 
     * ! **********************************************************************
     * ! *************************** CONSTRUCTOR ******************************
     * ! **********************************************************************
     */

     public function __construct($denominacion, $direccion, $col_clientes, $col_motos){
        $this->denominacion = $denominacion; 
        $this->direccion = $direccion;
        $this->col_clientes = $col_clientes;
        $this->col_motos = $col_motos;
        $this->col_ventasR = []; 
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO GETTER ****************************
     * ! **********************************************************************
     */

     public function getDenominacion(){
        return $this->denominacion;
     }

     public function getDireccion(){
        return $this->direccion;
     }

     public function getCol_clientes(){
        return $this->col_clientes;
     }

     public function getCol_motos(){
        return $this->col_motos;
     }

     public function getCol_ventasR(){
        return $this->col_ventasR;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO SETTER ****************************
     * ! **********************************************************************
     */

     public function setNewDenominacion($nuevaDenominacion){
        $this->denominacion = $nuevaDenominacion;
     }

     public function setNewDireccion($nuevaDireccion){
        $this->direccion = $nuevaDireccion;
     }

     public function setNewCol_clientes($nuevaColClientes){
        $this->col_clientes = $nuevaColClientes;
     }

     public function setNewCol_motos($nuevaColMotos){
        $this->col_motos = $nuevaColMotos;
     }

     public function setNewCol_ventarR($nuevasColVentasR){
        $this->col_ventasR = $nuevasColVentasR;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO __toString ************************
     * ! **********************************************************************
     */

     public function __toString(){
        return "------------EMPRESA-------------\n". 
              "Denomicación: " . $this->getDenominacion() . "\n" . 
              "Dirección: " . $this->getDireccion() . "\n". 
              "Clientes: \n" . $this->convertirAString($this->getCol_clientes()) . "\n". 
              "Motos: \n" . $this->convertirAString($this->getCol_motos()). "\n". 
              "Todas las ventas: \n". $this->convertirAString($this->getCol_ventasR()). "\n". 
              "--------------------------------\n";
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODOS **********************************
     * ! **********************************************************************
     */

     public function retornarMoto($codigoMoto){
        $colec_motos = $this->getCol_motos();
        $arrojarMoto = null;
        foreach ($colec_motos as $moto) {
            if ($moto->getCodigoM() == $codigoMoto) {
                $arrojarMoto = $moto;
            }
        }
        return $arrojarMoto; 
     }

     
     public function registrarVenta($colCodigoMoto, $objCliente){
         $fecha = date("d-m-Y");
         $objVenta = new Venta(1, $fecha, $objCliente, [], 0); //*Se crea un obj venta
         
         foreach ($colCodigoMoto as $codigo) { // *Se recorre la coleccion de codigos

            $objMoto = $this->retornarMoto($codigo); //* Se crea un objMoto que le retorna las motos con el codigo dado
            if ($objMoto != null) {
               if ($objMoto->getActiva() && $objCliente->getActivoSN() == false) { 
                  $objVenta->incorporarMoto($objMoto); //* Si la moto esta activa y el cliente es activo, se incorpora la moto al objVenta
                  
               }  
            }
              
         }
         $colec_ventas = $this->getCol_ventasR(); //* Se obtiene lla coleccion de ventas realizadas en una variable
         array_push($colec_ventas, $objVenta); //* Se le pushea una venta a la coleccion de ventas realizadas.
         $this->setNewCol_ventarR($colec_ventas);//* Se le setea la nueva venta a la coleccion venta.

         return $objVenta->getPrecioFinal();
     }

     /** 
      * Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
      *  número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente. 
      */
     public function retornarVentaXCliente($tipo, $numDoc){
        $colec_ventas = $this->getCol_ventasR();
        $colec_ventasXCliente = [];
        foreach ($colec_ventas as $ventas) {
            $ventasR = $ventas;
            echo $ventasR;
            if ($ventas->getObjCliente()->getDni() == $numDoc) {
                array_push($colec_ventasXCliente, $ventas);
            }
        }
        $enString = $this->convertirAString($colec_ventasXCliente);
      //   return $enString;
     }



     public function convertirAString($col){
        $cadena = "";
        foreach ($col as $elemento) {
            $cadena .= $elemento;

        }
        return $cadena;
     }
}




// $ventasXCliente = [];
//          $colec_ventas = $this->getCol_ventasR();
//          foreach ($colec_ventas as $ventas) {
//             print_r($colec_ventas);
//          }