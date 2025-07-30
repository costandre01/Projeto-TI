<!-- conteudo html da barra lateral -->
<ul class="navbar-nav sidebar sidebar-dark accordion d-print-none sidebar" id="accordionSidebar">
  <li>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?page=paineldecontrolo">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="bi bi-emoji-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Casa Inteligente <!--<sup></sup> --></div>
    </a>
  </li>
  <li><hr class="sidebar-divider my-0"></li>
  <!-- <li class="nav-item text-center">
    <a class="nav-link" href="?page=paineldecontrolo">
      <i class="bi bi-book"></i>
      <span>Menu</span></a>
  </li> -->
  <li><hr class="sidebar-divider"></li>
  <li><div class="sidebar-heading">Páginas</div></li>
  <li class="nav-item <?php if($page == "paineldecontrolo") {echo "active";} ?>">
    <a class="nav-link" href="?page=paineldecontrolo">
      <i class="bi bi-calendar"></i>
      <span>Painel de Controlo</span></a>
  </li>
  <li class="nav-item <?php if($page == "historico") {echo "active";} ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <i class="bi bi-calendar"></i>
      <span>Histórico</span>
    </a>
    <div id="collapseTwo" class="collapse <?php if($page == "historico") {echo "show";} ?>">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Gestão Interna</h6>
        <a class="collapse-item" href="?page=historico&sensor=amonio">Qualidade do Ar</a>
        <a class="collapse-item" href="?page=historico&sensor=temperatura">Temperatura / Humidade</a>
        <a class="collapse-item" href="?page=historico&sensor=luz">Luz</a>
        <a class="collapse-item" href="?page=historico&sensor=porta">Porta</a>
      </div>
    </div>
  </li>
</ul>
