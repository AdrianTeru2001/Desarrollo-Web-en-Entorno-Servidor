<?php
	session_start();
	if (!isset($_SESSION['ingreso'])) {
		$_SESSION['ingreso']=0;
	}
	class Zona {
		public static function getIngreso() {
			return $_SESSION['ingreso'];
		}
		public static function ingresar($ingreso) {
			$_SESSION['ingreso']+=$ingreso;
		}
		private $nombre;
		private $entradasTotales;
		private $entradasActuales;
		private $precioEntrada;

		public function __construct($nombre, $entradasTotales, $precioEntrada) {
			$this->nombre=$nombre;
			$this->entradasTotales = $entradasTotales;
			$this->entradasActuales = $entradasTotales;
			$this->precioEntrada = $precioEntrada;
		}

		public function getEntradasActuales() {
			return $this->entradasActuales;
		}
		public function getEntradasVendidas() {
			return $this->entradasTotales - $this->entradasActuales;
		}
		public function getPrecioEntrada() {
			return $this->precioEntrada;
		}
		public function getNombre()
		{
			return $this->nombre;
		}

		public function venderEntradas($ventas) {
			if ($ventas <= $this->entradasActuales) {
				$this->entradasActuales -= $ventas;
				Zona::ingresar($ventas*$this->precioEntrada);
				return true;
			} else {
				return false;
			}
		}
	}
 ?>