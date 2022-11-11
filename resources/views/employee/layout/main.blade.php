<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kapalin | {{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('') }}/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('sweetalert::alert')
        @include('employee.layout.navbar')
        @include('employee.layout.sidebar')
        @yield('container')
        @include('employee.layout.footer')
    </div>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ url('') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ url('') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ url('') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ url('') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('') }}/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ url('') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ url('') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ url('') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ url('') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ url('') }}/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('') }}/dist/js/pages/dashboard2.js"></script>

    <script src="{{ url('') }}/dist/js/custom.js"></script>
</body>

</html>
