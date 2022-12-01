<?php 
	include_once 'Mamifero.php';

	class Gato extends Mamifero {
		
		public function __construct($nombre, $esMacho) {
			parent::__construct($nombre, $esMacho);
		}

		public function maullar() {
			return "MIAAUU";
		}
		public function jugar() {
			return "Estoy jugando con mi bola de lana.";
		}
		public function araniar() {
			return "GSHHH";
		}

		public function __toString() {
			return "Soy un gato ".parent::__toString();
		}
	}
 ?>