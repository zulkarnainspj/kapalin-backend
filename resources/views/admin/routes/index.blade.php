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
                            <li class="breadcrumb-item active">Rute</li>
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
                                    <a href="/admin/routes/add" class="btn btn-success" style="position: absolute; z-index : 1"><i class="fas fa-plus"></i> NEW</a>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Pelabuhan Asal</th>
                                                <th>Pelabuhan Tujuan</th>
                                                <th>Jarak</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($routes as $item)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->port->name }}</td>
                                                    <td>{{ $item->next_port->name }}</td>
                                                    <td class="text-center">{{ ($item->distance != null) ? $item->distance . ' Mil' : '' }}</td>
                                                    <td align="center">
                                                        <a href="/admin/routes/edit/{{ $item->id }}"
                                                            class="btn btn-sm btn-warning text-light" title="Edit"><span
                                                                class="fas fa-fw fa-edit"></span></a>
                                                        <a href="/admin/routes/remove/{{ $item->id }}"
                                                            onclick="return confirm('Are you sure you want to remove this data?');"
                                                            class="btn btn-sm btn-danger" title="Remove"><span
                                                                class="fas fa-fw fa-trash"></span></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
