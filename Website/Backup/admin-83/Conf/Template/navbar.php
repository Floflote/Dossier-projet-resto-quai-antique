<header class="navbar sticky-top flex-md-nowrap p-2 shadow" data-bs-theme="white" style="background-color: white;">
  <a class="navbar-brand col-md-4 col-lg-3 me-0 px-3" href="#">Panneau administrateur</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed custom-toggler" type="button"
    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="nav nav-pills">
    <li class="nav-item dropdown infosite me-3">
      <button class="nav-link dropdown-toggle btn" href="#" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fa-sharp fa-solid fa-sitemap" style="color: white;"></i>
        <span style="color: white;">Information du site</span>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">
            <i class="fa-sharp fa-solid fa-user-gear"></i>
            Paramètres du site</a>
        </li>
        <li><a class="dropdown-item" href="#">
            <i class="fa-sharp fa-solid fa-right-from-bracket"></i>
            Se déconnecter</a>
        </li>
      </ul>
    </li>
    <li class="gosite">
      <a class="nav-link" href="../" target="_blank">
        <i class="fa-sharp fa-solid fa-eye" style="color: white;"></i>
        <span style="color: white;">Aller sur le site</span>
      </a>
    </li>
  </ul>
</header>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-center align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Informations principales</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./Tableaudebord.php">
              <i class="fa-sharp fa-solid fa-chart-area"></i>
              Tableau de bord
            </a>
          </li>
          <li class="border-top my-3"></li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-center align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Données du restaurant</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="./Categories.php">
              <i class="fa-sharp fa-solid fa-square-poll-horizontal"></i>
              Catégories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Carterestaurant.php">
              <i class="fa-sharp fa-solid fa-burger"></i>
              Carte du restaurant
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa-sharp fa-solid fa-utensils"></i>
              Menus
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa-sharp fa-solid fa-camera"></i>
              Galerie
            </a>
          </li>
          <li class="border-top my-3"></li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-center align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Comptes</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa-sharp fa-solid fa-address-card"></i>
              Clients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa-sharp fa-solid fa-calendar-days"></i>
              Réservation
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa-sharp fa-solid fa-user-gear"></i>
              Administrateur
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">