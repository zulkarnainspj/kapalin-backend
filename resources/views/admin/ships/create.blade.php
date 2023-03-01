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
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->

    <section class="container-fluid mb-3">
        <!-- Page Title-->
        <h2 class="fs-3 fw-bold my-3">Tambah Data Kapal</h2>
        <form action="/admin/ships/store" method="post">
            @csrf
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="mb-3">Informasi Kapal</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama Kapal</label>
                                        <input type="text" name="name" id="name"
                                            placeholder="ex. KM Sabuk Nusantara 91"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" autofocus autocomplete="off">

                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="capacity">Kapasitas Penumpang</label>
                                        <input type="number" name="capacity" id="capacity"
                                            class="form-control @error('capacity') is-invalid @enderror"
                                            value="{{ old('capacity') }}" autocomplete="off">
                                        @error('capacity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div> --}}
                            </div>

                            <div class="row">
                                <h4 class="mb-3">Informasi Kelas Kapal</h4>
                                <div class="col-md-12">
                                    @php
                                        $cls = 0;
                                    @endphp
                                    <div class="row">
                                        @foreach ($classes as $item)
                                            <div class="col-md-3 d-flex justify-content-start align-items-center">
                                                <div class="form-check form-check me-3  ">
                                                    <input class="form-check-input" name="kelas[]" type="checkbox"
                                                        id="inlineCheckbox{{ $item->id }}" value="{{ $item->id }}"
                                                        onclick="isiKapasitas({{ $item->id }})">
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox{{ $item->id }}">{{ $item->name }}</label>
                                                </div>
                                                <input type="number" class="form-control" id="id{{ $item->id }}"
                                                    name="capacity_{{ $item->id }}" placeholder="Kapasitas ex. 100"
                                                    disabled>
                                            </div>

                                            <?php $cls++; ?>
                                        @endforeach
                                    </div>

                                    @if ($cls == 0)
                                        <div class="alert alert-warning">Belum ada daftar kelas, silahkan tambahkan terlebih
                                            dahulu</div>
                                    @endif

                                    <div class="col-md-12 mt-3">
                                        <label for="" class="small" style="font-style:italic">Tambahkan kelas di
                                            Menu Kelas Kapal</label>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex justify-content-end">
                                    <a href="/admin/ships" class="btn btn-md btn-danger me-2">Cancel</a>
                                    <button type="submit"
                                        class="btn btn-md btn-success {{ $cls == 0 ? 'disabled' : '' }}">Save</button>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script>
        function isiKapasitas(x) {
            var chk = $('#inlineCheckbox' + x).is(":checked");
            var id = "#id" + x;

            if (chk == true) {
                $(id).prop("disabled", false);
                $(id).focus();
            }else{
                $(id).prop("disabled", true);
            }
        }
    </script>
@endsection
