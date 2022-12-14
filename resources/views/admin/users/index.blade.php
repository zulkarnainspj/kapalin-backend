@extends('admin.layout.main')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin & Petugas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Admin & Petugas</li>
                        </ol>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card">
                                <div class="card-body">
                                    <a href="/admin/users/add" class="btn btn-success"
                                        style="position: absolute; z-index : 1"><i class="fas fa-plus"></i> NEW</a>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>HP</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $item)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td class="text-center">{{ $item->phone }}</td>
                                                    <td class="text-center">{{ $item->email }}</td>
                                                    <td class="text-center">
                                                        @php
                                                            if ($item->role == 0){
                                                                echo 'Admin';
                                                            }else if($item->role == 1){
                                                                echo 'Petugas';
                                                            }else if($item->role == 2){
                                                                echo 'Penumpang';
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td align="center">
                                                        <a href="/admin/users/edit/{{ $item->id }}"
                                                            class="btn btn-sm btn-warning text-light" title="Edit"><span
                                                                class="fas fa-fw fa-edit"></span></a>
                                                        <a href="/admin/users/remove/{{ $item->id }}"
                                                            onclick="return confirm('Are you sure you want to remove this data?');"
                                                            class="btn btn-sm btn-danger" title="Remove"><span
                                                                class="fas fa-fw fa-trash"></span></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
