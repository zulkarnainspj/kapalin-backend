@extends('admin.layout.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Rute</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active"><a href="/routes">Rute</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="/admin/routes/store" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="port">Pelabuhan Asal</label>
                                                    <select name="port" id="port" class="form-control">
                                                        @foreach ($ports as $port)
                                                            @if ($port->name == 'Sapeken')
                                                                <option value="{{ $port->id }}">{{ $port->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="next_port">Pelabuhan Asal</label>
                                                    <select name="next_port" id="next_port" class="form-control">
                                                        @foreach ($next_ports as $next_port)
                                                            @if ($next_port->name != 'Sapeken')
                                                                <option value="{{ $next_port->id }}">{{ $next_port->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="distance">Jarak (Mil)</label>
                                                    <input type="text" name="distance" id="distance"
                                                        placeholder="ex. 34,4" class="form-control" autofocus
                                                        autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="col-md-12 d-flex justify-content-end">
                                                <a href="/admin/routes" class="btn btn-danger mr-2">Cancel</a>
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
