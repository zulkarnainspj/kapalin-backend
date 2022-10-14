<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ url('') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">KAPALIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item">
                            <a href="/" class="nav-link {{ $nvb == 'home' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">Kapal</li>

                        <li class="nav-item">
                            <a href="/admin/ships" class="nav-link {{ $nvb == 'ships' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-ship"></i>
                                <p>
                                    Kapal
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/ports" class="nav-link {{ $nvb == 'ports' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-anchor"></i>
                                <p>
                                    Pelabuhan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/routes" class="nav-link {{ $nvb == 'routes' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-route"></i>
                                <p>
                                    Rute
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>
                                    Jadwal Kapal
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">Pengguna</li>

                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>
                                    Admin & Petugas
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Penumpang
                                </p>
                            </a>
                        </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
