@extends('admin.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
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

            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Tiket dipesan
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-1 fw-bold d-flex align-items-center">{{ number_format($dipesan, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="fs-9 ms-2" style="color: rgb(156, 156, 156)">Total tiket yang dipesan hari ini di
                                seluruh jadwal yang tersedia</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Penumpang Check
                            In
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-1 fw-bold d-flex align-items-center">{{ number_format($checkin, 0, ',', '.') }}
                                </p>
                            </div>

                        </div>
                        <div class="d-flex align-items-center">
                            <span class="fs-9 ms-2" style="color: rgb(156, 156, 156)">Total penumpang yang sudah check in dan mencetak tiket di
                                loket hari ini di seluruh jadwal yang tersedia</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Jadwal Aktif
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-1 fw-bold d-flex align-items-center">
                                    {{ number_format($jadwal_aktif, 0, ',', '.') }}</p>
                            </div>

                        </div>
                        <div class="d-flex align-items-center">
                            <span class="fs-9 ms-2" style="color: rgb(156, 156, 156)">Total Jadwal yang sedang aktif</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Kapal Beroprasi
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-1 fw-bold d-flex align-items-center">{{ number_format($kapal, 0, ',', '.') }}
                                </p>
                            </div>

                        </div>
                        <div class="d-flex align-items-center">
                            <span class="fs-9 ms-2" style="color: rgb(156, 156, 156)">Total Kapal yang terdaftar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Latest Events-->
        <!-- / Top Row Widgets-->

        <!-- Middle Row Widgets-->
        <div class="row g-4 mb-4 mt-0">
            <!-- Monthly Expenses-->

            <!-- Yearly Income-->
            <div class="col-12 col-lg-12">
                <div class="card mb-4 h-100">
                    <div class="card-header justify-content-between align-items-center d-flex">
                        <h6 class="card-title m-0">Penjualan Tiket Tahun Ini</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <h4 class="fs-3 fw-bold mb-0 me-3">Total : {{ number_format($total_tiket, 0, ',', '.') }}
                                </h4>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center" style="font-size: 20px">
                                    <span class="f-w-4 rounded f-h-1 bg-primary d-block me-2"></span>
                                    <span class="text-muted">{{ date_create()->format('Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="chart">
                            <label for="" class="muted mb-2 mt-0">Hanya tiket dengan status selesai yang akan ditampilkan </label>
                            <div class="chart chart-lg">
                                <canvas id="penjualanTiket"></canvas>
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
                        <h6 class="card-title m-0">Pemesanan Tiket Terbaru</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table m-0 table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>Kode Tiket</th>
                                        <th>Pemesan</th>
                                        <th>Penumpang</th>
                                        <th>Rute</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_terbaru as $item)
                                        <tr>
                                            <td>
                                                <span class="fw-bolder">{{ $item->ticket_code }}</span>
                                            </td>
                                            <td>{{ $item->user->name }}</td>
                                            <td class="text-muted">{{ $item->person->name }}</td>
                                            <td class="text-muted">
                                                {{ $item->schedule->route->port->name . ' - ' . $item->schedule->route->next_port->name }}
                                            </td>
                                            <td class="text-muted">
                                                {{ date_create($item->created_at)->format('d/m/Y H:i') }}</td>
                                            <td>
                                                @php
                                                    // 0 Batal, 1 Dipesan, 2 Check In, 3 Selesai
                                                    $badge_bg = '';
                                                    $text_color = '';
                                                    $text = '';
                                                    
                                                    if ($item->status == 1) {
                                                        $badge_bg = 'bg-primary-faded';
                                                        $text_color = 'text-primary';
                                                        $text = 'dipesan';
                                                    } elseif ($item->status == 2) {
                                                        $badge_bg = 'bg-warning-faded';
                                                        $text_color = 'text-warning';
                                                        $text = 'check in';
                                                    } elseif ($item->status == 3) {
                                                        $badge_bg = 'bg-success-faded';
                                                        $text_color = 'text-success';
                                                        $text = 'selesai';
                                                    } elseif ($item->status == 0) {
                                                        $badge_bg = 'bg-danger-faded';
                                                        $text_color = 'text-danger';
                                                        $text = 'batal';
                                                    }
                                                @endphp
                                                <span
                                                    class="badge rounded-pill {{ $badge_bg . ' ' . $text_color }}">{{ $text }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Latest Orders-->

        </div>
        <!-- / Middle Row Widgets-->
    </section>

    @php
        $chart_data = '';
        foreach ($chart as $item) {
            $chart_data = $chart_data . $item->jum . ', ';
        }
    @endphp

    <script>
        /* CHART JS */
        const ctx = document.getElementById('penjualanTiket');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Tiket Terjual',
                    data: [{{ $chart_data }}],
                    borderWidth: 1,
                    borderColor: '#0049fa'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                            precision: 0
                        }
                    }]
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                }
            }
        });
    </script>
@endsection
