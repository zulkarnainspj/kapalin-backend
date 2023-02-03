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

        .tbl td,
        .tbl th {
            border-left: 0.01em solid rgb(119, 119, 119);
            border-right: 0.01em solid rgb(119, 119, 119);
            border-top: 0.01em solid rgb(119, 119, 119);
            border-bottom: 0.01em solid rgb(119, 119, 119);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="col-md-12 mt-3" style="color:#636e72">
            <div class="d-flex">
                <table class="table">
                    <tr>
                        <td style="vertical-align: middle">
                            <h6 class="m-0" style="font-weight: bold; font-size: 20px">LAPORAN DATA PENUMPANG</h6>
                        </td>

                        <td style="text-align: right">
                            <img src="{{ url('') }}/apollo/assets/images/logos/kapalin-logo.png"
                                class="img-responsive mr-2" style="height: 40px" alt="">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-md-12" style="font-size: 15px">
                <p class="m-0" style="font-weight: bold">{{ $schedule->ship->name }}</p>
                <p class="m-0">{{ $route->port . ' - ' . $route->next_port }}</p>
                <p style="font-weight: normal; font-size: 12px" class="m-0">
                    {{ $schedule->etd . ' - ' . $schedule->eta }}</p>
            </div>

            <div class="col-md-12 my-3">
                <table class="table tbl">
                    <thead>
                        <tr style="text-align: center">
                            <th>#</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Usia</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    @foreach ($ticket as $item)
                        @php
                            $date_now = date_create();
                            $date_of_birth = date_create($item->date_of_birth);
                            $diff = date_diff($date_now, $date_of_birth);
                        @endphp
                        <tbody>
                            <tr>
                                @php
                                    $doh = $item->date_of_birth;
                                    $tgl_lahir = '';
                                    if ($doh) {
                                        if ($doh < 1) {
                                            $tgl_lahir = '<1';
                                        } else {
                                            $tgl_lahir = $diff->y;
                                        }
                                    }
                                @endphp
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td style="text-align: center">{{ $item->no_id }}</td>
                                <td><span style="margin-left: 5px">{{ $item->name }}</span></td>
                                <td style="text-align: center">{{ $tgl_lahir }}</td>
                                <td style="text-align: center">{{ $item->gender == 1 ? 'Pria' : 'Wanita' }}</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>

            <div class="col-md-12" style="font-size: 12px">
                <p class="mb-2" style="font-style: italic">Dicetak oleh <strong>{{ auth()->user()->name }}</strong> pada {{ date_create()->format('d/m/Y H:i:s') }}</p>
                <p class="mx-0 my-2">* Daftar penumpang yang dicetak merupakan penumpang yang sudah melakukan check in di loket</p>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
