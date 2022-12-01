<?php
	session_start();
	if (!isset($_SESSION['tiradasTotales'])) {
		$_SESSION['tiradasTotales']=0;
		$_SESSION['caras']=['As','K','Q','J','7','8'];
	}

	class DadoPoker {

		public static function getTiradasTotales() {
			return $_SESSION['tiradasTotales'];
		}

			
		private $numSacado;

		function __construct() {
			$this->tirar();
		}

		public function getNumSacado(){
			return $_SESSION['caras'][$this->numSacado];
		}

		public function tirar() {
			$this->numSacado = rand(0, 5);
			$_SESSION['tiradasTotales']++;
		}
	}
 ?>