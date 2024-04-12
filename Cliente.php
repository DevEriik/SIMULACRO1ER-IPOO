<?php 

class Cliente{
    //! ATRIBUTOS
    private $nombre;
    private $apellido;
    private $activoSN;
    private $genero;
    private $dni;

    /** 
     * ! **********************************************************************
     * ! *************************** CONSTRUCTOR ******************************
     * ! **********************************************************************
     */

     public function __construct($nombre, $apellido, $activoSN, $genero, $dni){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->activoSN = $activoSN;
        $this->genero = $genero;
        $this->dni = $dni;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO GETTER ****************************
     * ! **********************************************************************
     */

     public function getNombre(){
        return $this->nombre;
     }

     public function getApellido(){
        return $this->apellido;
     }

     public function getActivoSN(){
        return $this->activoSN;
     }

     public function getGenero(){
        return $this->genero;
     }

     public function getDni(){
        return $this->dni;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO SETTER ****************************
     * ! **********************************************************************
     */

     public function setNewNombre($nuevoNombre){
        $this->nombre = $nuevoNombre;
     }

     public function setNewApellido($nuevoApellido){
        $this->apellido = $nuevoApellido;
     }

     public function setNewActivoSN($nuevoActivo){
        $this->activoSN = $nuevoActivo;
     }

     public function setNewGenero($nuevoGenero){
        $this->genero = $nuevoGenero;
     }

     public function setNewDni($nuevoDni){
        $this->dni = $nuevoDni;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO __toString ************************
     * ! **********************************************************************
     */

     public function __toString(){
        return  "---------------CLIENTE--------------- \n" .
                "Nombre: " . $this->getNombre() . "\n". 
                "Apellido: " . $this->getApellido() . "\n". 
                "Cliente activo: " . $this->getActivoSN() . "\n". 
                "Genero: " . $this->getGenero() . "\n". 
                "Numero DNI: " . $this->getDni() . "\n". 
                "------------------------------------- \n";
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODOS **********************************
     * ! **********************************************************************
     */
}