<?php 
	include_once 'Bombilla.php';
?>
<table border="1">
<tr>
<?php
	for ($i=0; $i < count($_SESSION['bombillas']); $i++) { 
		echo "<td><table>";
		$bombilla=$_SESSION['bombillas'][$i];?>
		<th><?php echo $bombilla->getUbicacion(); ?></th>
		<tr><td>
			<a href="CambiaEstadoBombillas.php?bombilla=<?php echo $i ?>">
			<!-- El siguiente if usa : en vez de {} y esta forma se puede usar cuando lo que va dentro del if no es código php -->
			<?php if ($bombilla->getEstaEncendida()): ?>
				<img src="Images/bombilla-encendida.png" alt="encendida">
			<?php else: ?>
				<img src="Images/bombilla-apagada.png" alt="apagada">
			<?php endif ?>
			</a>
		</td></tr>
		<tr><td>
			<form action="CambiaEstadoBombillas.php" method="get">
				<input type="hidden" name="bombilla" value="<?php echo $i; ?>">
				<input type="hidden" name="accion" value="encender">
				<input type="submit" value="Encender">
			</form><form action="CambiaEstadoBombillas.php" method="get">
				<input type="hidden" name="bombilla" value="<?php echo $i; ?>">
				<input type="hidden" name="accion" value="apagar">
				<input type="submit" value="Apagar">
			</form>
		</td></tr>
		<tr><td>
			<b>Potencia:</b> <?php echo $bombilla->getPotencia() ?>W<br>
			<b>Gasto:</b> <?php echo $bombilla->gastoActual() ?>W
		</td></tr>
		<?php
		echo "</table></td><td>";
		if (($i+1)%5==0) {
			echo "</tr><tr>";
		}
	}
?>
</td></tr>
</table>