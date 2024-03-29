@extends('admin.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rute</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->

    <section class="container-fluid mb-3">
        <div class="d-flex justify-content-between">
            <!-- Page Title-->
            <h2 class="fs-3 fw-bold mt-1">Rute</h2>
            <div class="col-md-6 mb-2">
                <a href="/admin/routes/add" class="btn btn-md btn-success mr-2 text-light" style="float: right;"><b><i
                            class="fas fa-plus"></i> NEW</b></a>
            </div>
            <!-- / Page Title-->
        </div>

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Pelabuhan Asal</th>
                                    <th>Pelabuhan Tujuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($routes as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->port->name }}</td>
                                        <td>{{ $item->next_port->name }}</td>
                                        <td align="center">
                                            <a href="/admin/routes/edit/{{ $item->id }}"
                                                class="btn btn-sm btn-warning" title="Edit"><span
                                                    class="fas fa-fw fa-edit"></span></a>
                                            @if ($item->checkSchedule() == 0)
                                            <a href="/admin/routes/remove/{{ $item->id }}"
                                                onclick="return confirm('Are you sure you want to remove this data?');"
                                                class="btn btn-sm btn-danger" title="Remove"><span
                                                    class="fas fa-fw fa-trash"></span></a>
                                            @endif
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
    </section>
@endsection
