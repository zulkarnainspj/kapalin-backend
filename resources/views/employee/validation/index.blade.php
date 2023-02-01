@extends('employee.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/employee/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Validasi Tiket</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="container-fluid mb-3">
        <!-- Page Title-->
        <h2 class="fs-3 fw-bold my-3">Validasi Tiket</h2>
        <!-- / Page Title-->

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="mr-2 w-75">
                                <input type="text" class="form-control" id="ticketCode"
                                    style="font-size: 30px; height:50px"
                                    onkeydown="(event.keyCode == 13) ? validasiTiket() : ''" value="{{ isset($_GET['id']) ? $_GET['id'] : '' }}" autocomplete="off" autofocus>
                            </div>
                            <div>
                                <button class="btn btn-success" style="height:50px; margin-left:10px" onclick="validasiTiket()">Check In</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3 d-flex justify-content-center">
                        <div class="alert alert-danger w-75" id="OnError" style="display: none;">Data tidak ditemukan!, silahkan periksa kembali!</div>
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

                                            <div class="text-dark">
                                                <p class="card-text">
                                                    Total Harga
                                                </p>
                                                <h1 id="harga">Rp. 50.000</h1>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-end">
                                    <form action="/employee/tickets/print" method="POST" target="_blank">
                                        @csrf
                                        <input type="hidden" name="ticket_code" id="tCodeLink">
                                        <button class="btn btn-primary">Cetak Tiket</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/. container-fluid -->
            </div>
        </div>
    </section>
@endsection
