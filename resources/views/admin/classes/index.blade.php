@extends('admin.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kelas</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->

    <section class="container-fluid mb-3">
        <div class="d-flex justify-content-between">
            <!-- Page Title-->
            <h2 class="fs-3 fw-bold mt-1">Kelas</h2>
            <div class="col-md-6 mb-2">
                <button type="button" class="btn btn-md btn-success mr-2 text-light" data-bs-toggle="modal"
                    data-bs-target="#addModal" style="float: right;" onclick="addShipClass()">
                    <i class="fas fa-plus"></i> Tambah
                </button>
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
                                    <th>Nama Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td align="center">
                                            <a href="{{ route('admin-class-edit', $item->id) }}"
                                                class="btn btn-sm btn-warning text-light" title="Edit"><span
                                                    class="fas fa-fw fa-edit"></span></a>

                                            @if (!isset($item->ship->id))
                                                <a href="{{ route('admin-class-remove', $item->id) }}"
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

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin-class-store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Tambah Kelas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="class">Nama Kelas</label>
                                <input type="text" class="form-control" name="class" id="shipClass"
                                    placeholder="ex. Ekonomi">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function addShipClass() {
            setTimeout(() => {
                $('#shipClass').focus();
            }, 1000);
        }
    </script>
@endsection
