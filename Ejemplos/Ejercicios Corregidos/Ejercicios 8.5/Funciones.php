<?php
	function  escribirTresNumeros($n1, $n2, $n3) {
		$fNumeros = fopen("Ficheros/NumerosFunciones.txt", "w");
		fputs($fNumeros, $n1.PHP_EOL);
		fputs($fNumeros, $n2.PHP_EOL);
		fputs($fNumeros, $n3.PHP_EOL);
		fclose($fNumeros);
	}
	function  obtenerSuma($ruta) {
		if (file_exists($ruta)) {
			$fNumeros = fopen($ruta, "r");
			$suma = 0;
			while (!feof($fNumeros)) {
				$suma+=(int)fgets($fNumeros);
			}
			fclose($fNumeros);
		} else {
			$suma = -1;
			echo "El fichero NOOO existe<br>";
		}
		return $suma;
	}
	function  obtenerArrNum($ruta) {
		$fNumeros = fopen($ruta, "r");
		$numeros = array();
		while (!feof($fNumeros)) {
			$numeros[]=(int)fgets($fNumeros);
		}
		fclose($fNumeros);
		return $numeros;
	}
	function escribirNumerosMod($nums, $accion) {
		if ($accion=="sobreescribir") {
			$fichero=fopen("Ficheros/datosEjercicio.txt", "w");
			foreach ($nums as $num) {
				fputs($fichero, $num.PHP_EOL);
			}
			fclose($fichero);
		} else if ($accion=="ampliar") {
			$fichero=fopen("Ficheros/datosEjercicio.txt", "a");
			foreach ($nums as $num) {
				fputs($fichero, $num.PHP_EOL);
			}
			fclose($fichero);
		}
	}
	function leerContenidoFichero($ruta) {
		if (file_exists($ruta)) {
			$fichero=fopen($ruta, "r");
			echo "Contenido de fichero:<br>";
			echo "<pre>";
			while (!feof($fichero)) {
				echo fgets($fichero);
			}
			echo "</pre>";
			fclose($fichero);
		} else {
			echo "El fichero no existe.";
		}
	}
?>