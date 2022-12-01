<?php
	session_start();
	if (!isset($_SESSION['veiculosCreados'])) {
		$_SESSION['veiculosCreados']=0;
	}
	if (!isset($_SESSION['kilometrosTotales'])) {
		$_SESSION['kilometrosTotales']=0;
	}

	abstract class Vehiculo {
		/*private static $veiculosCreados=0;
		private static $kilometrosTotales=0;*/

		public static function getVehiculosCreados() {
			//return Vehiculo::$veiculosCreados;
			return $_SESSION['veiculosCreados'];
		}
		public static function getKilometrosTotales() {
			//return Vehiculo::$kilometrosTotales;
			return $_SESSION['kilometrosTotales'];
		}
		public static function aumentaUnVehiculoCreado() {
			//return $veiculosCreados++;
			$_SESSION['veiculosCreados']++;
		}
		public static function aumentaKilometrosTotales($kilometros) {
			//return $kilometrosTotales+=$kilometros;
			$_SESSION['kilometrosTotales']+=$kilometros;
		}

		private $kilometros;

		public function __construct($kilometros=0) {
			$this->kilometros = $kilometros;
			Vehiculo::aumentaUnVehiculoCreado();
			Vehiculo::aumentaKilometrosTotales($kilometros);
		}

		public function getKilometros() {
			return $this->kilometros;
		}

		public function recorrerKilometros($kilometros) {
			$this->kilometros += $kilometros;
			Vehiculo::aumentaKilometrosTotales($kilometros);
			return "ha andado ".$kilometros."Km";
		}

		public function __toString() {
			return "tiene ".$this->kilometros."Km";
		}
	}
 ?>