<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <style>
        body {
            -webkit-user-select: none;
            /* Safari */
            -ms-user-select: none;
            /* IE 10 and IE 11 */
            user-select: none;
            /* Standard syntax */
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container">
        <div class="col-md-12 mt-3" style="color:#636e72">
            <div class="alert alert-warning">
                <p class="m-0">Silahkan lakukan pembayaran!</p>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <h6 class="m-0" style="font-weight: normal; font-size: 12px">Kode Booking</h6>
                    <h4 class="m-0" style="font-size: 20px;">
                        {{ $tiket->ticket_code }}</h4>
                </div>
            </div>

            <h6 class="mt-3 mb-0" style="font-weight: normal; font-size: 12px">Pemesan</h6>
            <h4 class="m-0" style="font-size: 15px">{{ $tiket->user->name }}</h4>

            <h6 class="mt-3 mb-0" style="font-weight: normal; font-size: 12px">Informasi Kapal</h6>
            <h4 class="m-0" style="font-size: 15px">{{ $tiket->schedule->ship->name }}</h4>
            <h6 class="m-0" style="font-size: 12px">({{ $tiket->schedule->kelas }})</h6>
            <h6 class="m-0" style="font-size: 12px">{{ $route->port }} - {{ $route->next_port }}</h6>
            <h6 class="m-0" style="font-size: 12px">{{ date_create($tiket->schedule->etd)->format('d/m/Y H:i') }} WIB
                - {{ date_create($tiket->schedule->eta)->format('d/m/Y H:i') }} WIB</h6>

            <h6 class="mt-3 mb-2" style="font-weight: normal; font-size: 12px">Penumpang</h6>
            <hr class="m-0">
            <table class="table" style="font-size: 11px">
                <tbody>
                    @php
                        $jum = 0;
                    @endphp
                    @foreach ($passengers as $item)
                        @php
                            $date_now = date_create();
                            $date_of_birth = date_create($item->passenger->date_of_birth);
                            $diff = date_diff($date_now, $date_of_birth);
                            $jum++;
                        @endphp
                        <tr>
                            @php
                                $doh = $item->passenger->date_of_birth;
                                $tgl_lahir = '';
                                if ($doh) {
                                    if ($doh < 1) {
                                        $tgl_lahir = '(<1)';
                                    } else {
                                        $tgl_lahir = '(' . $diff->y . ')';
                                    }
                                }
                            @endphp
                            <td>{{ $item->passenger->name . ' ' . $tgl_lahir }}</td>
                            <td align="center">{{ $item->passenger->gender == 1 ? 'Pria' : 'Wanita' }}</td>
                            <td align="right">Rp. {{ number_format($tiket->schedule->price, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th colspan="2" style="text-align: right">TOTAL</th>
                        <th style="text-align: right">Rp.
                            {{ number_format($tiket->schedule->price * $jum, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
            @if ($tiket->status == 1 || $tiket->status == 2)
                <div class="d-flex justify-content-center mt-4">
                    {!! DNS2D::getBarcodeHTML($tiket->ticket_code, 'QRCODE', 5, 5) !!}
                </div>

                <div class="text-center mt-3 mb-5">
                    <h3>{{ $tiket->ticket_code }}</h3>
                </div>
            @endif

            <div class="col-md-12" style="font-size: 15px">
                <p class="m-0" style="font-weight:bold">Informasi Pembayaran</p>
                <p class="m-0" style="font-size:12px">Silahkan lakukan transfer sesuai total harga tiket ke salah
                    satu Nomor Rekening berikut :</p>
                <div class="card mt-1">
                    <div class="card-body">
                        <table class="table" style="font-size:12px">
                            <tr align="center">
                                <th>Bank</th>
                                <th>Nama</th>
                                <th>No. Rek</th>
                            </tr>

                            <tr>
                                <td class="text-center">BRI</td>
                                <td>Syahbandar SPK</td>
                                <td class="text-center">2138415342</td>
                            </tr>

                            <tr>
                                <td class="text-center">BCA</td>
                                <td>Syahbandar SPK</td>
                                <td class="text-center">3413713236</td>
                            </tr>

                            <tr>
                                <td class="text-center">Mandiri</td>
                                <td>Syahbandar SPK</td>
                                <td class="text-center">2123141723</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 mt-3 mb-5">
                    <form action="{{ route('cus-payment') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ticket_code" value="{{ $tiket->ticket_code }}">

                        <p class="m-0" style="font-size:12px">Setelah melakukan transfer silahkan isi data berikut
                            dengan benar.</p>
                        <div class="form-group mt-2">
                            <label for="name">Nama Pengirim</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap"
                                required>

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="bank">Nama Bank Pengirim</label>
                            <input type="text" name="bank" id="bank"
                                class="form-control @error('bank') is-invalid @enderror" placeholder="ex. BRI" required>

                            @error('bank')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="no_rek">Nomor Rekening Pengirim</label>
                            <input type="number" name="no_rek" id="no_rek"
                                class="form-control @error('no_rek') is-invalid @enderror" placeholder="ex. 4123123"
                                required>

                            @error('no_rek')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group mt-2">
                            <label for="receipt">Bukti Transfer</label>
                            <input type="file" name="receipt" id="receipt"
                                class="form-control @error('receipt') is-invalid @enderror" required>
                            @error('receipt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success mt-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
