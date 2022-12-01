<?php 
	include_once 'Mamifero.php';

	class Perro extends Mamifero {
		
		public function __construct($nombre, $esMacho) {
			parent::__construct($nombre, $esMacho);
		}

		public function grunie() {
			return "GRRR";
		}
		public function ladra() {
			return "GUAU GUAU";
		}
		public function muerde() {
			return "Aañññ";
		}
		public function irPorPelota() {
			return $this->ladra()." ".parent::correr().", voy por la pelota!";

		}

		public function __toString() {
			return "Soy un perro ".parent::__toString();
		}
	}
 ?>