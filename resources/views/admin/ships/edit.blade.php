@extends('admin.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/ships">Kapal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->
    <section class="container-fluid mb-3">
        <!-- Page Title-->
        <h2 class="fs-3 fw-bold my-3">Ubah Data Kapal</h2>

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="/admin/ships/update" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $ship->id }}">
                            <h4 class="mb-3">Informasi Kapal</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama Kapal</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $ship->name }}" autofocus autocomplete="off">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="capacity">Kapasitas Penumpang</label>
                                        <input type="number" name="capacity" id="capacity"
                                            class="form-control @error('capacity') is-invalid @enderror"
                                            value="{{ $ship->kapasitas }}" autocomplete="off">
                                        @error('capacity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h4 class="mb-3">Informasi Kelas Kapal</h4>
                                <div class="col-md-12">
                                    @php
                                        $cls = 0;
                                    @endphp
                                    @foreach ($classes as $item)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="kelas[]" type="checkbox"
                                                id="inlineCheckbox{{ $cls }}" value="{{ $item->id }}" {{ isset($ship->ship_class[$cls]->class_id) == $item->id ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineCheckbox{{ $cls }}">{{ $item->name }}</label>
                                        </div>
                                        <?php $cls++ ?>
                                    @endforeach

                                    @if($cls == 0)
                                        <div class="alert alert-warning">Belum ada daftar kelas, silahkan tambahkan terlebih dahulu</div>
                                    @endif

                                    <div class="col-md-12 mt-3">
                                        <label for="" class="small" style="font-style:italic">Tambahkan kelas di
                                            Menu Kelas Kapal</label>
                                    </div>
                                </div>

                                <div class="col-md-12 d-flex justify-content-end">
                                    <a href="/admin/ships" class="btn btn-danger me-2">Cancel</a>
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
