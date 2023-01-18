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
            margin: 5px;
            size: 45mm 97mm;
        }

        .tbl td,
        .tbl th {
            border-left: 0;
            border-right: 0.01em solid #ccc;
            border-top: 0;
            border-bottom: 0.01em solid #ccc;
        }

        body {
            font-family: 'Courier New', monospace;
        }
    </style>
</head>

<body>

    <div class="container">
        @foreach ($persons as $item)
            <div class="col-md-12 mt-3 text-center" style="color:#000000;">
                <div style="font-size:10px; font-weight:bold">
                    <p style="margin:0">{{ $tiket->schedule->ship->name }}</p>
                    <p style="margin:0">{{ strtoupper($route->name) }} -
                        {{ date_create($tiket->schedule->etd)->format('d-m-Y H:i') }}
                        - {{ strtoupper($next_route->name) }} -
                        {{ date_create($tiket->schedule->eta)->format('d-m-Y H:i') }}</p>
                </div>

                @php
                    $date_now = date_create();
                    $date_of_birth = date_create($item->person->date_of_birth);
                    $diff = date_diff($date_now, $date_of_birth);
                @endphp

                <div style="font-size:12px; margin-top:10px">
                    <p>{{ $item->person->name }} / {{ $diff->y > 0 ? $diff->y : '<1' }} th</p>
                </div>

                <div style="font-size:12px;">
                    <p>-------------------</p>
                    <div style="font-size:12px; font-weight:bold">
                        <table class="table" style="width: 90%">
                            <tr>
                                <th style="text-align: right;">HARGA</th>
                                <th style="text-align: right">Rp.
                                    {{ number_format($tiket->schedule->price, 0, ',', '.') }}</th>
                            </tr>
                        </table>
                    </div>
                    <p>-------------------</p>
                    <p style="font-size:10px">{{ date_create()->format('D, d-m-Y H:i:s') }}</p>
                </div>
                <div style="margin-left:28px">
                    {!! DNS2D::getBarcodeHTML($tiket->ticket_code, 'QRCODE', 5, 5) !!}
                </div>
                <p style="font-size:12px; margin-top:10px">KAPALIN</p>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
