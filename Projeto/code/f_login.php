  <!-- Login -->
<div class="" style="display:flex; min-height: 100vh;" >
  <div class="text-center mx-auto my-auto" id="d_login" style="display:block;">
    <h1 class="p-5">Projeto IoT</h1>
    <h3 class=" mb-4 font-weight-normal">Iniciar Sessão</h3>
    <div class="form-group text-left px-4">
      <label for="l_tb_username">Nome de Utilizador</label>
      <input type="text" placeholder="Nome de Utilizador" class="form-control" id="l_tb_username">
      <p class="p-2 text-danger" style="display: none;" id="erro_username"></p>
    </div>
    <div class="form-group text-left px-4">
      <label for="l_tb_password">Palavra-Passe</label>
      <input type="password" placeholder="Palavra-Passe" class="form-control" id="l_tb_password">
      <p class="p-2 text-danger" style="display: none;" id="erro_password"></p>
    </div>
    <div class="form-group px-4">
      <button class="btn btn-primary btn-login text-uppercase fw-bold" onclick="login()">Entrar</button>
      <p class="mt-4 text-danger" id="error"></p>
    </div>
    <div class="form-group px-4">
      <button class="btn btn-link btn-login text-uppercase fw-bold" id="btn_openRegister">Nao tem conta? Regista-te</button>
    </div>
    <div class="form-group px-4">
      <p class="mt-5 mb-3 text-muted">© <?php echo "2024 - " . date("Y"); ?></p>
    </div>
  </div>

  <!-- Registar -->
  <div class="text-center mx-auto my-auto" id="d_registar" style="display: none;">
    <h1 class="p-5">Projeto IoT</h1>
    <h3 class=" mb-4 font-weight-normal">Registar</h3>
    <div class="form-group text-left px-4">
      <label for="r_tb_username">Nome de Utilizador</label>
      <input type="text" placeholder="Nome de Utilizador" class="form-control" id="r_tb_username">
      <p class="p-2 text-danger" style="display: none;" id="erro_register_username"></p>
    </div>
    <div class="form-group text-left px-4">
      <label for="r_tb_password">Palavra-Passe</label>
      <input type="password" placeholder="Palavra-Passe" class="form-control" id="r_tb_password">
      <p class="p-2 text-danger" style="display: none;" id="erro_register_password"></p>
    </div>
    <div class="form-group text-left px-4">
      <label for="r_tb_nivel">Nível de Utilizador</label>
      <input type="number" placeholder="Nível de Utilizador (1 - 3)" class="form-control" id="r_tb_nivel" min="1" max="3">
      <p class="p-2 text-danger" style="display: none;" id="erro_register_nivel"></p>
    </div>
    <div class="form-group px-4">
      <button class="btn btn-primary btn-login text-uppercase fw-bold" onclick="registar()">Registar</button>
      <!-- <p class="mt-4 text-danger" id="error"></p> -->
    </div>
    <div class="form-group px-4">
      <button class="btn btn-link btn-login text-uppercase fw-bold" id="btn_openLogin">Já tem conta? Entrar</button>
    </div>
    <div class="form-group px-4">
      <p class="mt-5 mb-3 text-muted">© <?php echo "2024 - " . date("Y"); ?></p>
    </div>
  </div>
</div>
