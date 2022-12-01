<?php 
	include_once 'Animal.php';

	abstract class Mamifero extends Animal {
		
		public function __construct($nombre, $esMacho) {
			parent::__construct($nombre, $esMacho);
		}

		public function darDeMamar() {
			if (!$this->getEsMacho()) {
				return "Ya les di de comer esta mañana a mis crias.";
			} else {
				return "No puedo dar de mamar por que soy macho.";
			}
		}
		public function saltar() {
			return "HOB";
		}
		public function correr() {
			return "Chun!";
		}

		public function __toString() {
			return "mamífero ".parent::__toString();
		}
	}
 ?>