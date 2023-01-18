@extends('admin.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/employee/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->

    <section class="container-fluid">

        <!-- Page Title-->
        <h2 class="fs-3 fw-bold mb-5">Selamat datang, {{ auth()->user()->name }} 👋</h2>
        <!-- / Page Title-->

        <!-- Top Row Widgets-->
        <div class="row g-4">

            <!-- Number Orders Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Monthly Income
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold d-flex align-items-center"><span class="fs-9 me-1">$</span> 567,99
                                </p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="chart chart-sm">
                                    <canvas id="chartMonthlyIncome"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span
                                class="f-w-7 f-h-7 p-2 bg-success-faded text-success rounded-circle d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-100">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                            </span>
                            <span class="fw-bold text-success fs-9 ms-2">+ 10.2%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Number Orders Widget-->

            <!-- Average Orders Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Average Order
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold d-flex align-items-center"><span class="fs-9 me-1">$</span> 193,99
                                </p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="chart chart-sm">
                                    <canvas id="chartAvgOrders"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span
                                class="f-w-7 f-h-7 p-2 bg-danger-faded text-danger rounded-circle d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-100">
                                    <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                    <polyline points="17 18 23 18 23 12"></polyline>
                                </svg>
                            </span>
                            <span class="fw-bold text-danger fs-9 ms-2">- 23.5%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Average Orders Widget-->

            <!-- Pageviews Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Daily Pageviews
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold">95,456</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="chart chart-sm">
                                    <canvas id="chartPageviews"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span
                                class="f-w-7 f-h-7 p-2 bg-success-faded text-success rounded-circle d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-100">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                            </span>
                            <span class="fw-bold text-success fs-9 ms-2">+ 1.1%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Pageviews Widget-->

            <!-- Number Refunds Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Refund Issued
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold d-flex align-items-center"><span class="fs-9 me-1">$</span> 12,340
                                </p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="chart chart-sm">
                                    <canvas id="chartNumRefunds"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span
                                class="f-w-7 f-h-7 p-2 bg-success-faded text-success rounded-circle d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-100">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                            </span>
                            <span class="fw-bold text-success fs-9 ms-2">+ 7.5%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Number Refunds Widget-->
        </div>
        <!-- /Latest Events-->
        <!-- / Top Row Widgets-->

        <!-- Middle Row Widgets-->
        <div class="row g-4 mb-4 mt-0">
            <!-- Monthly Expenses-->
            <div class="col-12 col-lg-4">
                <div class="card mb-4 h-100">
                    <div class="card-header justify-content-between align-items-center d-flex">
                        <h6 class="card-title m-0">Monthly expenses</h6>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"
                                id="dropdownExpenses" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-line"></i>
                            </button>
                            <ul class="dropdown-menu dropdown" aria-labelledby="dropdownExpenses">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart chart-lg">
                            <canvas id="chartDoughnut"></canvas>
                        </div>

                        <div class="row g-1 mt-4">

                            <div class="col-12 col-sm-4 d-flex flex-column align-items-center">
                                <p class="fw-bolder mb-1">$1,456</p>
                                <div class="d-flex align-items-center">
                                    <span class="f-w-2 f-h-2 bg-secondary-faded d-block rounded-circle me-2"></span>
                                    <span class="small text-muted">Rent</span>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4 d-flex flex-column align-items-center">
                                <p class="fw-bolder mb-1">$12,325</p>
                                <div class="d-flex align-items-center">
                                    <span class="f-w-2 f-h-2 bg-primary d-block rounded-circle me-2"></span>
                                    <span class="small text-muted">Salaries</span>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4 d-flex flex-column align-items-center">
                                <p class="fw-bolder mb-1">$14,899</p>
                                <div class="d-flex align-items-center">
                                    <span class="f-w-2 f-h-2 bg-warning d-block rounded-circle me-2"></span>
                                    <span class="small text-muted">Marketing</span>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn btn-light d-table mx-auto mt-4">View full expenses</a>
                    </div>
                </div>
            </div>
            <!-- /Monthly Expenses-->

            <!-- Yearly Income-->
            <div class="col-12 col-lg-8">
                <div class="card mb-4 h-100">
                    <div class="card-header justify-content-between align-items-center d-flex">
                        <h6 class="card-title m-0">Yearly income</h6>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"
                                id="dropdownYearly" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-line"></i>
                            </button>
                            <ul class="dropdown-menu dropdown" aria-labelledby="dropdownYearly">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <div class="d-flex align-items-center">
                                <h4 class="fs-3 fw-bold mb-0 me-3">$145,778</h4>
                                <span class="badge bg-success-faded text-success d-flex align-items-center ">
                                    <span class="f-w-4 d-block me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="w-100">
                                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                            <polyline points="17 6 23 6 23 12"></polyline>
                                        </svg>
                                    </span>
                                    + 35%
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <span class="f-w-4 rounded f-h-1 bg-primary d-block me-2"></span>
                                    <span class="small text-muted">2021</span>
                                </div>
                                <div class="d-flex align-items-center ms-4">
                                    <span class="f-w-4 rounded f-h-1 bg-secondary-faded d-block me-2"></span>
                                    <span class="small text-muted">2020</span>
                                </div>
                            </div>
                        </div>
                        <div class="chart">
                            <div class="chart chart-lg">
                                <canvas id="chartLine"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Yearly Income-->

            <!-- Latest Orders-->
            <div class="col-12">
                <div class="card mb-4 h-100">
                    <div class="card-header justify-content-between align-items-center d-flex">
                        <h6 class="card-title m-0">Latest orders</h6>
                        <a href="#" class="btn btn-outline-secondary btn-sm text-body"><i
                                class="ri-download-2-line align-middle"></i> Export</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table m-0 table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Billing Name</th>
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Items</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="fw-bolder">#1234-5679</span>
                                        </td>
                                        <td>Patria Nelson</td>
                                        <td class="text-muted">24th June, 2021</td>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-visa-line ri-lg me-2"></i> **** 6789
                                            </div>
                                        </td>
                                        <td class="text-muted">5</td>
                                        <th class="text-muted">$123.99</th>
                                        <td><span class="badge rounded-pill bg-success-faded text-success">completed</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0"
                                                    type="button" id="dropdownOrder-0" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ri-more-2-line"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-0">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fw-bolder">#1235-7755</span>
                                        </td>
                                        <td>Dominic Patterson</td>
                                        <td class="text-muted">22nd June, 2021</td>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-mastercard-fill ri-lg me-2"></i> **** 1233
                                            </div>
                                        </td>
                                        <td class="text-muted">5</td>
                                        <th class="text-muted">$123.99</th>
                                        <td><span class="badge rounded-pill bg-info-faded text-info">processing</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0"
                                                    type="button" id="dropdownOrder-1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ri-more-2-line"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-1">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fw-bolder">#1236-6579</span>
                                        </td>
                                        <td>Steven Smith</td>
                                        <td class="text-muted">21st June, 2021</td>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-paypal-line ri-lg me-2"></i> **** 7766
                                            </div>
                                        </td>
                                        <td class="text-muted">5</td>
                                        <th class="text-muted">$123.99</th>
                                        <td><span class="badge rounded-pill bg-danger-faded text-danger">cancelled</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0"
                                                    type="button" id="dropdownOrder-2" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ri-more-2-line"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-2">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fw-bolder">#1237-1122</span>
                                        </td>
                                        <td>Courtney Lawes</td>
                                        <td class="text-muted">19th June, 2021</td>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-mastercard-fill ri-lg me-2"></i> **** 9087
                                            </div>
                                        </td>
                                        <td class="text-muted">5</td>
                                        <th class="text-muted">$123.99</th>
                                        <td><span class="badge rounded-pill bg-success-faded text-success">completed</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0"
                                                    type="button" id="dropdownOrder-3" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ri-more-2-line"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-3">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fw-bolder">#1238-4433</span>
                                        </td>
                                        <td>Haley Jackson</td>
                                        <td class="text-muted">19th June, 2021</td>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-visa-line ri-lg me-2"></i> **** 6789
                                            </div>
                                        </td>
                                        <td class="text-muted">5</td>
                                        <th class="text-muted">$123.99</th>
                                        <td><span class="badge rounded-pill bg-success-faded text-success">completed</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0"
                                                    type="button" id="dropdownOrder-4" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ri-more-2-line"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-4">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fw-bolder">#1239-8865</span>
                                        </td>
                                        <td>Sairaj Tackoo</td>
                                        <td class="text-muted">18th June, 2021</td>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-mastercard-fill ri-lg me-2"></i> **** 1233
                                            </div>
                                        </td>
                                        <td class="text-muted">5</td>
                                        <th class="text-muted">$123.99</th>
                                        <td><span class="badge rounded-pill bg-info-faded text-info">processing</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0"
                                                    type="button" id="dropdownOrder-5" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ri-more-2-line"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-5">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav>
                            <ul class="pagination justify-content-end mt-3 mb-0">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Latest Orders-->

        </div>
        <!-- / Middle Row Widgets-->

        <!-- Bottom Row Widgets-->
        <div class="row g-4 mb-5">

            <!-- Top Products-->
            <div class="col-12 col-lg-6">
                <div class="card mb-4 h-100">
                    <div class="card-header justify-content-between align-items-center d-flex">
                        <h6 class="card-title m-0">Top categories</h6>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"
                                id="dropdownTop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-line"></i>
                            </button>
                            <ul class="dropdown-menu dropdown" aria-labelledby="dropdownTop">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table m-0">
                            <tbody>
                                <tr>
                                    <td class="ps-0">
                                        <picture>
                                            <img class="f-w-12 rounded" src="./assets/images/logos/logo-13.svg"
                                                alt="HTML Bootstrap Admin Template by Pixel Rocket">
                                        </picture>
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <span class="text-muted">Nike Mens Running Shoes</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <span class="fw-bolder me-3">£834.98</span>
                                            <span class="badge bg-transparent text-success d-flex align-items-center ">
                                                <span class="f-w-4 d-block">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" class="w-100">
                                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                                        <polyline points="17 6 23 6 23 12"></polyline>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0">
                                        <div class="progress f-w-20 m-0 me-0 ms-auto f-h-1">
                                            <div class="progress-bar" role="progressbar" style="width: 75%"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-0">
                                        <picture>
                                            <img class="f-w-12 rounded" src="./assets/images/logos/logo-15.svg"
                                                alt="HTML Bootstrap Admin Template by Pixel Rocket">
                                        </picture>
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <span class="text-muted">Adidas Womens Jackets</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <span class="fw-bolder me-3">£695.54</span>
                                            <span class="badge bg-transparent text-success d-flex align-items-center ">
                                                <span class="f-w-4 d-block">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" class="w-100">
                                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                                        <polyline points="17 6 23 6 23 12"></polyline>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0">
                                        <div class="progress f-w-20 m-0 me-0 ms-auto f-h-1">
                                            <div class="progress-bar" role="progressbar" style="width: 60%"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-0">
                                        <picture>
                                            <img class="f-w-12 rounded" src="./assets/images/logos/logo-14.svg"
                                                alt="HTML Bootstrap Admin Template by Pixel Rocket">
                                        </picture>
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <span class="text-muted">Under Armour Golf Shorts</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <span class="fw-bolder me-3">£313.18</span>
                                            <span class="badge bg-transparent text-danger d-flex align-items-center ">
                                                <span class="f-w-4 d-block">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" class="w-100">
                                                        <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                                        <polyline points="17 18 23 18 23 12"></polyline>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0">
                                        <div class="progress f-w-20 m-0 me-0 ms-auto f-h-1">
                                            <div class="progress-bar" role="progressbar" style="width: 35%"
                                                aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#"
                            class="btn btn-outline-secondary btn-sm text-body me-0 ms-auto d-table mt-3 pb-2"
                            role="button">See all &rarr;</a>
                    </div>
                </div>
            </div>
            <!-- Top Products-->

            <!-- Newsletter Stats-->
            <div class="col-12 col-lg-6">
                <div class="card mb-4 h-100">
                    <div class="card-header justify-content-between align-items-center d-flex">
                        <h6 class="card-title m-0">Newsletter revenue</h6>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"
                                id="dropdownNewsletter" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-line"></i>
                            </button>
                            <ul class="dropdown-menu dropdown" aria-labelledby="dropdownNewsletter">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="fs-3 fw-bold mb-3">$123,778</h4>
                        <div class="progress f-h-1">
                            <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15"
                                aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Gross sales"></div>
                            <div class="progress-bar opacity-75" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Net sales"></div>
                            <div class="progress-bar opacity-50" role="progressbar" style="width: 35%"
                                aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Total profit"></div>
                        </div>

                        <table class="table mb-0 mt-4">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="f-w-2 f-h-2 rounded-circle bg-primary d-block"></span>
                                            <span class="text-muted ms-2">Gross sales</span>
                                        </div>
                                    </td>
                                    <td><span class="fw-bolder">$3,289.99 <span class="text-muted">(54.3%)</span></span>
                                    </td>
                                    <td class="text-end">
                                        <span
                                            class="badge bg-transparent text-success d-flex align-items-center justify-content-end">
                                            <span class="f-w-4 d-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" class="w-100">
                                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                                    <polyline points="17 6 23 6 23 12"></polyline>
                                                </svg>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="f-w-2 f-h-2 rounded-circle bg-primary d-block opacity-75"></span>
                                            <span class="text-muted ms-2">Net sales</span>
                                        </div>
                                    </td>
                                    <td><span class="fw-bolder">$1,758.99 <span class="text-muted">(32.3%)</span></span>
                                    </td>
                                    <td class="text-end">
                                        <span
                                            class="badge bg-transparent text-danger d-flex align-items-center justify-content-end">
                                            <span class="f-w-4 d-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" class="w-100">
                                                    <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                                    <polyline points="17 18 23 18 23 12"></polyline>
                                                </svg>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="f-w-2 f-h-2 rounded-circle bg-primary d-block opacity-50"></span>
                                            <span class="text-muted ms-2">Total profit</span>
                                        </div>
                                    </td>
                                    <td><span class="fw-bolder">$699.54 <span class="text-muted">(12.3%)</span></span>
                                    </td>
                                    <td class="text-end">
                                        <span
                                            class="badge bg-transparent text-success d-flex align-items-center justify-content-end">
                                            <span class="f-w-4 d-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" class="w-100">
                                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                                    <polyline points="17 6 23 6 23 12"></polyline>
                                                </svg>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Newsletter Stats-->

        </div>
        <!-- / Bottom Row Widgets-->
    </section>
@endsection
