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
        <form action="/employee/order" method="POST">
            @csrf
            <input type="hidden" name="booking_code" value="KB{{ date_create()->format('Hidysm') }}">
            <input type="hidden" name="price" id="price" value="0">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="jumlahPenumpang">Jumlah Penumpang</label>
                                        <select name="jumlah_penumpang" id="jumlahPenumpang" class="form-control"
                                            onchange="getPersons()">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6>Harga Tiket</h6>
                                    <h1 id="hargaTiket">-</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" id="informasiPenumpang">
                            <div class="card">
                                <div class="card-header">
                                    Informasi Identitas Penumpang [1]
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Penumpang</label>
                                        <input type="text" class="form-control" name="name_1" id="name" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_id">No. Identitas (Opsional)</label>
                                        <input type="text" class="form-control" name="no_id_1" id="no_id"
                                            placeholder="KTP/SIM/PASSPORT/KIA">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Tanggal Lahir (Opsional)</label>
                                                <input type="date" step="any" class="form-control"
                                                    name="date_of_birth_1" id="date_of_birth">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select name="gender_1" class="form-control" id="gender">
                                                    <option value="1">Pria</option>
                                                    <option value="2">Wanita</option>
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
                                        <select name="ship" id="ship" class="form-control" onchange="getRoutes()">
                                            <option value="0">Pilih Kapal</option>
                                            @foreach ($ships as $ship)
                                                <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="route">Rute</label>
                                        <select name="route" id="route" class="form-control" onchange="getSchedules()">
                                            <option value="0">Pilih Rute</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="schedule">Jadwal</label>
                                        <select name="schedule" id="schedule" class="form-control" onchange="getPrice()">
                                            <option value="0">Pilih Jadwal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div style="background-color : red;">
                                <button type="submit" style="float:right" class="btn btn-success mr-2">Save</button>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="pers2" style="display: none;">
                        <div class="col-6" id="informasiPenumpang">
                            <div class="card">
                                <div class="card-header">
                                    Informasi Identitas Penumpang [2]
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Penumpang</label>
                                        <input type="text" class="form-control" name="name_2" id="name"
                                            autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_id">No. Identitas (Opsional)</label>
                                        <input type="text" class="form-control" name="no_id_2" id="no_id"
                                            placeholder="KTP/SIM/PASSPORT/KIA">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Tanggal Lahir (Opsional)</label>
                                                <input type="date" step="any" class="form-control"
                                                    name="date_of_birth_2" id="date_of_birth">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select name="gender_2" class="form-control" id="gender">
                                                    <option value="1">Pria</option>
                                                    <option value="2">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="pers3" style="display: none;">
                        <div class="col-6" id="informasiPenumpang">
                            <div class="card">
                                <div class="card-header">
                                    Informasi Identitas Penumpang [3]
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Penumpang</label>
                                        <input type="text" class="form-control" name="name_3" id="name"
                                            autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_id">No. Identitas (Opsional)</label>
                                        <input type="text" class="form-control" name="no_id_3" id="no_id"
                                            placeholder="KTP/SIM/PASSPORT/KIA">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Tanggal Lahir (Opsional)</label>
                                                <input type="date" step="any" class="form-control"
                                                    name="date_of_birth_3" id="date_of_birth">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select name="gender_3" class="form-control" id="gender">
                                                    <option value="1">Pria</option>
                                                    <option value="2">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="pers4" style="display: none;">
                        <div class="col-6" id="informasiPenumpang">
                            <div class="card">
                                <div class="card-header">
                                    Informasi Identitas Penumpang [4]
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Penumpang</label>
                                        <input type="text" class="form-control" name="name_4" id="name"
                                            autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_id">No. Identitas (Opsional)</label>
                                        <input type="text" class="form-control" name="no_id_4" id="no_id"
                                            placeholder="KTP/SIM/PASSPORT/KIA">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Tanggal Lahir (Opsional)</label>
                                                <input type="date" step="any" class="form-control"
                                                    name="date_of_birth_4" id="date_of_birth">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select name="gender_4" class="form-control" id="gender">
                                                    <option value="1">Pria</option>
                                                    <option value="2">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="pers5" style="display: none;">
                        <div class="col-6" id="informasiPenumpang">
                            <div class="card">
                                <div class="card-header">
                                    Informasi Identitas Penumpang [5]
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Penumpang</label>
                                        <input type="text" class="form-control" name="name_5" id="name"
                                            autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_id">No. Identitas (Opsional)</label>
                                        <input type="text" class="form-control" name="no_id_5" id="no_id"
                                            placeholder="KTP/SIM/PASSPORT/KIA">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Tanggal Lahir (Opsional)</label>
                                                <input type="date" step="any" class="form-control"
                                                    name="date_of_birth_5" id="date_of_birth">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select name="gender_5" class="form-control" id="gender">
                                                    <option value="1">Pria</option>
                                                    <option value="2">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
