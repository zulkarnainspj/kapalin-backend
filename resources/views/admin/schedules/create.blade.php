@extends('admin.layout.main')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Jadwal</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active"><a href="/admin/schedules">Jadwal</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="/admin/schedules/store" method="post">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h3>Informasi Kapal</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ship">Kapal</label>
                                                <select name="ship" class="form-control" id="ship">
                                                    @foreach ($ships as $ship)
                                                        <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="route">Rute</label>
                                                <select name="route" class="form-control" id="route">
                                                    @foreach ($routes as $route)
                                                        <option value="{{ $route->id }}">
                                                            {{ $route->port->name . ' - ' . $route->next_port->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="price">Harga</label>
                                                <input type="number" class="form-control" name="price"
                                                    placeholder="ex. 20000">
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
                                                <label for="etd_date">ETD (Keberangkatan)</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="date" step="any" name="etd_date" id="etd_date"
                                                            class="form-control" required>
                                                        <label for=""
                                                            style="font-weight: normal; font-size:12px">Perkiraan waktu
                                                            keberangkatan dari pelabuhan asal</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <input type="time" step="any" name="etd_time" id="etd_time"
                                                            class="form-control" value="00:00" required>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="eta_date">ETA (Kedatangan)</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="date" step="any" name="eta_date" id="eta_date"
                                                            class="form-control" required>
                                                        <label for=""
                                                            style="font-weight: normal; font-size:12px">Perkiraan waktu tiba
                                                            di pelabuhan tujuan</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <input type="time" step="any" name="eta_time" id="eta_time"
                                                            class="form-control" value="00:00" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3>Gambar Jadwal Lengkap</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control form-control-lg" id="formFile" type="file"
                                                 accept="image/png, image/jpeg">
                                        </div>

                                        <div class="col-md-6">
                                            <img src="" alt="" class="img-thumbnail" id="imagepreview">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 d-flex justify-content-end">
                                <a href="/admin/schedules" class="btn btn-danger mr-2">Batal</a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function fr_file() {
            var img_file = $('#formFile').mozFullPath();
            console.log(img_file);
        }

        $('#formFile').change(function() {
            console.log(this.files[0].mozFullPath);
        });
    </script>
@endsection
