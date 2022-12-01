<?php 
	class Cubo {
		private $capacidad;
		private $contenido;

		function __construct($capacidad, $contenido) {
            $this->capacidad=$capacidad;
    		if ($capacidad>=$contenido) {
    			$this->contenido=$contenido;
        	}else{
    			$this->contenido=$capacidad;
        	}
		}

	public function getDisponible() {
		return $this->capacidad - $this->contenido;
	}	
    public function getCapacidad() {
        return $this->capacidad;
    }
    public function getContenido() {
        return $this->contenido;
    }
    public function setCapacidad($capacidad) {
        $this->capacidad = $capacidad;
    }
    public function setContenido($contenido) {
    	if ($this->capacidad>=$contenido) {
            $this->contenido = $contenido;
    	}else{
            $this->contenido=$this->capacidad;
        }
    }

    function verter($otro) {
    	$resto=$otro->getDisponible();
    	if ($resto>=$this->contenido) {
    		$otro->contenido+=$this->contenido;
    		$this->contenido=0;
    	} else {
    		$otro->contenido=$otro->capacidad;
    		$this->contenido-=$resto;
    	}
    }

    function __toString() {
    	return "Capacidad: ".$this->capacidad." Contenido:".$this->contenido;
    }
  }
 ?>