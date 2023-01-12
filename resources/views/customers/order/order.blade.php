<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="col-md-12 mt-3" style="color:#636e72">
            <form action="">
                <h5>Pemesan</h5>
                <div class="form-group">
                    <label for="nama_pemesan">Nama</label>
                    <input type="text" class="form-control mt-2" name="nama_pemesan" id="nama_pemesan"
                        style="border-color: #0984e3">
                </div>

                <div class="form-group mt-2">
                    <label for="email_pemesan">Email</label>
                    <input type="text" class="form-control mt-2" name="email_pemesan" id="email_pemesan"
                        style="border-color: #0984e3">
                </div>

                <hr>

                <h5>Penumpang</h5>
                @for ($i = 0; $i < $j_penumpang; $i++)
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="nama_penumpang">Penumpang {{ $i + 1 }}</label>
                            <input type="text" class="form-control mt-2" name="nama_penumpang[]" id="nama_penumpang"
                                style="border-color: #0984e3">
                        </div>

                        <div class="form-group mt-2">
                            <label for="jenis_kelamin">Jenis Kelamin</label> <br>
                            <div class="form-check form-check-inline" style="font-size:20px">
                                <input class="form-check-input" type="radio" name="jenis_kelamin[]" id="inlineRadio1"
                                    value="1">
                                <label class="form-check-label" for="inlineRadio1">Pria</label>
                            </div>

                            <div class="form-check form-check-inline" style="font-size:20px">
                                <input class="form-check-input" type="radio" name="jenis_kelamin[]" id="inlineRadio1"
                                    value="1">
                                <label class="form-check-label" for="inlineRadio1">Wanita</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <label for="date_of_birth">Tanggal Lahir</label>
                                <input type="date" step="any" class="form-control mt-2" name="date_of_birth[]"
                                    value="{{ old('date_of_birth.4') }}" id="date_of_birth">
                            </div>
                        </div>
                    </div>
                    <hr>
                @endfor


                <div class="col-md-12 text-center mt-4 mb-5">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
