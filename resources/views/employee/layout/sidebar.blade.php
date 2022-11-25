<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <img src="{{ url('') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">KAPALIN</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/employee/" class="nav-link {{ $nvb == 'home' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">Kapal</li>

                <li class="nav-item">
                    <a href="/employee/schedules" class="nav-link {{ $nvb == 'schedules' ? 'active' : '' }}">
                        <i class="bi bi-calendar-range-fill mr-2"></i>
                        <p>
                            Jadwal Kapal
                        </p>
                    </a>
                </li>

                <li class="nav-header">Tiket</li>

                <li class="nav-item">
                    <a href="/employee/tickets" class="nav-link {{ ($nvb == 'users') ? 'active' : '' }}">
                        <i class="bi bi-ticket-perforated-fill mr-2"></i>
                        <p>
                            Pembelian Tiket
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
