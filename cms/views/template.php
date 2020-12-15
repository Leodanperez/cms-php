<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="views/plugins/sweetalert2/sweetalert2.min.css">
  <script src="views/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<?php

  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

    echo '<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">';

    echo '<div class="wrapper">';
    
    include 'modules/navbar.php';

    include 'modules/aside.php';

    echo '<div class="content-wrapper">';

    #Contenido de las paginas internas
    if ( isset($_GET["ruta"]) ) {

      if ($_GET["ruta"] == "inicio" || $_GET["ruta"] == "logout" || $_GET["ruta"] == "users") {

        include 'modules/'.$_GET["ruta"].'.php';

      } else {

        include 'modules/error.php';

      }
    }
    
    echo '</div>';

    include 'modules/footer.php';

    echo '</div>';
  } else {
    
    include 'modules/login.php';
  }
?>                    
  <script src="views/plugins/jquery/jquery.min.js"></script>  
  <!-- Bootstrap -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="views/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="views/dist/js/demo.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="views/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="views/plugins/raphael/raphael.min.js"></script>
  <script src="views/plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="views/plugins/jquery-mapael/maps/usa_states.min.js"></script>

  <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- ChartJS -->
  <script src="views/plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE SCRIPTS -->
  <script src="views/dist/js/pages/dashboard2.js"></script>

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script src="views/dist/js/users.js"></script>
</body>

</html>