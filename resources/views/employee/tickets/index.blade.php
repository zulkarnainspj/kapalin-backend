@extends('employee.layout.main')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tiket</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Tiket</li>
                        </ol>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                Informasi Identitas Penumpang
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Penumpang</label>
                                    <input type="text" class="form-control" name="name" id="name" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="no_id">No. Identitas</label>
                                    <input type="text" class="form-control" name="no_id" id="no_id"
                                        placeholder="KTP/SIM/PASSPORT/KIA">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_of_birth">Tanggal Lahir</label>
                                            <input type="date" step="any" class="form-control" name="date_of_birth"
                                                id="date_of_birth">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label>
                                            <select name="gender" class="form-control" id="gender">
                                                <option value="1">Laki-Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Informasi Kapal
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ship">Kapal</label>
                                    <select name="ship" id="ship" class="form-control" onchange="getRoute()">
                                        <option value="0">Pilih Kapal</option>
                                        @foreach ($ships as $ship)
                                            <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="route">Rute</label>
                                    <select name="route" id="route" class="form-control" onchange="getSchedule()">
                                        <option value="0">Pilih Rute</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="schedule">Jadwal</label>
                                    <select name="schedule" id="schedule" class="form-control">
                                        <option value="0">Pilih Jadwal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
