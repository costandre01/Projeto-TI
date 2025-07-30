<!-- jQuery -->
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- _____ Ajax Functions _____ -->
<script src="js/f_login.js"></script>
<script src="js/f_register.js"></script>
<script src="js/f_logout.js"></script>
<?php 
if ($page=="historico"){
  ?>
  <script src="js/historico.js"></script>
  <?php 
}
?>

<?php
if($page == "paineldecontrolo" || $page == "") {
  ?>
<script src="js/paineldecontrolo.js"></script>
<?php
}
?>