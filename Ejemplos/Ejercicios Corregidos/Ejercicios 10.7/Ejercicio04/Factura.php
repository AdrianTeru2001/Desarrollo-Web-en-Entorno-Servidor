<?php 
// Si la aplicación recarga la página se pierde el valor el las variables de clase por lo que habría que usar sesiones
/* 
session_start();
	if (!isset($_SESSION['IVA'])) {
 		$_SESSION['IVA']=0.21;
	}
*/
	class Factura {
		private static $IVA=0.21;  //se sustituye por la variable de sesion si hubiera recarga de páginas

		public static function getIVA() {
			return Factura::$IVA;
//			return $_SESSION['IVA'];
		}
		public static function setIVA($iva) {
			Factura::$IVA=$iva;
//			$_SESSION['IVA']=$iva;
		}

		private $importeBase;
		private $fecha;
		private $pagada;
		private $productos;

		function __construct($fecha) {
			$this->importeBase=0;
			$this->fecha=$fecha;
			$this->pagada=false;
			$this->productos=[];
		}

    public function getImporteBase() {
      return $this->importeBase;
    }
    public function getFecha() {
      return $this->fecha;
    }
    public function getPagada() {
      return $this->pagada;
    }
    public function getProductos() {
      return $this->productos;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function pagar() {
        $this->pagada = true;
    }


    public function aniadeProducto($nombre, $precio, $cantidad) {
    	$this->productos[]=[$nombre, $precio, $cantidad];
    	$this->importeBase+=$precio*$cantidad;
    }

    public function imprimirFactura() { ?>
			<table>
				<tr>
					<th colspan="4">Factura con fecha: <?= $this->fecha ?></th>
				</tr>
				<tr>
					<th>Producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Total</th>
				</tr>
				<?php foreach ($this->productos as $producto) { ?>
					<tr>
						<td><?php echo $producto[0] ?></td>
						<td><?php echo $producto[1] ?>€</td>
						<td style="text-align: center;"><?php echo $producto[2] ?></td>
						<td style="text-align: right;"><?php echo ($producto[2]*$producto[1]) ?>€</td>
					</tr>
				<?php } ?>
				<tr>
					<td colspan="2"></td>
					<td>Importe base: </td>
					<td style="text-align: right;"><?php echo $this->importeBase ?>€</td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td>Total (+IVA): </td>
					<td style="text-align: right;"><?php echo ($this->importeBase*(1+Factura::getIVA())) ?>€</td>
				</tr>
				<tr>
					<td colspan="4">
						<?php if ($this->pagada): ?>
							<h2 style="text-align: right; color:green;">PAGADA</h2>
						<?php else: ?>
							<h2 style="text-align: right; color:red;">PENDIENTE DE PAGO</h2>
						<?php endif ?>
					</td>
				</tr>
			</table>
    <?php }
	}
 ?>