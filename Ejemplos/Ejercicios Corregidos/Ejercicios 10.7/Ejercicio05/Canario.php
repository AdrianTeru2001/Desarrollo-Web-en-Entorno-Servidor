<?php 
	include_once 'Ave.php';

	class Canario extends Ave {
		
		public function __construct($nombre, $esMacho, $estoyVoando) {
			parent::__construct($nombre, $esMacho, $estoyVoando);
		}

		public function pica($quePico) {
			if ($quePico=="oreja" || $quePico=="dedo") {
				return "Te va a doler,  AAANNN";
			} else {
				return "Lo siento, solo pico orejas y dedos";
			}
		}
		public function canta() {
			return "Pio pio pio";
		}

		public function __toString() {
			return "Soy un canario ".parent::__toString();
		}
	}
 ?>