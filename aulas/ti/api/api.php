<?php

    header('Content-Type: text/html; charset=utf-8');

    $basePath = "files/";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['valor']) && isset($_POST['hora']) && isset($_POST['nome'])) {
          print_r ( $_POST );
          $userPath = $basePath . $_POST['nome'] . "/";
          if (!is_dir($userPath)) {
            http_response_code(403);
            echo "Erro 403: Acesso proibido. Diretório do usuário não encontrado.";
            exit;
          }
          file_put_contents("files/". $_POST['nome'] ."/valor.txt", $_POST['valor']);
          file_put_contents("files/". $_POST['nome'] ."/hora.txt", $_POST['hora']);
          file_put_contents("files/". $_POST['nome'] ."/log.txt", $_POST['hora'] .";". $_POST['valor'] . PHP_EOL, FILE_APPEND);
        } else {
          http_response_code(400);
          echo "Erro, os parametros estão incompletos.";
        }
    } elseif($_SERVER['REQUEST_METHOD'] == "GET") {
            if(isset($_GET['nome'])){
              $filePath = $basePath . $_GET['nome'] . "/valor.txt";
              if (!file_exists($filePath)) {
                http_response_code(403);
                echo "Erro 403: Acesso proibido. Arquivo não encontrado.";
                exit;
              }
                echo file_get_contents("files/".$_GET['nome']."/valor.txt");
            } else {
              http_response_code(400);
              echo "Erro 400: Parâmetro 'nome' não fornecido.";
            }
        } else {
            http_response_code(501);
        echo "Método não permitido";
    }
  ?>