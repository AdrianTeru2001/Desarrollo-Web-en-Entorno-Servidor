<?php 
	include_once 'Ave.php';

	class Pinguino extends Ave {
		
		public function __construct($nombre, $esMacho) {
			parent::__construct($nombre, $esMacho, false);
		}

		public function asearse() {
			return "Ya estoy aseado por que vengo del mar.";
		}
		public function vuela() {
			return "No puedo volar por que soy un pinguino.";
		}
		public function pia() {
			return "Pio pio";
		}
		public function nada() {
			return "Estoy nadando.";
		}
		public function anda() {
			return "Estoy andando.";
		}

		public function __toString() {
			return "Soy un pingüino ".parent::__toString();
		}
	}
 ?>