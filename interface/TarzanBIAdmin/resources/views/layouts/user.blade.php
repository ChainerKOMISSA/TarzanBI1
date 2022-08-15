<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('layouts.head')
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/adminlte.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Clients</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
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
              <a href="{{route('home')}}" class="nav-link">
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
              <a href="{{route('utilisateurs')}}" class="nav-link : active">
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Habitudes des clients</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Clients</a></li>
                <li class="breadcrumb-item active">Acceuil</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Habitudes des clients</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="jsGrid1">
              <table class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénoms</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Détails</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($clients as $key => $client)
                  <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->prenoms }}</td>
                    <td>{{ $client->phone_number}}</td>
                    <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning text-centered" data-toggle="modal" data-target="#exampleModalCenter{{$client->id}}">
                        <i class="fas fa-plus"></i>
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModalCenter{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Détails</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table class="col-10 mx-auto">
                                <thead>
                                  <tr>
                                    <th>Date</th>
                                    <th>Articles</th>
                                    <th>Ville</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($client->commandes as $commande)
                                  <tr>
                                    <td>{{$commande->InvoiceDate}}</td>
                                    <td>{{$commande->Description}}</td>
                                    <td>{{$commande->City}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.footer')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Add Content Here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  @include('layouts.footer-scripts')

  <script>
    $(function() {
      $("#jsGrid1").jsGrid({
        height: "100%",
        width: "100%",

        sorting: true,
        paging: true,

        fields: [{
            name: "Numéro",
            type: "number",
            width: 150
          },
          {
            name: "Nom",
            type: "text",
            width: 50
          },
          {
            name: "Prénoms",
            type: "text",
            width: 200
          }
        ]
      });
    });
  </script>

  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["Copy", "csv", "excel", "pdf", "Print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
  </script>
<script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>

</body>

</html>
