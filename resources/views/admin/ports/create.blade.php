@extends('admin.layout.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pelabuhan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active"><a href="/ports">Pelabuhan</a></li>
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
                                    <form action="/admin/ports/store" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="code">Kode</label>
                                                    <input type="text" name="code" id="code" placeholder="ex. SPK"
                                                        class="form-control" maxlength="4" autofocus autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Nama Pelabuhan</label>
                                                    <input type="text" name="name" id="name" placeholder="ex. Sapeken"
                                                        class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-12 d-flex justify-content-end">
                                                <a href="/admin/ports" class="btn btn-danger mr-2">Cancel</a>
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
