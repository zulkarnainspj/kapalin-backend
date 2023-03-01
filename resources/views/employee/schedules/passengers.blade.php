@extends('employee.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/employee/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/employee/schedules/{{ $ship->id }}">{{ $ship->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Penumpang</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->

    <section class="container-fluid mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fs-3 fw-bold my-3">Jadwal -> {{ $ship->name }}</h2>
                <label for="" class="mb-4">{{ date_create($schedule->etd)->format('d/m/Y H:i') }} WIB |
                    {{ $route->name }} - {{ $next_route->name }}</label>
            </div>

            <div class="col-md-6 mb-2">
                <a href="/employee/report/{{ $schedule->id }}" target="_blank"
                    class="btn btn-md btn-success mr-2 text-light" style="float: right;"><b><i class="fas fa-plus"></i>
                        Cetak Laporan</b></a>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Kode Tiket</th>
                                    <th>Pemesan</th>
                                    <th>Nama Penumpang</th>
                                    <th>Usia</th>
                                    <th>Pembelian</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ticket as $item)
                                    @php
                                        $date_now = date_create();
                                        $date_of_birth = date_create($item->passenger->date_of_birth);
                                        $diff = date_diff($date_now, $date_of_birth);
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            <a class="fw-bolder" style="text-decoration: none"
                                                href="/employee/validation/?id={{ $item->ticket_code }}">{{ $item->ticket_code }}</a>
                                        </td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->passenger->name }}</td>
                                        <td class="text-center">{{ $diff->y > 0 ? $diff->y : '<1' }}</td>
                                        <td class="text-center">{{ date_create($item->created_at)->format('d-m-Y H:i') }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                // 0 Batal, 1 Dipesan, 2 Check In, 3 Selesai
                                                $badge_bg = '';
                                                $text_color = '';
                                                $text = '';
                                                
                                                if ($item->pending == 0) {
                                                    if ($item->status == 1) {
                                                        $badge_bg = 'bg-primary-faded';
                                                        $text_color = 'text-primary';
                                                        $text = 'dipesan';
                                                    } elseif ($item->status == 2) {
                                                        $badge_bg = 'bg-warning-faded';
                                                        $text_color = 'text-warning';
                                                        $text = 'check in';
                                                    } elseif ($item->status == 3) {
                                                        $badge_bg = 'bg-warning-faded';
                                                        $text_color = 'text-warning';
                                                        $text = 'pending';
                                                    } elseif ($item->status == 4) {
                                                        $badge_bg = 'bg-success-faded';
                                                        $text_color = 'text-success';
                                                        $text = 'selesai';
                                                    } elseif ($item->status == 0) {
                                                        $badge_bg = 'bg-danger-faded';
                                                        $text_color = 'text-danger';
                                                        $text = 'batal';
                                                    }
                                                } else {
                                                    $badge_bg = 'bg-secondary';
                                                    $text_color = 'text-dark';
                                                    $text = 'pending';
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
    </section>
@endsection
