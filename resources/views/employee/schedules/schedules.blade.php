@extends('employee.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/employee/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/employee/schedules">{{ $ship->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->

    <section class="container-fluid mb-3">
        <!-- Page Title-->
        <h2 class="fs-3 fw-bold my-3">Jadwal -> {{ $ship->name }}</h2>
        <!-- / Page Title-->

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Asal</th>
                                    <th>Tujuan</th>
                                    <th>ETD (Berangkat)</th>
                                    <th>ETA (Tiba)</th>
                                    <th>Harga</th>
                                    <th>Penumpang</th>
                                    <th>Penjualan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $item->route->port->name }}</td>
                                        <td class="text-center">{{ $item->route->next_port->name }}</td>
                                        <td class="text-center">
                                            {{ date_create($item->etd)->format('d-m-Y H:i') }}</td>
                                        <td class="text-center">
                                            {{ date_create($item->eta)->format('d-m-Y H:i') }}</td>
                                        <td class="text-center">
                                            {{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            {{ $item->pCount() }}/{{ $item->ship->kapasitas }}</td>
                                        <td class="text-center">
                                            @php
                                                // 0 Tidak Aktif, 1 Aktif
                                                $badge_bg = '';
                                                $text_color = '';
                                                $text = '';
                                                $date = date_create();
                                                $etd_date = date_create($item->etd);
                                                $penjualan = '';
                                                
                                                if ($etd_date >= $date) {
                                                    if ($item->status == 1) {
                                                        $badge_bg = 'bg-primary-faded';
                                                        $text_color = 'text-primary';
                                                        $text = 'Aktif';
                                                        $penjualan = 'aktif';
                                                    } elseif ($item->status == 0) {
                                                        $badge_bg = 'bg-danger-faded';
                                                        $text_color = 'text-danger';
                                                        $text = 'Tidak Aktif';
                                                        $penjualan = 'nonaktif';
                                                    }
                                                } else {
                                                    $badge_bg = 'bg-secondary';
                                                    $text_color = 'text-dark';
                                                    $text = 'Expired';
                                                    $penjualan = 'expired';
                                                }
                                                
                                            @endphp
                                            <span
                                                class="badge rounded-pill {{ $badge_bg . ' ' . $text_color }}">{{ $text }}</span>
                                        </td>
                                        <td align="center">
                                            <a href="/employee/schedules/{{ $ship->id }}/{{ $item->id }}"
                                                class="btn btn-sm btn-primary" title="Lihat Data Penumpang">
                                                <i class="bi bi-people-fill"></i></a>

                                            @if ($penjualan == 'aktif')
                                                <a class="btn btn-sm btn-danger text-light" title="Non Aktifkan Penjualan Tiket"
                                                    href="/employee/schedules/disable/{{ $item->id }}"><i class="bi bi-calendar-x-fill"></i></a>
                                            @elseif ($penjualan == 'nonaktif')
                                                <a class="btn btn-sm btn-success text-light" title="Aktifkan Penjualan Tiket"
                                                    href="/employee/schedules/enable/{{ $item->id }}"><i class="bi bi-calendar-check-fill"></i></a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
