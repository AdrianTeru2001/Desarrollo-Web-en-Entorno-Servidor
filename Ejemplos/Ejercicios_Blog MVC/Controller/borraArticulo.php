<?php 
include "../Model/Articulos.php";
$articulo=new Articulos($_GET['codigo']);
$articulo->delete();
header("location: index.php");