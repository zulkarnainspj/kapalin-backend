<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">
    <title>Data Penumpang</title>
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
            <form action="/cus/submit" method="POST" autocomplete="off">
                @csrf
                <input type="hidden" name="j_penumpang" value="{{ $j_penumpang }}">
                <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                <input type="hidden" name="uid" value="{{ $pemesan }}">
                <input type="hidden" name="ticket_code" value="KB{{ date_create()->format('Hidysm') }}">
                <h6 class="m-0">{{ $schedule->ship->name }}</h6>
                <p class="m-0">{{ $route->port }} - {{ $route->next_port }}</p>
                <p class="m-0">Rp. {{ number_format($price, 0, ',', '.') }} ({{ $j_penumpang }} org) -
                    {{ $schedule->kelas }}</p>

                <hr>

                <h5 class="mt-3">Pemesan</h5>
                <div class="form-group">
                    <label for="nama_pemesan">Nama</label>
                    <input type="text" class="form-control mt-2" name="nama_pemesan" id="nama_pemesan"
                        style="border-color: #0984e3" value="{{ $pemesan->name }}" readonly>
                </div>

                <div class="form-group mt-2">
                    <label for="email_pemesan">Email</label>
                    <input type="email" class="form-control mt-2" name="email_pemesan" id="email_pemesan"
                        style="border-color: #0984e3" value="{{ $pemesan->email }}" readonly>
                </div>

                <hr>

                <h5>Penumpang</h5>
                @for ($i = 0; $i < $j_penumpang; $i++)
                    <div class="mb-2">
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="nama_penumpang" style="color: #0984e3">Penumpang
                                    {{ $i + 1 }}</label>
                                @if ($i == 0)
                                    <div style="font-size:12px">
                                        <input class="form-check-input" type="checkbox" name="penumpang1"
                                            id="penumpang1" onchange="penumpangSatu()">
                                        <label class="form-check-label" for="penumpang1">Sama
                                            dengan Pemesan</label>
                                    </div>
                                @endif
                            </div>

                            <label for="nama_penumpang_{{ $i }}">Nama Lengkap</label>
                            <input type="text"
                                class="form-control mt-2 @error("nama_penumpang.$i") is-invalid @enderror"
                                name="nama_penumpang[]" id="nama_penumpang_{{ $i }}"
                                style="border-color: #0984e3" value="{{ old('nama_penumpang.' . $i) }}" required>

                            @error("nama_penumpang.$i")
                                <div class="invalid-feedback">
                                    {{ str_replace("nama_penumpang.$i", 'Nama', $message) }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="no_id_{{ $i }}">No. ID</label>
                            <input type="number" class="form-control mt-2 @error("no_id.$i") is-invalid @enderror"
                                name="no_id[]" id="no_id_{{ $i }}" style="border-color: #0984e3"
                                placeholder="No. Identitas (KTP/SIM/PASPORT)" value="{{ old('no_id.' . $i) }}"
                                required>
                            @error("no_id.$i")
                                <div class="invalid-feedback">
                                    {{ str_replace("no id.$i", 'No. Identitas', $message) }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="form-check mt-2">
                            <label for="jenis_kelamin_{{ $i }}">Jenis Kelamin</label> <br>
                            <div class="form-check form-check-inline" style="font-size:20px">
                                <input class="form-check-input" type="radio" name="jenis_kelamin_p[]" id="jenis_kelamin_p_{{ $i }}"
                                    value="1" checked>
                                <label class="form-check-label" for="jenis_kelamin_p_{{ $i }}">Pria</label>
                            </div>

                            <div class="form-check form-check-inline" style="font-size:20px">
                                <input class="form-check-input" type="radio" name="jenis_kelamin_w[]" id="jenis_kelamin_w_{{ $i }}"
                                    value="1">
                                <label class="form-check-label" for="jenis_kelamin_w_{{ $i }}">Wanita</label>
                            </div>
                        </div> --}}

                        <div class="form-group mt-2">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender[]" class="form-control" id="gender_{{ $i }}">
                                <option value="1">Pria</option>
                                <option value="2">Wanita</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <label for="date_of_birth">Tanggal Lahir</label>
                                <input type="date" step="any" class="form-control mt-2" name="date_of_birth[]"
                                    value="{{ old('date_of_birth.' . $i) }}" id="date_of_birth_{{ $i }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endfor


                <div class="col-md-12 text-center mt-4 mb-5">
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function penumpangSatu() {
            if (document.getElementById("penumpang1").checked == true) {
                var psg_name = $('#nama_penumpang_1').val();

                var name, no_id, gender, date_of_birth;

                $.ajax({
                    url: "/cus/get/{{ $pemesan->email }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        name = data.name;
                        no_id = data.no_id;
                        gender = data.gender;
                        date_of_birth = data.date_of_birth;

                        $('#nama_penumpang_0').val(name);
                        $('#no_id_0').val(no_id);
                        $('#gender_0').val(gender);
                        $('#date_of_birth_0').val(date_of_birth);
                    }
                });
            } else {
                $('#nama_penumpang_0').val('');
                $('#no_id_0').val('');
                $('#gender_0').val(1);
                $('#date_of_birth_0').val('');
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
