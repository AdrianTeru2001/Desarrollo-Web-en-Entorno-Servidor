<?php
  require_once '../Model/Oferta.php';
  $ofertaAux = new Oferta($_GET['id'],null,null,null);
  $ofertaAux->delete();
  header("Location: index.php");