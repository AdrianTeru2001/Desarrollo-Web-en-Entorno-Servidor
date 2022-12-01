<?php 
	/**
	 * 
	 */
	class Empleado {
		private $nombre;
		private $sueldo;
		
		function __construct($nombre="anonimo", $sueldo=0) {
			$this->nombre=($nombre==null) ? "anonimo" : $nombre ;
			$this->sueldo=($sueldo==null) ? 0 : $sueldo ;
		}

		public function asigna($nombre, $sueldo) {
				if ($this->nombre==$nombre) {
					$this->sueldo=$sueldo;
				}
		}
		
		public function __toString() {
			$salida= $this->nombre." cobra ".$this->sueldo;
			if ($this->sueldo>3000) {
				$salida.= " y paga impuestos.";
			} else {
				$salida.= " y NO paga impuestos.";
			}
			return $salida;
		}
	}
 ?>