<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light border-bottom py-0 fixed-top bg-white">
    <div class="container-fluid">
        <a class="navbar-brand d-flex justify-content-start align-items-center border-end" href="/">
            <div class="d-flex align-items-start">
                <img src="{{ url('') }}/apollo/assets/images/logos/kapalin-logo.png" class="img-responsive mr-2" style="height: 50px" alt="">
            </div>
        </a>
        <div class="d-flex justify-content-between align-items-center flex-grow-1 navbar-actions">

            <!-- Search Bar and Menu Toggle-->
            <div class="d-flex align-items-center">

                <!-- Menu Toggle-->
                <div class="menu-toggle cursor-pointer me-4 text-primary-hover transition-color disable-child-pointer">
                    <i class="ri-skip-back-mini-line ri-lg fold align-middle" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Close menu"></i>
                    <i class="ri-skip-forward-mini-line ri-lg unfold align-middle" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Open Menu"></i>
                </div>
                <!-- / Menu Toggle-->

            </div>
            <!-- / Search Bar and Menu Toggle-->

            <!-- Right Side Widgets-->
            <div class="d-flex align-items-center">
                <!-- Profile Menu-->
                <div class="dropdown ms-1">
                    <button class="btn btn-link p-0 position-relative" type="button" id="profileDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <picture>
                            <img class="f-w-10 rounded-circle" src="{{ url('') }}/dist/img/avatar5.png"
                                alt="HTML Bootstrap Admin Template by Pixel Rocket">
                        </picture>
                        <span
                            class="position-absolute bottom-0 start-75 p-1 bg-success border border-3 border-white rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-md dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li class="d-flex py-2 align-items-start">
                            <button
                                class="btn-icon bg-primary-faded text-primary fw-bolder me-3">{{ mb_substr(auth()->user()->name, 0, 1) }}</button>
                            <div class="d-flex align-items-start justify-content-between flex-grow-1">
                                <div>
                                    <p class="lh-1 mb-2 fw-semibold text-body">{{ auth()->user()->name }}</p>
                                    <p class="text-muted lh-1 mb-2 small">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center"
                                    style="background-color: transparent; border : none;">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                            </form>

                        </li>
                    </ul>
                </div> <!-- / Profile Menu-->

            </div>
            <!-- / Notifications & Profile-->
        </div>
    </div>
</nav>
<!-- / Navbar-->
