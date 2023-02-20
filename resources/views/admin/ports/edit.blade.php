@extends('admin.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/ports">Pelabuhan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- / Breadcrumbs-->
    <section class="container-fluid mb-3">
        <!-- Page Title-->
        <h2 class="fs-3 fw-bold my-3">Ubah Data Pelabuhan</h2>

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="/admin/ports/update" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $port->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="code">Kode</label>
                                        <input type="text" name="code" id="code" placeholder="ex. SPK"
                                            class="form-control @error('code') is-invalid @enderror" maxlength="4" value="{{ $port->code }}" autofocus
                                            autocomplete="off">
                                        
                                        @error('code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama Pelabuhan</label>
                                        <input type="text" name="name" id="name" value="{{ $port->name }}"
                                            placeholder="ex. Sapeken" class="form-control @error('name') is-invalid @enderror" autocomplete="off">
                                        
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror 
                                    </div>
                                </div>

                                <div class="col-md-12 d-flex justify-content-end">
                                    <a href="/admin/ports" class="btn btn-danger me-2">Cancel</a>
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
