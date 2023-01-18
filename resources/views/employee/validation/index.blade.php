@extends('employee.layout.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Validasi Tiket</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Validasi Tiket</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <hr style="height: 2px; border-color : #ffff">
                        <h3>Validasi Tiket</h3>
                    </div>

                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="mr-2 w-75">
                            <input type="text" class="form-control" id="ticketCode" style="font-size: 30px; height:50px" onkeydown="(event.keyCode == 13) ? validasiTiket() : ''"
                                autocomplete="off" autofocus>
                        </div>
                        <div>
                            <button class="btn btn-success" style="height:50px" onclick="validasiTiket()">Cek</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-5">
                    <div class="alert alert-danger" id="OnError" style="display: none;">Data tidak ditemukan!</div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 mt-3" id="informasiTiket" style="display: none">
                        <h6>Informasi Pemesanan Tiket</h6>
                        <div class="card bg-transparent mb-3">
                            <div class="card-header" style="background-color: rgba(0,0,0,.1);">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title" id="ship"></h4>
                                    <p class="card-text" id="route"></p>
                                </div>
                            </div>
                            <div class="card-body text-light">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <div class="">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>Pemesan</th>
                                                    <td id="pemesan">:</td>
                                                </tr>
                                                <tr>
                                                    <th>Penumpang</th>
                                                    <td id="penumpang">:</td>
                                                </tr>
                                                <tr>
                                                    <th>Keberangkatan</th>
                                                    <td id="etd">:</td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="">
                                            <p class="card-text">
                                                Total Harga
                                            </p>
                                            <h1 id="harga">Rp. 50.000</h1>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <form action="/employee/tickets/print" method="POST">
                                    <input type="hidden" name="ticket_code" id="tCodeLink">
                                    <button class="btn btn-primary">Cetak Tiket</button>
                                </form>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/. container-fluid -->
        </section>
    @endsection
