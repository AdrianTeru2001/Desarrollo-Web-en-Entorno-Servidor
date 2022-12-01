<?php 
	include_once 'Animal.php';

	class Lagarto extends Animal {
		private $estoyEscondido;
		
		public function __construct($nombre, $esMacho, $estoyEscondido) {
			$this->estoyEscondido = $estoyEscondido;
			parent::__construct($nombre, $esMacho);
		}

		public function getEstoyEscondido() {
      return $this->estoyEscondido;
    }
    public function setEstoyEscondido($estoyEscondido) {
      $this->estoyEscondido = $estoyEscondido;
    }

		public function tomarElSol() {
			return "Estoy tomando el sol por que soy de sangre fria.";
		}
		public function isEstoyEscondido() {
			if ($this->estoyEscondido) {
				return "Estoy escondido.";
			} else {
				return "No estoy escondido.";
			}
		}
		public function esconderse() {
			if ($this->estoyEscondido) {
				return "Ya estoy escondido de antes.";
			} else {
				$this->estoyEscondido = true;
				return "Voy a esconderme.";
			}
		}
		public function salirDeEscondite() {
			if ($this->estoyEscondido) {
				$this->estoyEscondido = false;
				return "Voy a salir fuera.";
			} else {
				return "No estaba escondido.";
			}
		}

		public function __toString() {
			return "Soy un lagarto ".parent::__toString();
		}
	}
 ?>