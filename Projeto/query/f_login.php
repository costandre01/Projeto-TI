<?php
session_start();

//Ler as credenciais
if(isset($_POST["login"])) {
  $login_username = $_POST["login_username"];
  $login_password = hash("sha512", $_POST["login_password"]);

  //ficheiro de texto onde se guarda as credenciais
  $filename = "../files/credenciais.txt";

  //Verificar se existe as credenciais usadas
  if(file_exists($filename)) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Lê o ficheiro linha a linha
    for($i = 0; $i < count($lines); $i += 3) { // Le as linhas correspondentes ao utilizador
      $username = $lines[$i];
      $password = $lines[$i + 1];
      $level = $lines[$i + 2];
      if($login_username === $username && $login_password === $password) {
        $_SESSION["USER_NAME"] = $username;
        $_SESSION["USER_LEVEL"] = $level;
        // echo "Login bem-sucedido! Bem-vindo, " . $_SESSION["USER_NAME"] . " (Nível: " . $_SESSION["USER_LEVEL"] . ")";
        exit;
      }
    }
    exit("Credenciais incorretas");
  } else {
    exit("Ficheiro não encontrado");
  }
}
?>
