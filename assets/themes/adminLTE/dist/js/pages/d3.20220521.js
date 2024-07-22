var $tableOmzet;


$(function() {

    'use strict'
    $tableOmzet = $('#tableOmzet').DataTable({
        columns: [
            { data: "tanggal_bayar", title: "Tanggal", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "jam_bayar", title: "Jam" },
            { data: "no_rm", title: "RM" },
            { data: "nama_pasien", title: "Nama" },
            { data: "jenis_pasien", title: "Jenis Pasien" },
            { data: "no_registrasi", title: "No Reg" },
            { data: "jenis", title: "Jenis" },
            {
                data: null,
                "className": "text-right",
                "render": {
                    "_": "total_tagihan",
                    "filter": "total_tagihan",
                    "display": "total_tagihan_display"
                }
            }
        ]
    });


    $('.daterange').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
    }, function(start, end) {
        window.alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    })



    // The Calender
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true
    })

    chartBinding(moment(new Date()).format('YYYY-MM-DD'));
    $("#datePilihTanggal").on("change.datetimepicker", ({ date, oldDate }) => {
        //Use date and oldDate here
        chartBinding(moment(date._d).format('YYYY-MM-DD'));
    });

})

function chartBinding(date) {

    $.getJSON(BASE_URL + 'Dashboard/getDashboardData', { date: date }, function(data) {

        $("#TodayTransaction").html(data.TodayTransaction);
        $("#TodayOmzet").html(rupiah(data.TodayOmzet));
        $("#TodayPasien").html(data.TodayPasien);
        $("#TodayVisitor").html(data.TodayVisitor);

        $tableOmzet.clear();
        $tableOmzet.rows.add(data.TodayOmzetDetail);
        $tableOmzet.draw();
    });
}