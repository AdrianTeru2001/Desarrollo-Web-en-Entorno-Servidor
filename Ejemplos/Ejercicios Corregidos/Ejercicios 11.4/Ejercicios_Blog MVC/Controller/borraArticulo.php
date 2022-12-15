<?php 
include "../Model/Articulos.php";
$articulo=new Articulos($_REQUEST['codigo']);
$articulo->delete();
header("location: index.php");