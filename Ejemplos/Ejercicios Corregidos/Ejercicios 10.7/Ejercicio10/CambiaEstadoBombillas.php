<?php 
	include_once 'Bombilla.php';

	if (isset($_GET['general'])) {
		if ($_GET['general']=="activar") {
			Bombilla::activarGeneral();
		} else {
			Bombilla::desactivarGeneral();
		}
	} else if (isset($_GET['bombilla'])) {
		if (isset($_GET['accion'])) {
			if ($_GET['accion']=="encender") {
				$_SESSION['bombillas'][$_GET['bombilla']]->encender();
			} else {
				$_SESSION['bombillas'][$_GET['bombilla']]->apagar();
			}
		} else {
			$_SESSION['bombillas'][$_GET['bombilla']]->cambiarEstado();
		}
	}
	header('Location:Prueba.php');
 ?>