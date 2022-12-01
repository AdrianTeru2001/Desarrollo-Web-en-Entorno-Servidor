<?php 
	include_once 'Animal.php';

	abstract class Ave extends Animal {
		private $estoyVoando;

		public function __construct($nombre, $esMacho, $estoyVoando) {
			$this->estoyVoando = $estoyVoando;
			parent::__construct($nombre, $esMacho);
		}

		public function getEstoyVoando() {
      return $this->estoyVoando;
    }
    public function setEstoyVoando($estoyVoando) {
      $this->estoyVoando = $estoyVoando;
    }

		public function isEstoyVolando() {
			if ($this->estoyVoando) {
				return "Estoy volando.";
			} else {
				return "No estoy volando.";
			}
		}
		public function vuela() {
			if ($this->estoyVoando) {
				return "Ya estoy volando, devo parar de volar para poder volar de nuevo.";
			} else {
				$this->estoyVoando = true;
				return "FGFF, estoy volando.";
			}
		}
		public function pararDeVolar() {
			if ($this->estoyVoando) {
				$this->estoyVoando = false;
				return "UFF, cuanto he volado, voy a posarme en esa rama.";
			} else {
				return "No estoy volando.";
			}
		}
		public function incubarHuevo() {
			$this->pararDeVolar();
			return "Estoy incubando mi nido.";
		}

		public function __toString() {
			return "ave ".parent::__toString();
		}
	}
 ?>