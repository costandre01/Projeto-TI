<?php

header('Content-Type: text/plain; charset=utf-8');

$basePath = "../files/";

if(isset($_GET['nome'])){
    $mainFolder = $basePath . $_GET['nome'] . "/";
    $combinacaoPath = $mainFolder . "combinacao.txt";

    if(!file_exists($combinacaoPath)){
      http_response_code(404);
      echo $combinacaoPath;
      exit("Erro 404: Ficheiro combinacao.txt não encontrado");
      // exit("Erro 404: Ficheiro não encontrado");
    }

      // Lê os cabeçalhos
      $pastas = array_map('trim', explode(',', file_get_contents($combinacaoPath)));
      $dadosPorPasta= [];
      $maxLinhas = 0;

      //Recolher os dados de cada pasta
      foreach($pastas as $pasta){
        $pastaPath = $basePath . $pasta ."/";
        $logFile = $pastaPath . "log.txt";
        $tabelaFile = $pastaPath . "tabela.txt";

        if(!file_exists($logFile) || !file_exists($tabelaFile)){
          http_response_code(404);
          exit("Erro 404: Falta log e tabela");
          //exit("Ficheiros em falta");
        }

        $colunas = array_map('trim', explode(',', file_get_contents($tabelaFile)));
        $linhas = array_map('trim', explode("\n", file_get_contents($logFile)));

        $dados = [];

        foreach($linhas as $linha){
          $valores = array_map('trim', explode(';', $linha));
          $dados[] = $valores;
        }

        $dadosPorPasta[$pasta] = ['colunas' => $colunas, 'dados' => $dados];

        $maxLinhas = max($maxLinhas, count($dados));
      }

      //Cabeçalho da tabela

      $response = "<table class='table table-striped'><tr>";
      $response .= "<th>Data e Hora</th>";

      foreach($pastas as $pasta){
        //ignora a coluna 0 da Data e hora e começa na 1
        for($i = 1; $i < count($dadosPorPasta[$pasta]['colunas']); $i++){
          $response .="<th>" . htmlspecialchars($dadosPorPasta[$pasta]['colunas'][$i]). "</th>";
        }
      }

      $response .= "</tr>";

      //linhas da tabela

      for($i=0; $i < $maxLinhas; $i++){
        $response .= "<tr>";

        //Data e Hora da primeira pasta
        $primeiraPasta = $pastas[0];
        $linhaRef = $dadosPorPasta[$primeiraPasta]['dados'][$i] ?? [];
        $response .= "<td>" . htmlspecialchars($linhaRef[0] ?? '-') ."</td>";

        //valores das colunas após a 0
        foreach($pastas as $pasta){
          $linha = $dadosPorPasta[$pasta]['dados'][$i] ?? [];
          for($j = 1; $j < count($dadosPorPasta[$pasta]['colunas']); $j++){
            $response .="<td>" . htmlspecialchars($linha[$j] ?? '-'). "</td>";
          }
        }

        $response .= "</tr>";
      }

      $response .= "</table>";
      exit($response);

} else {
    http_response_code(400);
    echo "Erro 400: Parâmetro 'nome' não fornecido.";
}

?>