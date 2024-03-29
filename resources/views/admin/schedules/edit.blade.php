@extends('admin.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/schedules/">Jadwal</a></li>
                    <li class="breadcrumb-item"><a href="/admin/schedules/{{ $ship->id }}">{{ $ship->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->

    <section class="container-fluid mb-3">
        <!-- Page Title-->
        <h2 class="fs-3 fw-bold my-3">Ubah Jadwal</h2>

        <div class="row g-4">
            <div class="col-md-12">
                <form action="/admin/schedules/ships/update" method="post">
                    @csrf
                    <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                    <input type="hidden" name="ship_id" value="{{ $ship->id }}">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>Informasi Kapal</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ship" style="font-weight:bold">Kapal</label>
                                        <select name="ship" class="form-control" id="ship" readonly>
                                            <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="route" style="font-weight:bold">Rute</label>
                                        <select name="route" class="form-control" id="route">
                                            @foreach ($routes as $route)
                                                <option value="{{ $route->id }}"
                                                    {{ $schedule->route_id == $route->id ? 'selected' : '' }}>
                                                    {{ $route->port->name . ' - ' . $route->next_port->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="price" style="font-weight:bold">Harga ({{ $schedule->kelas }})</label>
                                        <input type="number" class="form-control" name="price" placeholder="ex. 20000"
                                            value="{{ $schedule->price }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3>Jadwal</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="etd_date" style="font-weight:bold">ETD (Keberangkatan)</label>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <input type="date" step="any" name="etd_date" id="etd_date"
                                                    value="{{ date_create($schedule->etd)->format('Y-m-d') }}"
                                                    class="form-control" required>
                                                <label for="" style="font-weight: normal; font-size:12px">Perkiraan
                                                    waktu
                                                    keberangkatan dari pelabuhan asal</label>
                                            </div>

                                            <div class="col-md-3">
                                                <input type="time" step="any" name="etd_time" id="etd_time"
                                                    value="{{ date_create($schedule->etd)->format('H:i:s') }}"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eta_date" style="font-weight:bold">ETA (Kedatangan)</label>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <input type="date" step="any" name="eta_date" id="eta_date"
                                                    value="{{ date_create($schedule->eta)->format('Y-m-d') }}"
                                                    class="form-control" required>

                                                <label for="" style="font-weight: normal; font-size:12px">Perkiraan
                                                    waktu tiba
                                                    di pelabuhan tujuan</label>
                                            </div>

                                            <div class="col-md-3">
                                                <input type="time" step="any" name="eta_time" id="eta_time"
                                                    value="{{ date_create($schedule->eta)->format('H:i:s') }}"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 d-flex justify-content-end mt-3">
                        <a href="/admin/schedules/{{ $ship->id }}" class="btn btn-danger me-2">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
