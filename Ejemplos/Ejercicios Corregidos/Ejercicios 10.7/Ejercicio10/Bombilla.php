<?php 
	session_start();
	if (!isset($_SESSION['generalActivo'])) {
		$_SESSION['generalActivo']=true;
	}
	if (!isset($_SESSION['potenciaGeneral'])) {
		$_SESSION['potenciaGeneral']=0;
	}
	class Bombilla {
		public static function getGeneral() {
			return $_SESSION['generalActivo'];
		}
		public static function getPotenciaGeneral() {
			if ($_SESSION['generalActivo']) {
				return $_SESSION['potenciaGeneral'];
			} else {
				return 0;
			}
		}
		public static function desactivarGeneral() {
			$_SESSION['generalActivo']=false;
		}
		public static function activarGeneral() {
			$_SESSION['generalActivo']=true;
		}
		public static function aumentarPotenciaGeneral($cantidad) {
			$_SESSION['potenciaGeneral']+=$cantidad;
		}
		public static function disminuirPotenciaGeneral($cantidad) {
			$_SESSION['potenciaGeneral']-=$cantidad;
		}


		private $estaEncendida;
		private $potencia;
		private $ubicacion;

		public function __construct($estaEncendida, $potencia, $ubicacion) {
			$this->estaEncendida=$estaEncendida;
			$this->potencia=$potencia;
			$this->ubicacion=$ubicacion;
			if ($estaEncendida) {
				Bombilla::aumentarPotenciaGeneral($potencia);
			}
		}

    public function getEstaEncendida() {
      if (Bombilla::getGeneral()) {
      	return $this->estaEncendida;
      } else {
      	return false;
      }
    }
    public function getPotencia() {
      return $this->potencia;
    }
    public function getUbicacion() {
      return $this->ubicacion;
    }
    public function setPotencia($potencia) {
      if ($this->estaEncendida) {
      	Bombilla::disminuirPotenciaGeneral($this->potencia);
      	Bombilla::aumentarPotenciaGeneral($potencia);
      }
      $this->potencia = $potencia;
    }
    public function setUbicacion($ubicacion) {
      $this->ubicacion = $ubicacion;
    }

    public function gastoActual() {
      if ($this->getEstaEncendida()) {
      	return $this->potencia;
      } else {
      	return 0;
      }
    }
    public function cambiarEstado() {
    	if ($this->estaEncendida) {
    		Bombilla::disminuirPotenciaGeneral($this->potencia);
    	} else {
    		Bombilla::aumentarPotenciaGeneral($this->potencia);
    	}
    	$this->estaEncendida = !$this->estaEncendida;
    }
    public function encender() {
    	if (!$this->estaEncendida) {
	    	$this->estaEncendida = true;
	    	Bombilla::aumentarPotenciaGeneral($this->potencia);
    	}
    }
    public function apagar() {
    	if ($this->estaEncendida) {
	    	$this->estaEncendida = false;
    		Bombilla::disminuirPotenciaGeneral($this->potencia);
    	}
    }

	}
 ?>