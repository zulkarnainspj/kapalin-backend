@extends('admin.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->

    <section class="container-fluid mb-3">
        <div class="d-flex justify-content-between">
            <!-- Page Title-->
            <h2 class="fs-3 fw-bold mt-1">Jadwal</h2>
            {{-- <div class="col-md-6 mb-2">
                <a href="/admin/schedules/add" class="btn btn-md btn-success mr-2 text-light" style="float: right;"><b><i
                            class="fas fa-plus"></i> NEW</b></a>
            </div> --}}
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
                                    <th>Kapal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ships as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td align="center">
                                            <a href="/admin/schedules/{{ $item->id }}" class="btn btn-sm btn-primary"
                                                title="Jadwal">
                                                <i class="bi bi-calendar2-range-fill"></i></a>

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
