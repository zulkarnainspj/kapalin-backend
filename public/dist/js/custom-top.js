function formatRupiah(angka, prefix) {
    var angka = angka + '';
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function getPersons() {
    var person = $('#jumlahPenumpang').val();
    var price = $('#price').val();
    var harga = $('#hargaTiket');

    harga.text(formatRupiah(price * person, 'Rp. '));

    var pers2 = $('#pers2');
    var pers3 = $('#pers3');
    var pers4 = $('#pers4');
    var pers5 = $('#pers5');

    if (person == 1) {
        pers2.css('display', 'none');
        pers3.css('display', 'none');
        pers4.css('display', 'none');
        pers5.css('display', 'none');
    } else if (person == 2) {
        pers2.css('display', 'block');
        pers3.css('display', 'none');
        pers4.css('display', 'none');
        pers5.css('display', 'none');
    } else if (person == 3) {
        pers2.css('display', 'block');
        pers3.css('display', 'block');
        pers4.css('display', 'none');
        pers5.css('display', 'none');
    } else if (person == 4) {
        pers2.css('display', 'block');
        pers3.css('display', 'block');
        pers4.css('display', 'block');
        pers5.css('display', 'none');
    } else if (person == 5) {
        pers2.css('display', 'block');
        pers3.css('display', 'block');
        pers4.css('display', 'block');
        pers5.css('display', 'block');
    }
}

function getRoutes() {
    var shipID = $('#ship').val();

    $('#route')
        .find('option')
        .remove()
        .end()
        .append('<option value="0">Pilih Rute</option>');

    $('#schedule')
        .find('option')
        .remove()
        .end()
        .append('<option value="0">Pilih Jadwal</option>');

    $.ajax({
        url: "/employee/tickets/route/" + shipID,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, values) {

                route_id = data[key].route_id;
                name = data[key].name;
                $('#route').append('<option value="' + route_id + '">Sapeken - ' + name +
                    '</option>');
            });

        }

    });
}

function getSchedules() {
    var shipID = $('#ship').val();
    var routeID = $('#route').val();
    $('#schedule')
        .find('option')
        .remove()
        .end()
        .append('<option value="0">Pilih Jadwal</option>');

    $.ajax({
        url: "/employee/tickets/schedule/" + shipID + "/" + routeID,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, values) {
                schedule_id = data[key].id;
                temp_etd = data[key].etd;
                const etd = new Date(temp_etd);
                etd_hours = (etd.getHours() < 10) ? '0' + etd.getHours() : etd.getHours();
                etd_minutes = (etd.getMinutes() < 10) ? '0' + etd.getMinutes() : etd.getMinutes();
                etd_format = etd.getDate() + '-' + etd.getMonth() + '-' + etd.getFullYear() + ' ' + etd_hours + ':' + etd_minutes;
                $('#schedule').append('<option value="' + schedule_id + '">' + etd_format + '</option>');

            });
        }

    });
}

function getPrice() {
    var scheduleID = $('#schedule').val();
    var price = $('#price');
    var harga = $('#hargaTiket');
    var person = $('#jumlahPenumpang').val();

    $.ajax({
        url: "/employee/tickets/price/" + scheduleID,
        type : 'GET',
        dataType : 'json',
        success : function (data) {
            price.val((data.price));
            harga.text(formatRupiah(price.val() * person, 'Rp. '));
        }
    });
}

function validasiTiket() {
    var tCode = $('#ticketCode').val();
    var ship = $('#ship');
    var route = $('#route');
    var uName = $('#pemesan');
    var persons = $('#penumpang');
    var keberangkatan = $('#etd');
    var price = $('#harga');
    var tCodeLink = $('#tCodeLink');

    $.ajax({
        url: "/employee/tickets/validate/" + tCode,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            ship.text(data.ticket.sname);
            route.text('Sapeken - ' + data.ticket.pname);
            uName.text(': ' + data.ticket.uname);
            persons.text(': ' + data.person);

            tCodeLink.val(tCode);

            // ETD
            const etd = new Date(data.ticket.etd);
            const month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

            etd_hours = (etd.getHours() < 10) ? '0' + etd.getHours() : etd.getHours();
            etd_minutes = (etd.getMinutes() < 10) ? '0' + etd.getMinutes() : etd.getMinutes();
            etd_format = etd.getDate() + ' ' + month[etd.getMonth()] + ' ' + etd.getFullYear() + ' ' + etd_hours + ':' + etd_minutes;
            keberangkatan.text(': ' + etd_format);

            // Price
            price.text(formatRupiah(data.ticket.price, 'Rp. '));
            $('#informasiTiket').css('display', 'block');
        }
    });
    
}