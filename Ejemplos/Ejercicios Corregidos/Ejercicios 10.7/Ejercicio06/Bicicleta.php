<?php
	include_once 'Vehiculo.php';

	class Bicicleta extends Vehiculo {
		private $tipo;

		public function __construct($tipo, $kilometros) {
			$this->tipo = $tipo;
			parent::__construct($kilometros);
		}

		public function recorrerKilometros($kilometros) {
			return "La bicicleta de tipo ".$this->tipo." ".parent::recorrerKilometros($kilometros);
		}

		public function haderCaballito() {
			return "Estoy haciendo el caballito.";
		}
		public function soltarseDeManos() {
			return "!Estoy suelto de manos y no me caigoo!";
		}

		public function __toString() {
			return "La bicicleta de tipo ".$this->tipo." ".parent::__toString();
		}
	}
 ?>