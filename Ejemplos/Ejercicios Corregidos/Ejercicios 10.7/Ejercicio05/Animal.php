<?php 
	abstract class Animal {
		private $nombre;
		private $esMacho;

		public function __construct($nombre, $esMacho) {
			$this->nombre = $nombre;
			$this->esMacho = $esMacho;
		}

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getEsMacho() {
        return $this->esMacho;
    }
    public function setEsMacho($esMacho) {
        $this->esMacho = $esMacho;
    }

		public function comer() {
			return "MMM... Gracias por darme de comer.";
		}
		public function asearse() {
			return "Bien ya me he aseado. ¡Estoy mas limpioo que nunca!";
		}
		public function duerme() {
			return "ZZZ ZZZ ZZZ";
		}

		public function __toString() {
			if ($this->esMacho) {
				$sexo="macho";
			} else {
				$sexo="hembra";
			}
			return $sexo." y me llamo ".$this->nombre;
		}
	}
 ?>