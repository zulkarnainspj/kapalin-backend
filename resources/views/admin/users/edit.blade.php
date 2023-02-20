@extends('admin.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/users">Pengguna</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->


    <section class="container-fluid mb-3">
        <!-- Page Title-->
        <h2 class="fs-3 fw-bold my-3">Ubah Pengguna</h2>

        <div class="row g-4">
            <div class="col-md-12">
                <form action="/admin/users/update" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="card">
                        <div class="card-header">
                            <h3>Profil</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_id">No ID</label>
                                        <input type="text" name="no_id" id="no_id"
                                            class="form-control @error('no_id') is-invalid @enderror" autofocus
                                            autocomplete="off"
                                            value="{{ isset($user->profile->no_id) ? $user->profile->no_id : '' }}"
                                            required>

                                        @error('no_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror" autofocus
                                            autocomplete="off" value="{{ $user->name }}" required>
                                    </div>

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_of_birth">Tanggal Lahir</label>
                                        <input type="date" step="any" name="date_of_birth" id="date_of_birth"
                                            class="form-control"
                                            value="{{ isset($user->profile->date_of_birth) ? $user->profile->date_of_birth : '' }}"
                                            autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Pria
                                            </option>
                                            <option value="2" {{ $user->gender == 2 ? 'selected' : '' }}>Wanita
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <div class="card-header">
                            <h3>Akun</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="{{ $user->email }}"
                                            class="form-control @error('email') is-invalid @enderror" autocomplete="off"
                                            required>

                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" autocomplete="off">
                                        <label for="" style="font-size:12px">Isi password jika ingin diubah</label>

                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Petugas
                                            </option>
                                            <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Penumpang
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="display : none" id="dataPetugas">
                        <div class="card-header">
                            <h4>Data Petugas</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" step="any" name="tgl_lahir" id="tgl_lahir"
                                            class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 d-flex justify-content-end mt-2" id="submitPetugas">
                        <a href="/admin/users" class="btn btn-danger me-2">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
