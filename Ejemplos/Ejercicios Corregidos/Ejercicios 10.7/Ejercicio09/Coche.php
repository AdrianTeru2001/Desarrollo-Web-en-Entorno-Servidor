<?php
session_start();
  if (!isset($_SESSION['modeloCaro'])) {
   $_SESSION['modeloCaro'] = "ninguno";
   $_SESSION['precioCaro'] = 0;
  }
   
  class Coche {
    private $matricula;
    private $modelo;
    private $precio;
    
    public function __construct($mat,$mod,$precio) {
      $this->matricula = $mat;
      $this->modelo= $mod;
      $this->precio= $precio;
      if ($precio>$_SESSION['precioCaro']) {
        $_SESSION['modeloCaro']=$mod;
        $_SESSION['precioCaro']=$precio;
      }
    }
    public static function masCaro(){
      return "Modelo: ".$_SESSION['modeloCaro']."Precio: ".$_SESSION['precioCaro'];
    }
    
    
    public function getMatricula(){
        return $this->matricula;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function getPrecio(){
        return $this->precio;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
        if ($precio>$_SESSION['precioCaro']) {
        $_SESSION['modeloCaro']=$this->modelo;
        $_SESSION['precioCaro']=$precio;
      }
    }
    public function __toString (){
      return "<td>".$this->matricula."</td><td>".$this->modelo."</td><td>".$this->precio."</td>";
    }
}
  ?>
