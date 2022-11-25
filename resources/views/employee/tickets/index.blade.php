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
            <input type="hidden" name="ticket_code" value="KB{{ date_create()->format('Hidysm') }}">
            <input type="hidden" name="price" id="price" value="0">
            <section class="content">
                <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <b>Terjadi kesalahan, silahkan periksa kembali data!</b>
                        </div>
                    @endif

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
                                        <input type="text" class="form-control @error('name.0') is-invalid @enderror"
                                            name="name[]" value="{{ old('name.0') }}" id="name" autofocus>
                                        @error('name.0')
                                            <div class="invalid-feedback">
                                                {{ str_replace('name.0', 'Nama', $message) }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="no_id">No. Identitas (Opsional)</label>
                                        <input type="text" class="form-control @error('no_id.0') is-invalid @enderror"
                                            name="no_id[]" value="{{ old('no_id.0') }}" id="no_id"
                                            placeholder="KTP/SIM/PASSPORT/KIA">
                                        @error('no_id.0')
                                            <div class="invalid-feedback">
                                                {{ str_replace('no id.0', 'No. Identitas', $message) }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Tanggal Lahir (Opsional)</label>
                                                <input type="date" step="any" class="form-control"
                                                    name="date_of_birth[]" value="{{ old('date_of_birth.0') }}" id="date_of_birth">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select name="gender[]" class="form-control" id="gender">
                                                    <option value="1" {{ old('gender.0') == 1 ? 'selected' : '' }}>Pria</option>
                                                    <option value="2" {{ old('gender.0') == 2 ? 'selected' : '' }}>Wanita</option>
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
                                        <select name="ship" id="ship" class="custom-select @error('ship') is-invalid @enderror" onchange="getRoutes()">
                                            <option value="">Pilih Kapal</option>
                                            @foreach ($ships as $ship)
                                                <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('ship')
                                        <div class="invalid-feedback">
                                            {{ str_replace('ship', 'Kapal', $message) }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="route">Rute</label>
                                        <select name="route" id="route" class="custom-select @error('route') is-invalid @enderror"
                                            onchange="getSchedules()">
                                            <option value="">Pilih Rute</option>
                                        </select>

                                        @error('route')
                                        <div class="invalid-feedback">
                                            {{ str_replace('route', 'Rute', $message) }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="schedule">Jadwal</label>
                                        <select name="schedule" id="schedule"
                                            class="custom-select @error('schedule') is-invalid @enderror"
                                            onchange="getPrice()">
                                            <option value="">Pilih Jadwal</option>
                                        </select>

                                        @error('schedule')
                                        <div class="invalid-feedback">
                                            {{ str_replace('schedule', 'Jadwal', $message) }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 position-absolute" style="width: 99%">
                                <button type="submit" style="float:right" class="btn btn-lg w-100 btn-success mr-2"><b>Cetak</b></button>
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
                                        <input type="text" class="form-control @error('name.1') is-invalid @enderror"
                                            name="name[]" value="{{ old('name.1') }}" id="name" autofocus>
                                        @error('name.1')
                                            <div class="invalid-feedback">
                                                {{ str_replace('name.1', 'Nama', $message) }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="no_id">No. Identitas (Opsional)</label>
                                        <input type="text" class="form-control @error('no_id.1') is-invalid @enderror"
                                            name="no_id[]" value="{{ old('no_id.1') }}" id="no_id"
                                            placeholder="KTP/SIM/PASSPORT/KIA">
                                        @error('no_id.1')
                                            <div class="invalid-feedback">
                                                {{ str_replace('no id.1', 'No. Identitas', $message) }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Tanggal Lahir (Opsional)</label>
                                                <input type="date" step="any" class="form-control"
                                                    name="date_of_birth[]" value="{{ old('date_of_birth.1') }}" id="date_of_birth">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select name="gender[]" class="form-control" id="gender">
                                                    <option value="1" {{ old('gender.1') == 1 ? 'selected' : '' }}>Pria</option>
                                                    <option value="2" {{ old('gender.1') == 2 ? 'selected' : '' }}>Wanita</option>
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
                                        <input type="text" class="form-control @error('name.2') is-invalid @enderror"
                                            name="name[]" value="{{ old('name.2') }}" id="name" autofocus>
                                        @error('name.2')
                                            <div class="invalid-feedback">
                                                {{ str_replace('name.2', 'Nama', $message) }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="no_id">No. Identitas (Opsional)</label>
                                        <input type="text" class="form-control @error('no_id.2') is-invalid @enderror"
                                            name="no_id[]" value="{{ old('no_id.2') }}" id="no_id"
                                            placeholder="KTP/SIM/PASSPORT/KIA">
                                        @error('no_id.2')
                                            <div class="invalid-feedback">
                                                {{ str_replace('no id.2', 'No. Identitas', $message) }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Tanggal Lahir (Opsional)</label>
                                                <input type="date" step="any" class="form-control"
                                                    name="date_of_birth[]" value="{{ old('date_of_birth.2') }}" id="date_of_birth">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select name="gender[]" class="form-control" id="gender">
                                                    <option value="1" {{ old('gender.2') == 1 ? 'selected' : '' }}>Pria</option>
                                                    <option value="2" {{ old('gender.2') == 2 ? 'selected' : '' }}>Wanita</option>
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
                                        <input type="text" class="form-control @error('name.3') is-invalid @enderror"
                                            name="name[]" value="{{ old('name.3') }}" id="name" autofocus>
                                        @error('name.3')
                                            <div class="invalid-feedback">
                                                {{ str_replace('name.3', 'Nama', $message) }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="no_id">No. Identitas (Opsional)</label>
                                        <input type="text" class="form-control @error('no_id.3') is-invalid @enderror"
                                            name="no_id[]" value="{{ old('no_id.3') }}" id="no_id"
                                            placeholder="KTP/SIM/PASSPORT/KIA">
                                        @error('no_id.3')
                                            <div class="invalid-feedback">
                                                {{ str_replace('no id.3', 'No. Identitas', $message) }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Tanggal Lahir (Opsional)</label>
                                                <input type="date" step="any" class="form-control"
                                                    name="date_of_birth[]" value="{{ old('date_of_birth.3') }}" id="date_of_birth">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select name="gender[]" class="form-control" id="gender">
                                                    <option value="1" {{ old('gender.3') == 1 ? 'selected' : '' }}>Pria</option>
                                                    <option value="2" {{ old('gender.3') == 2 ? 'selected' : '' }}>Wanita</option>
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
                                        <input type="text" class="form-control @error('name.4') is-invalid @enderror"
                                            name="name[]" value="{{ old('name.4') }}" id="name" autofocus>
                                        @error('name.4')
                                            <div class="invalid-feedback">
                                                {{ str_replace('name.4', 'Nama', $message) }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="no_id">No. Identitas (Opsional)</label>
                                        <input type="text" class="form-control @error('no_id.4') is-invalid @enderror"
                                            name="no_id[]" value="{{ old('no_id.4') }}" id="no_id"
                                            placeholder="KTP/SIM/PASSPORT/KIA">
                                        @error('no_id.4')
                                            <div class="invalid-feedback">
                                                {{ str_replace('no id.4', 'No. Identitas', $message) }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Tanggal Lahir (Opsional)</label>
                                                <input type="date" step="any" class="form-control"
                                                    name="date_of_birth[]" value="{{ old('date_of_birth.4') }}" id="date_of_birth">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select name="gender[]" class="form-control" id="gender">
                                                    <option value="1" {{ old('gender.4') == 1 ? 'selected' : '' }}>Pria</option>
                                                    <option value="2" {{ old('gender.4') == 2 ? 'selected' : '' }}>Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin-bottom: 80px">
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
