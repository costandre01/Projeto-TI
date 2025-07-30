<?php

header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['imagem'])) {

        $destino = '../files/imagem/webcam.jpg';

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
            echo "Upload feito com sucesso para: $destino<br>";
            print_r($_FILES['imagem']);
            http_response_code(200); //OK
        } else {
            http_response_code(500); // Internal server error
            die("Erro ao mover o arquivo para $destino");
        }

    } else {
        http_response_code(400); // bad request
        die("Não foi possível enviar o arquivo (campo 'imagem' não encontrado)");
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $imagemPath = '../files/imagem/webcam.jpg';
    $horaPath = '../files/imagem/hora.txt';
    
    $resposta = [];
 
    if (file_exists($imagemPath)) {
        $resposta['imagem'] = $imagemPath;
    } else {
        http_response_code(404); // Not found
        $resposta['imagem'] = 'Imagem não encontrada';
    }
 
    if (file_exists($horaPath)) {
        $resposta['hora'] = file_get_contents($horaPath);
    } else {
        http_response_code(404); // Not found
        $resposta['hora'] = 'Hora não disponível';
    }
 
    http_response_code(200); // OK
    echo json_encode($resposta, JSON_UNESCAPED_UNICODE);
 
} else {
    http_response_code(405); //Method not allowed
    echo "Método inválido. Esperado POST ou GET.";
}

?>
