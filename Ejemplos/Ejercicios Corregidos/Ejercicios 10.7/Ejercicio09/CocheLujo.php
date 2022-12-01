<?php

  include_once 'Coche.php';
  class CocheLujo extends Coche{
    private $suplemento=0;
    
    public function __construct($mat,$mod,$precio,$sup) {
      $this->suplemento = $sup;
      parent::__construct($mat,$mod,$precio);
    }
    
    public function getPrecio(){
        return parent::getPrecio() + $this->suplemento;
    }
    
    public function __toString(){
      return parent::__toString()."<td>".$this->suplemento."</td>";
      //return "<td>".parent::getMatricula()."</td><td>".parent::getModelo()."</td><td>".$this->getPrecio()."</td><td>".$this->suplemento."</td>";
    }
  }