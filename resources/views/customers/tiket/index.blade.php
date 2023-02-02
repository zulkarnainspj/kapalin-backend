<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">
    <title>Bukti Pemesanan</title>
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

    <div class="container">
        <div class="col-md-12 mt-3" style="color:#636e72">
            <div class="d-flex justify-content-between">
                <div>
                    <h6 class="m-0" style="font-weight: normal; font-size: 12px">Kode Booking</h6>
                    <h4 class="m-0"
                        style="font-size: 20px; {{ $tiket->status == 3 ? 'text-decoration:line-through' : '' }}">
                        {{ $tiket->ticket_code }}</h4>
                </div>

                @if ($tiket->status == 1 || $tiket->status == 2)
                    <a href="/cus/{{ $tiket->ticket_code }}/download" class="btn btn-sm btn-primary">Simpan Bukti</a>
                @elseif($tiket->status == 3)
                    <img src="{{ url('') }}/dist/img/completed.png" style="width: 130px" alt="">
                @elseif($tiket->status == 0)
                    <img src="{{ url('') }}/dist/img/cancelled.png" style="width: 130px" alt="">
                @endif
            </div>

            <h6 class="mt-3 mb-0" style="font-weight: normal; font-size: 12px">Pemesan</h6>
            <h4 class="m-0" style="font-size: 15px">{{ $tiket->user->name }}</h4>

            <h6 class="mt-3 mb-0" style="font-weight: normal; font-size: 12px">Informasi Kapal</h6>
            <h4 class="m-0" style="font-size: 15px">{{ $tiket->schedule->ship->name }}</h4>
            <h6 class="m-0" style="font-size: 12px">{{ $rute->name }} - {{ $next_route->name }}</h6>
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

            <div class="col-md-12" style="font-size: 12px">
                <p style="font-weight: bold" class="m-0">Penukaran Tiket</p>
                <p class="m-0">Kantor Pelabuhan Sapeken</p>

                <p style="font-weight: bold" class="mx-0 mb-0 mt-3">Syarat dan Ketentuan</p>
                <ol class="mb-4">
                    <li>Bukti Pembayaran ini wajib ditukar menjadi tiket selambat-lambatnya 2 jam sebelum kapal
                        berangkat di kantor cabang atau terminal penumpang</li>
                    <li>Kode booking yang tertera pada Bukti Pembelian adalah bersifat rahasia, Kapalin tidak
                        bertanggung jawab apabila terjadi penyalah gunaan kode booking yang digunakan pihak lain.</li>
                    <li>Pengangkut tidak bertanggungjawab atas kerugian yang ditimbulkan akibat pembatalan/keterlambatan
                        calon penumpang</li>
                    <li>Penumpang dilarang berjudi, mengkonsumsi minuman keras, berdagang di atas kapal, dan membawa
                        barang-barangterlarang</li>
                    <li>Barang terlarang yaitu:
                        <ul>
                            <li>Petasan, bahan peledak, senjata api dan senjata lainnya</li>
                            <li>Barang-barang berbau</li>
                            <li>Barang-barang yang berbahaya</li>
                            <li>Barang-barang yang mengotori</li>
                            <li>Hewan</li>
                            <li>Narkoba</li>
                            <li>Barang-barang yang dilarang perundangan yang berlaku</li>
                        </ul>
                    </li>
                    <li>Kapalin dan penyedia kapal tidak bertanggung jawab atas hilang/rusaknya tiket dan barang-barang
                        bawaan penumpang</li>
                    <li>Penumpang diharapkan untuk mengikuti perubahan waktu keberangkatan kapal yang mungkin terjadi
                        dan selambatnya 2 jam sebelum kapal berangkat sudah berada di terminal penumpang.</li>
                    <li>Check in ditutup 15 menit sebelum waktu keberangkatan.</li>
                </ol>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
