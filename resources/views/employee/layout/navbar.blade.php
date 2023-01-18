<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light border-bottom py-0 fixed-top bg-white">
    <div class="container-fluid">
        <a class="navbar-brand d-flex justify-content-start align-items-center border-end" href="./index.html">
            <div class="d-flex align-items-center">
                <svg class="f-w-5 me-2 text-primary d-flex align-self-center lh-1" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 203.58 182">
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
