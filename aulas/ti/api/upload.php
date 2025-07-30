<?php

header('Content-Type: text/html; charset=utf-8');

$basePath = "images/";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_FILES['imagem'])){
      print_r($_FILES['imagem']);
      if(move_uploaded_file($_FILES['imagem']['tmp_name'], $basePath .$_FILES['imagem']['name'])){
        echo "movido com sucesso";
      }else{
        http_response_code(400);
      echo "Erro, ao mover para a pasta";
      }
    }else{
      http_response_code(400);
      echo "Erro, nenhuma imagem.";
    }
} else {
  http_response_code(400);
  echo "Erro, os parametros estão incompletos.";
}
?>