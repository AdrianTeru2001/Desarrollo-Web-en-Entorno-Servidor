<?php 
	class Menu {
		private $titulos;
		private $enlaces;

		public function __construct() {
			$this->titulos=[];
			$this->enlaces=[];
		}

		function aniadirElementos($titulo, $enlace) {
			$this->titulos[]=$titulo;
			$this->enlaces[]=$enlace;
		}

		public function mostrarMenuVertical() {
			$cadena="";
			for ($i=0; $i < count($this->titulos); $i++) {  
				$cadena.="<a href='".$this->enlaces[$i]."'>".$this->titulos[$i]."</a><br>";
			}
			return $cadena;
		}
		public function mostrarMenuHorizontal() {
			$cadena="";
			for ($i=0; $i < count($this->titulos); $i++) {  
				$cadena.="<a href='".$this->enlaces[$i]."'>".$this->titulos[$i]."</a> - ";
			}
			return $cadena;
		}
	}
 ?>