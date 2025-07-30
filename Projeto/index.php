<?php
require_once 'config/boot.php';
?>

<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="vendor/bootstrap-icons-1.11.2/font/bootstrap-icons.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
  </head>
  <body>
    <?php
    if(isset($_SESSION["USER_NAME"])) {
      ?>
      <div id="wrapper">
        <?php require_once 'code/sidebar.php';  ?>
        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content">
            <?php require_once 'code/navbar.php'; ?>
            <div class="container-fluid">
              <?php
              switch($page) {
                // Pages
                case '':
                  require_once 'code/paineldecontrolo.php';
                  break;
                case 'paineldecontrolo':
                  require_once 'code/paineldecontrolo.php';
                  break;
                case 'historico':
                  require_once 'code/historico.php';
                  break;

                // Addons
                default:
                  require_once 'index.php';
                  break;
              }
              ?>
            </div>
          </div>

          <!-- <footer class="sticky-footer bg-white d-print-none">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span><?php /*echo date("Y"); */ ?> © <strong>Motion365R</strong> </span>
              </div>
            </div>
          </footer> -->
        </div>
      </div>
      <?php
    } else {
      require_once 'code/f_login.php';
    }
    ?>

    <!-- SCRIPTS -->
    <?php require_once 'config/scripts.php'; ?>
  </body>
</html>
