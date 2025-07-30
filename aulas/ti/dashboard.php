<?php
    session_start();
    if ( !isset($_SESSION['username'])){
    }
    $valor_temperatura = file_get_contents("api/files/temperatura/valor.txt");
    $hora_temperatura = file_get_contents("api/files/temperatura/hora.txt");
    $nome_temperatura = file_get_contents("api/files/temperatura/nome.txt");
   // echo($nome_temperatura.":".$valor_temperatura."ºC em".$hora_temperatura);
    $valor_humidade = file_get_contents("api/files/humidade/valor.txt");
    $hora_humidade = file_get_contents("api/files/humidade/hora.txt");
    $nome_humidade = file_get_contents("api/files/humidade/nome.txt");


    
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plataforma IoT</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <meta http-equiv="refresh" content="5">
    </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-light">

        <div class="container-fluid">
        <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard EI-TI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Histórico</a>
                </li>
            </ul>
            <form class="d-flex">
                <!-- <button class="btn btn-outline-success" type="submit">Logout</button> -->
                 <a href="logout.php">logout</a>
            </form>
        </div>
    </nav>
    <div class="container d-flex justify-content-around align-items-center">
        <div id="title-header">
            <h1>Servidor IoT

            </h1>
            <h6>user:<?php echo $_SESSION['username']; ?>

            </h6>
        </div>
        <img src="estg.png" alt="" width="300">
    </div>  
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-header sensor"><strong>Temperatura: <?php echo $valor_temperatura;?>º </strong>
                        </div>
                        <div class="card-body"><img src="temperature-high.png" alt="">
                        </div>
                        <div class="card-footer"><strong>Actualização:&nbsp;</strong><?php echo $hora_temperatura;?> -&nbsp;<a href="https://getbootstrap.com/docs/5.3/utilities/text/#text-alignment" target="_blank">Histórico</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-header sensor"><strong>Humidade: <?php echo $valor_humidade;?>º</strong>
                        </div>
                        <div class="card-body"><img src="humidity-high.png" alt="">
                        </div>
                        <div class="card-footer"><strong>Actualização:&nbsp;</strong><?php echo $hora_humidade;?> -&nbsp;<a href="https://getbootstrap.com/docs/5.3/utilities/text/#text-alignment" target="_blank">Histórico</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-header atuador"><strong>Led Arduino: Ligado</strong>
                        </div>
                        <div class="card-body"><img src="light-on.png" alt="">
                        </div>
                        <div class="card-footer"><strong>Actualização:&nbsp;</strong>2024/03/10 14:31 -&nbsp;<a href="https://getbootstrap.com/docs/5.3/utilities/text/#text-alignment" target="_blank">Histórico</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-header atuador"><strong>Led Arduino: Ligado</strong>
                        </div>
                        <div class="card-body"><?php echo "<img src='api/images/captura.jpg?id=".time()."' style='width:100%'>"; ?>
                        </div>
                        <div class="card-footer"><strong>Actualização:&nbsp;</strong>2024/03/10 14:31 -&nbsp;<a href="https://getbootstrap.com/docs/5.3/utilities/text/#text-alignment" target="_blank">Histórico</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><strong>Tabela de Sensores</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Tipo de Dispositivo IoT</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Data de Atualização</th>
                                    <th scope="col">Estado Alertas</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td scope="row"><?php echo $nome_temperatura;?></td>
                                    <td><?php echo $valor_temperatura;?>º</td>
                                    <td><?php echo $hora_temperatura;?></td>
                                    <td><span class="badge rounded-pill text-bg-danger">Elevada</span></td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Humidade</td>
                                    <td>70%</td>
                                    <td>2024/03/10 14:31</td>
                                    <td><span class="badge rounded-pill text-bg-primary">Normal</span></td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Led Arduino</td>
                                    <td>Ligado</td>
                                    <td>2024/03/10 14:31</td>
                                    <td><span class="badge rounded-pill text-bg-success">Ativo</span></td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>