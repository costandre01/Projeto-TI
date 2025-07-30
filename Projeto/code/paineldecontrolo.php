<!-- dashboard -->
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="?page=paineldecontrolo">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
    </ol>
  </nav>
  <div class="row">
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <h1><a href="?page=historico&sensor=amonio">Qualidade do Ar</a></h1>
            <hr>
            <h2>Dados</h2>
            <div class="row">
              <div class="col-lg-8">
                <p><span class="bi bi-dot"></span>Amónia (NH₃)</p>
                <p><span class="bi bi-dot"></span>Benzeno (C₆H₆)</p>
                <p><span class="bi bi-dot"></span>Óxido de Nitrogénio (NOx)</p>
                <p><span class="bi bi-dot"></span>Dióxido de Carbono (CO₂)</p>
                <p><span class="bi bi-dot"></span>Álcool</p>
                <p><span class="bi bi-dot"></span>Fumo</p>
              </div>
              <div class="col-lg-4 text-right">
                <p><span id="valor-amonio">--</span></p>
                <p><span id="valor-benzeno">--</span></p>
                <p><span id="valor-oxidoNitrogenio">--</span></p>
                <p><span id="valor-dioxidoCarbono">--</span></p>
                <p><span id="valor-alcool">--</span></p>
                <p><span id="valor-fumo">--</span></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-lg-8">
                <p>Buzzer</p>
              </div>
              <div class="col-lg-4 text-right">
                <label for="buzzerSwitch">Buzzer</label>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="buzzerSwitch">
                  <label class="custom-control-label" for="buzzerSwitch"></label>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <h1><a href="?page=historico&sensor=temperatura">Temperatura / Humidade</a></h1>
          <hr>
          <h2>Dados</h2>
          <div class="row">
            <div class="col-lg-8">
              <p><span class="bi bi-dot"></span>Temperatura</p>
              <p><span class="bi bi-dot"></span>Humidade</p>
            </div>
            <div class="col-lg-4 text-right">
              <p><span id="valor-temperatura">--</span></p>
              <p><span id="valor-humidade">--</span></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-lg-8">
              <p>Ventoinha</p>
            </div>
            <div class="col-lg-4 text-right">
              <!-- <p>On/Off</p> -->
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch2">
                <label class="custom-control-label" for="customSwitch2"></label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <h1><a href="?page=historico&sensor=luz">Luz</a></h1>
          <hr>
          <h2>Dados</h2>
          <div class="row">
            <div class="col-lg-8">
              <p><span class="bi bi-dot"></span>Movimento</p>
            </div>
            <div class="col-lg-4 text-right">
              <p><span id="valor-luz">--</span></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-lg-8">
              <p>Luz</p>
            </div>
            <div class="col-lg-4 text-right">
              <label for="luzSwitch">Luz</label>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="luzSwitch">
                <label class="custom-control-label" for="luzSwitch"></label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <h1><a href="?page=historico&sensor=porta">Porta</a></h1>
          <hr>
          <h2>Dados</h2>
          <div class="row">
            <div class="col-lg-8">
              <p><span class="bi bi-dot"></span>Estado</p>
            </div>
            <div class="col-lg-4 text-right">
              <p><span id="valor-porta">--</span></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-lg-8">
              <p>Estado</p>
            </div>
            <div class="col-lg-4 text-right">
              <label for="portaSwitch">Abrir Porta</label>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="portaSwitch">
                <label class="custom-control-label" for="portaSwitch"></label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <hr>
  <div class="row mt-4">
<!-- Bloco da imagem e botão -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h4 class="card-title">Imagem da Webcam</h4>
          <img id="webcamImagem" src="" alt="Imagem da webcam" class="img-fluid mb-3 border rounded" style="max-width: 100%;">
          <p id="horaImagem" class="text-muted small"></p>
          <button id="capturarImagem" class="btn btn-primary">Capturar e Atualizar Imagem</button>
        </div>
      </div>
    </div>
 
  <!-- Bloco lateral com informações -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body d-flex flex-column justify-content-center h-100 text-center">
          <h5 class="card-title">Informações</h5>
          <p class="text-muted">Desenvolvido por:</p>
          <p class="text-muted"><strong>André Costa</strong></p>
          <p class="text-muted"><strong>Luís Bento</strong></p>
          <p class="text-muted mb-0">Projeto de IoT · ESTG · 2024/2025</p>
        </div>
      </div>
    </div>
  </div>
</div>
