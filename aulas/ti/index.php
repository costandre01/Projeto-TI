<?php

session_start(); 
// Definição de credenciais
$username = "andre";
$password_hash = '$2y$10$xNg2yaHGRrh72.TnRA4g/eH1X2uTboG.3tGAiOXcGOyqRxKzzaENK'; // Copie o hash gerado previamente

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Evitar erro de índice indefinido
    $_SESSION["username"] = $_POST['username'];
    $input_username = $_POST['username'] ?? '';
    $input_password = $_POST['password'] ?? '';

    if ($input_username === $username && password_verify($input_password, $password_hash)) {
        header('Location: dashboard.php');
        echo "Autenticação bem-sucedida!";
    } else {
        echo "Nome de utilizador ou password incorretos.";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <h1><?php echo '<h1>Olá Mundo</h1>'; ?></h1>
        <?php echo '<p>Data de Hoje =' .date("Y") .'/' .date("m") .'/' .date("d") .'</p>'; ?>
            <div class="container">
                <div class="row justify-content-center">
                    <form class="AulaForm" method="post">
                        <a href="index.php"><img src="https://ead.ipleiria.pt/2024-25/pluginfile.php/170627/question/questiontext/199595/7/582076/estg_h.png" alt="estg_h.png"></a>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username" name="username" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>