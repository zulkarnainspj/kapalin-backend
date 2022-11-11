function getRoute() {
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

function getSchedule() {
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

$(function () {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});

function validasiTiket() {
    $('#informasiTiket').css('display', 'block');
}