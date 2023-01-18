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
        <!-- Page Title-->
        <h2 class="fs-3 fw-bold my-3">Jadwal -> {{ $ship->name }}</h2>
        <label for="" class="mb-4">{{ date_create($schedule->etd)->format('d/m/Y H:i') }} WIB | {{ $route->name }} - {{ $next_route->name }}</label>
        <!-- / Page Title-->

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Pemesan</th>
                                    <th>Nama Penumpang</th>
                                    <th>Usia</th>
                                    <th>Pembelian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ticket as $item)
                                    @php
                                        $date_now = date_create();
                                        $date_of_birth = date_create($item->person->date_of_birth);
                                        $diff = date_diff($date_now, $date_of_birth);
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->person->name }}</td>
                                        <td class="text-center">{{ ($diff->y > 0) ? $diff->y : '<1' }}</td>
                                        <td class="text-center">{{ date_create($item->created_at)->format('d-m-Y H:i') }}</td>
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