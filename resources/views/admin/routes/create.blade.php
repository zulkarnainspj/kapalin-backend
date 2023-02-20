@extends('admin.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/routes">Rute</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->

    <section class="container-fluid mb-3">
        <!-- Page Title-->
        <h2 class="fs-3 fw-bold my-3">Tambah Data Rute</h2>

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="/admin/routes/store" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="port">Pelabuhan Asal</label>
                                        <select name="port" id="port" class="form-control">
                                            @foreach ($ports as $port)
                                                @if ($port->origin_port == 1)
                                                    <option value="{{ $port->id }}">{{ $port->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="next_port">Pelabuhan Tujuan</label>
                                        <select name="next_port_id" id="next_port"
                                            class="form-control  @error('next_port_id') is-invalid @enderror">
                                            @foreach ($next_ports as $next_port)
                                                @if ($next_port->origin_port == 0)
                                                    <option value="{{ $next_port->id }}">{{ $next_port->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('next_port_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 d-flex justify-content-end">
                                    <a href="/admin/routes" class="btn btn-danger me-2">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
