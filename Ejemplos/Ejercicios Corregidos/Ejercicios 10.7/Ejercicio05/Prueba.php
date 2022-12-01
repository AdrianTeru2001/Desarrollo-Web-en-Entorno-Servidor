<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php 
			include_once 'Canario.php';
			include_once 'Gato.php';
			include_once 'Lagarto.php';
			include_once 'Perro.php';
			include_once 'Pinguino.php';

			echo "<h1>Clase Canario</h1>";
			$canario1 = new Canario("Piolin", true, false);
			echo $canario1."<br>";
			echo $canario1->pica("pierna")."<br>";
			echo $canario1->pica("oreja")."<br>";
			echo $canario1->canta()."<br>";
			echo $canario1->comer()."<br>";
			echo $canario1->isEstoyVolando()."<br>";
			echo $canario1->incubarHuevo()."<br>";
			echo $canario1->pararDeVolar()."<br>";

			echo "<h1>Clase Gato</h1>";
			$gato1 = new Gato("Garfil", true);
			echo $gato1."<br>";
			echo $gato1->maullar()."<br>";
			echo $gato1->jugar()."<br>";
			echo $gato1->araniar()."<br>";
			echo $gato1->darDeMamar()."<br>";
			echo $gato1->saltar()."<br>";
			echo $gato1->asearse()."<br>";

			echo "<h1>Clase Lagarto</h1>";
			$lagarto1 = new Lagarto("Juancho", true, false);
			echo $lagarto1."<br>";
			echo $lagarto1->tomarElSol()."<br>";
			echo $lagarto1->isEstoyEscondido()."<br>";
			echo $lagarto1->esconderse()."<br>";
			echo $lagarto1->esconderse()."<br>";
			echo $lagarto1->salirDeEscondite()."<br>";
			echo $lagarto1->salirDeEscondite()."<br>";
			echo $lagarto1->duerme()."<br>";

			echo "<h1>Clase Perro</h1>";
			$perro1 = new Perro("Goofy", false);
			echo $perro1."<br>";
			echo $perro1->grunie()."<br>";
			echo $perro1->ladra()."<br>";
			echo $perro1->muerde()."<br>";
			echo $perro1->irPorPelota()."<br>";
			echo $perro1->darDeMamar()."<br>";
			echo $perro1->saltar()."<br>";
			echo $perro1->correr()."<br>";
			echo "Me llamo ".$perro1->getNombre()."<br>";

			echo "<h1>Clase Pinguino</h1>";
			$pinguino1 = new Pinguino("Pingu", true);
			echo $pinguino1."<br>";
			echo $pinguino1->asearse()."<br>";
			echo $pinguino1->vuela()."<br>";
			echo $pinguino1->pia()."<br>";
			echo $pinguino1->nada()."<br>";
			echo $pinguino1->anda()."<br>";
			echo $pinguino1->isEstoyVolando()."<br>";
			echo $pinguino1->pararDeVolar()."<br>";
			echo $pinguino1->incubarHuevo()."<br>";
			echo $perro1->comer()."<br>";
		 ?>
	</body>
</html>