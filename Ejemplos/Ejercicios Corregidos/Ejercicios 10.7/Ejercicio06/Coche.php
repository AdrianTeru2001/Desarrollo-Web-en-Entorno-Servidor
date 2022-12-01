<?php
	include_once 'Vehiculo.php';

	class Coche extends Vehiculo {
		private $marca;
		private $modelo;

		public function __construct($marca, $modelo, $kilometros) {
			$this->marca = $marca;
			$this->modelo = $modelo;
			parent::__construct($kilometros);
		}

		public function recorrerKilometros($kilometros) {
			return "El coche ".$this->marca." ".$this->modelo." ".parent::recorrerKilometros($kilometros);
		}

		public function acelerar() {
			return "¡Brrrum! Estoy acelerando.";
		}
		public function bajarVentanillas() {
			return "Que fresquito hace con las ventanillas bajadas.";
		}
		public function quemarRuedas() {
			return "Ñiiiiiiiieeeeeeeeeec";
		}

		public function __toString() {
			return "El coche ".$this->marca." ".$this->modelo." ".parent::__toString();
		}
	}
 ?>