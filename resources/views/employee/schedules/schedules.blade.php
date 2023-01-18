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
                                    <th>ETA (Tiba)</th>
                                    <th>ETD (Berangkat)</th>
                                    <th>Harga</th>
                                    <th>Penumpang</th>
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
                                            {{ date_create($item->eta)->format('d-m-Y H:i') }}</td>
                                        <td class="text-center">
                                            {{ date_create($item->etd)->format('d-m-Y H:i') }}</td>
                                        <td class="text-center">
                                            {{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            {{ $item->pCount() }}/{{ $item->ship->kapasitas }}</td>
                                        <td>
                                            <div class="dropdown text-center">
                                                <button
                                                    class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0"
                                                    type="button" id="dropdownOrder-0" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ri-more-2-line"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-0">
                                                    <li><a class="dropdown-item" href="/employee/schedules/{{ $ship->id }}/{{ $item->id }}">Lihat Data Penumpang</a></li>
                                                </ul>
                                            </div>
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
