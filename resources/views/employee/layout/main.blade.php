<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ url('') }}/apollo/assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ url('') }}/apollo/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ url('') }}/apollo/assets/images/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="{{ url('') }}/apollo/assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>Kapalin | {{ $title }}</title>

    <!-- Data Table -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ url('') }}/apollo/assets/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ url('') }}/apollo/assets/css/theme.bundle.css" />

    <script src="{{ url('') }}/dist/js/custom-top.js"></script>
    <script src="{{ url('') }}/plugins/chart.js/Chart.min.js"></script>


    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
            /**
          * Reinstate scrolling for non-JS clients
          */
            .simplebar-content-wrapper {
                overflow: auto;
            }
        </style>
    </noscript>
</head>

<body>
    @include('sweetalert::alert')
    @include('employee.layout.navbar')

    <main id="main">

        @yield('container')
        @include('employee.layout.footer')
    </main>
    @include('employee.layout.sidebar')

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ url('') }}/plugins/jquery/jquery.min.js"></script>

    <!-- APOLLO -->
    <script src="{{ url('') }}/apollo/assets/js/vendor.bundle.js"></script>
    <script src="{{ url('') }}/apollo/assets/js/theme.bundle.js"></script>

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

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('') }}/dist/js/pages/dashboard2.js"></script>

    <script src="{{ url('') }}/dist/js/custom.js"></script>

    
</body>

</html>
