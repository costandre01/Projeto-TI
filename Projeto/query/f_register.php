<?php
session_start();

//Guardar as variaveis num ficheiro de texto
if(isset($_POST["register"])) {
  $register_username = $_POST["register_username"];
  $register_password = hash("sha512", $_POST["register_password"]);
  $register_nivel = $_POST["register_nivel"];

  $filename = "../files/credenciais.txt";

  $myfile = fopen($filename, "a") or die("Não consegui criar o ficheiro!");
  fwrite($myfile, $register_username . "\n" . $register_password . "\n" . $register_nivel . "\n");
  fclose($myfile);
}
?>
