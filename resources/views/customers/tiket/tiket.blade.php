<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">
    <title>Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        @page {
            margin: 0px;
        }

        .tbl td,
        .tbl th {
            border-left: 0;
            border-right: 0.01em solid #ccc;
            border-top: 0;
            border-bottom: 0.01em solid #ccc;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="col-md-12 mt-3" style="color:#000000">
            <table class="table">
                <tr>
                    <td>
                        <h2>KAPALIN</h2>
                        <h5>Bukti Pemesanan Tiket</h5>
                        <p>Bukti ini harus sesuai dengan Kartu Identitas (KTP/SIM/PASSPORT)</p>
                    </td>

                    <td style="width: 30px">
                        <div class="text-center">
                            {{-- {!! DNS1D::getBarcodeHTML($tiket->ticket_code, 'C39', 1.5, 33) !!} --}}
                            {!! DNS2D::getBarcodeHTML($tiket->ticket_code, 'QRCODE', 5, 5) !!}
                        </div>
                    </td>
                </tr>
            </table>

            <table style="width: 500px">
                <tr>
                    <td>
                        <h6 class="mt-2">Kode Booking : </h6>
                    </td>
                    <td>
                        <h1>{{ $tiket->ticket_code }}</h1>
                    </td>
                </tr>
            </table>

            <hr>

            <table style="width:100%">
                <tr>
                    <td style="width:50%">
                        <table class="table">
                            <tr>
                                <th colspan="2">Pemesan</th>
                            </tr>

                            <tr>
                                <td>Tanggal</td>
                                <td>: {{ date_create($tiket->created_at)->format('d/m/y H:i') }} WIB</td>
                            </tr>

                            <tr>
                                <td>Nama</td>
                                <td>: {{ $tiket->user->name }}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>: {{ $tiket->user->email }}</td>
                            </tr>
                        </table>
                    </td>

                    <td style="width:50%">
                        <table class="table">
                            <tr>
                                <th colspan="2">Jadwal Keberangkatan</th>
                            </tr>

                            <tr>
                                <td>Kapal</td>
                                <td>: {{ $tiket->schedule->ship->name }}</td>
                            </tr>

                            <tr>
                                <td>tgl/jam ETD</td>
                                <td>: {{ date_create($tiket->schedule->etd)->format('d/m/y H:i') }} WIB</td>
                            </tr>

                            <tr>
                                <td>tgl/jam ETA</td>
                                <td>: {{ date_create($tiket->schedule->eta)->format('d/m/y H:i') }} WIB</td>
                            </tr>

                            <tr>
                                <td>Rute</td>
                                <td>: {{ $rute->name }} - {{ $rute->next_route }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <div class="col-xs-12 mt-2">
                <table class="table tbl" border="1">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Nama</th>
                            <th>ID</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Harga</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $jum = 0;
                        @endphp
                        @foreach ($persons as $item)
                            @php
                                $date_now = date_create();
                                $date_of_birth = date_create($item->person->date_of_birth);
                                $diff = date_diff($date_now, $date_of_birth);
                                $jum++;
                            @endphp
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>
                                <td>{{ $item->person->name }}</td>
                                <td align="center">{{ $item->person->no_id }}</td>
                                <td align="center">{{ $item->person->gender == 1 ? 'Pria' : 'Wanita' }}</td>
                                <td align="center">
                                    @php
                                        $doh = $item->person->date_of_birth;
                                        if ($doh) {
                                            if ($doh < 1) {
                                                echo '<1';
                                            } else {
                                                echo $diff->y;
                                            }
                                        }
                                    @endphp
                                </td>
                                <td align="center">Rp. {{ number_format($tiket->schedule->price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <th colspan="5" style="text-align: right">TOTAL</th>
                            <th style="text-align: center">Rp.
                                {{ number_format($tiket->schedule->price * $jum, 0, ',', '.') }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-12 mt-3" style="font-size: 15px">
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
