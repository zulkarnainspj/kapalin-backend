<!doctype html>
<html lang="en">

<!-- Head -->

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

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ url('') }}/apollo/assets/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ url('') }}/apollo/assets/css/theme.bundle.css" />

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

    <!-- Page Title -->
    <title>Kapalin | {{ $title }}</title>

</head>

<body class="">

    <!-- Main Section-->
    <section class="d-flex justify-content-center align-items-start vh-100 py-5 px-3 px-md-0">

        <!-- Login Form-->
        <div class="d-flex flex-column w-100 align-items-center">

            <!-- Logo-->
            <a href="/" class="d-table mt-5 mb-4 mx-auto">
                <img src="{{ url('') }}/apollo/assets/images/logos/kapalin-logo.png" class="img-responsive" style="height: 50px" alt="">
            </a>
            <!-- Logo-->

            <div class="shadow-lg rounded p-4 p-sm-5 bg-white form">
                <h3 class="fw-bold">Login</h3>
                <p class="text-muted">Selamat datang!</p>

                @if (session('loginError'))
                    <div class="alert alert-danger">
                        <h6>Login gagal! username atau password salah</h6>
                    </div>
                @endif

                <!-- Login Form-->
                <form class="mt-4" action="/login/req" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="login-email">Email</label>
                        <input type="email" name="email" class="form-control" id="login-email"
                            placeholder="ex. nama@email.com" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="login-password"
                            class="form-label d-flex justify-content-between align-items-center">
                            Password
                            {{-- <a href="./forgot-password.html"
                                class="text-muted small ms-2 text-decoration-underline">Forgotten
                                password?</a> --}}
                        </label>
                        <input type="password" name="password" class="form-control" id="login-password" required
                            placeholder="Masukkan Password">
                    </div>
                    <button type="submit" class="btn btn-primary d-block w-100 my-4">Login</button>
                </form>
                <!-- / Login Form -->

                {{-- <p class="d-block text-center text-muted small">New customer? <a
                        class="text-muted text-decoration-underline" href="./register.html">Sign up for an account</a>
                </p> --}}
            </div>
        </div>
        <!-- / Login Form-->

    </section>
    <!-- / Main Section-->

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="{{ url('') }}/apollo/assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="{{ url('') }}/apollo/assets/js/theme.bundle.js"></script>
</body>

</html>
