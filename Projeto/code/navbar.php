<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="bi bi-list"></i>
  </button>

    <ul class="navbar-nav ml-auto">
        <!-- <li><div class="topbar-divider d-none d-sm-block"></div></li> -->

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline small btn-nav-toggle"><?php echo $_SESSION["USER_NAME"]; ?></span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <button class="btn btn-link" onclick="logout()">Terminar Sessão</button>
            </div>
        </li>
    </ul>
</nav>
