@extends('employee.layout.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">CPU Traffic</span>
                                <span class="info-box-number">
                                    10
                                    <small>%</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Likes</span>
                                <span class="info-box-number">41,410</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Sales</span>
                                <span class="info-box-number"></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Members</span>
                                <span class="info-box-number"></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <hr style="height: 2px; border-color : #ffff">
                        <h3>Validasi Tiket</h3>
                    </div>

                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="mr-2 w-75">
                            <input type="text" class="form-control" style="font-size: 30px; height:50px"
                                autocomplete="off" autofocus>
                        </div>
                        <div>
                            <button class="btn btn-success" style="height:50px" onclick="validasiTiket()">Cek</button>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 mt-3" id="informasiTiket" style="display: none">
                        <h6>Informasi Pemesanan Tiket</h6>
                        <div class="card bg-transparent mb-3">
                            <div class="card-header" style="background-color: rgba(0,0,0,.1);">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">KM Sabuk Nusantara 115</h4>
                                    <p class="card-text">Sapeken-Pagerungan Besar</p>
                                </div>
                            </div>
                            <div class="card-body text-light">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <div class="">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>Penumpang</th>
                                                    <td>: Zulkarnain</td>
                                                </tr>
                                                <tr>
                                                    <th>ETA</th>
                                                    <td>: 3 November 2022 12:00</td>
                                                </tr>
                                                <tr>
                                                    <th>ETD</th>
                                                    <td>: 4 November 2022 12:00</td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="">
                                            <p class="card-text">
                                                Total Harga
                                            </p>
                                            <h1>Rp. 50.000</h1>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">                                
                                <button class="btn btn-primary">Cetak Tiket</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/. container-fluid -->
        </section>


        <script>
            function validasiTiket(){
                $('#informasiTiket').css('display', 'block');
            }
        </script>
    @endsection
