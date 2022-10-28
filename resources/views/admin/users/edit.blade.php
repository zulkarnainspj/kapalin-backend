@extends('admin.layout.main')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Admin / Petugas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active"><a href="/users">Admin & Petugas</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
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
                                                <label for="name">Nama</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    autofocus autocomplete="off" value="{{ $user->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Tanggal Lahir</label>
                                                <input type="date" step="any" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ isset($user->profile->date_of_birth) ? $user->profile->date_of_birth : '' }}" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Alamat</label>
                                                <textarea name="address" id="address" cols="30" rows="2" class="form-control">{{ isset($user->profile->address) ? $user->profile->address : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3>Akun</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    autofocus autocomplete="off" value="{{ $user->name }}" required>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hp">HP</label>
                                                <input type="number" name="hp" id="hp" minlength="11"
                                                    maxlength="13" class="form-control" value="{{ $user->phone }}" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control"
                                                    autocomplete="off" required>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" id="password" class="form-control"
                                                    autocomplete="off" required>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select name="role" id="role" class="form-control">
                                                    <option value="0" {{ ($user->role == 0) ? 'selected' : '' }}>Admin</option>
                                                    <option value="1" {{ ($user->role == 1) ? 'selected' : '' }}>Petugas</option>
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

                            
                            <div class="col-md-12 d-flex justify-content-end" id="submitPetugas">
                                    <a href="/admin/users" class="btn btn-danger mr-2">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>

    {{-- <script>
        function cekRole() {
            var role = $('#role').val();
            var dataPetugas = $('#dataPetugas');

            if (role == 1) {
                dataPetugas.css('display', 'block');
            } else {
                dataPetugas.css('display', 'none');
            }
        }
    </script> --}}
@endsection
