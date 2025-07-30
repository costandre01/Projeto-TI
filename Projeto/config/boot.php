<?php
//Usar o get para referenciar as paginas
session_start();

$page = "";
if(isset($_GET['page'])) {
  $page = $_GET['page'];
}

$title = "";
if($page == "") {
  $title = "Login";
} elseif($page == "paineldecontrolo") {
  $title = "Painel de Controlo";
} elseif($page == "historico") {
  $title = "Histórico";
}
?>
