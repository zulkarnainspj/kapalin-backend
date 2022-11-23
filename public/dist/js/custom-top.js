function getPersons() {
    var person = $('#jumlahPenumpang').val();
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
                $('#kodeBooking').text(kode);

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