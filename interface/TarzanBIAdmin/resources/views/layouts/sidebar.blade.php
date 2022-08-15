 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="assets/img/logo1.png" alt="TarzanBILogo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">TarzanBI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('home')}}" class="nav-link : active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
              </p>
            </a>
          </li>
          <li class="nav-header">PREDICTIONS</li>
          <li class="nav-item">
            <a href="{{route('produits')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Produits</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('prediction')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>Statistiques par ville</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('stats/mois')}}" class="nav-link">
              <i class="nav-icon fas fa-poll"></i>
              <p>Statistiques mensuels</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('utilisateurs')}}" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>Clients</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Se déconnecter</p>

            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
