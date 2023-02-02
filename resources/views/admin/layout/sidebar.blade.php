<!-- Page Aside-->
<aside class="aside bg-white">
    <div class="simplebar-wrapper">
        <div data-pixr-simplebar>
            <div class="pb-6">
                <!-- Mobile Logo-->
                <div class="d-flex d-xl-none justify-content-between align-items-center border-bottom aside-header">
                    <a class="navbar-brand lh-1 border-0 m-0 d-flex align-items-center" href="/employee/">
                        <div class="d-flex align-items-center">
                            <svg class="f-w-5 me-2 text-primary d-flex align-self-center lh-1"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 203.58 182">
                                <path
                                    d="M101.66,41.34C94.54,58.53,88.89,72.13,84,83.78A21.2,21.2,0,0,1,69.76,96.41,94.86,94.86,0,0,0,26.61,122.3L81.12,0h41.6l55.07,123.15c-12-12.59-26.38-21.88-44.25-26.81a21.22,21.22,0,0,1-14.35-12.69c-4.71-11.35-10.3-24.86-17.53-42.31Z"
                                    fill="currentColor" fill-rule="evenodd" fill-opacity="0.5" />
                                <path
                                    d="M0,182H29.76a21.3,21.3,0,0,0,18.56-10.33,63.27,63.27,0,0,1,106.94,0A21.3,21.3,0,0,0,173.82,182h29.76c-22.66-50.84-49.5-80.34-101.79-80.34S22.66,131.16,0,182Z"
                                    fill="currentColor" fill-rule="evenodd" />
                            </svg>
                            <span class="fw-black text-uppercase tracking-wide fs-6 lh-1">KAPALIN</span>
                        </div>
                    </a>
                    <i
                        class="ri-close-circle-line ri-lg close-menu text-muted transition-all text-primary-hover me-4 cursor-pointer"></i>
                </div>
                <!-- / Mobile Logo-->

                <ul class="list-unstyled mb-6">

                    <!-- Dashboard Menu Section-->
                    <li class="menu-section mt-2">Menu</li>
                    <li class="menu-item {{ $nvb == 'home' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="/">
                            <span class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    class="w-100">
                                    <rect fill-opacity=".5" fill="currentColor" x="3" y="3"
                                        width="7" height="7"></rect>
                                    <rect fill="currentColor" x="14" y="3" width="7"
                                        height="7"></rect>
                                    <rect fill-opacity=".5" fill="currentColor" x="14" y="14"
                                        width="7" height="7">
                                    </rect>
                                    <rect fill="currentColor" x="3" y="14" width="7"
                                        height="7"></rect>
                                </svg>
                            </span>
                            <span class="menu-link">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <!-- / Dashboard Menu Section-->

                    <li class="menu-section mt-4">Kapal</li>

                    <li class="menu-item {{ $nvb == 'ships' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="/admin/ships">
                            <span class="menu-icon">
                                <i class="nav-icon fas fa-ship"></i>
                            </span>
                            <span class="menu-link">
                                Kapal
                            </span>
                        </a>
                    </li>

                    <li class="menu-item {{ $nvb == 'ports' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="/admin/ports">
                            <span class="menu-icon">
                                <i class="nav-icon fas fa-anchor"></i>
                            </span>
                            <span class="menu-link">
                                Pelabuhan
                            </span>
                        </a>
                    </li>

                    <li class="menu-item {{ $nvb == 'routes' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="/admin/routes">
                            <span class="menu-icon">
                                <i class="nav-icon fas fa-route"></i>
                            </span>
                            <span class="menu-link">
                                Rute
                            </span>
                        </a>
                    </li>

                    <li class="menu-item {{ $nvb == 'schedules' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="/admin/schedules">
                            <span class="menu-icon">
                                <i class="nav-icon fas fa-calendar"></i>
                            </span>
                            <span class="menu-link">
                                Jadwal Kapal
                            </span>
                        </a>
                    </li>

                    <li class="menu-section mt-4">Pengguna</li>

                    <li class="menu-item {{ ($nvb == 'users') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="/admin/users">
                            <span class="menu-icon">
                                <i class="nav-icon bi bi-people-fill"></i>
                            </span>
                            <span class="menu-link">
                                Pengguna
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</aside>
<!-- / Page Aside-->

