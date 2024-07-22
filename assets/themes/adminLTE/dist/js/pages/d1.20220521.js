var $tableOmzet;
var salesChart = null;
var salesGraphChart = null;

$(function() {

    'use strict';
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

    $("#FormPengumuman").validate();
    $(".btn-pengumuman").on('click', function() {
        $("#FormPengumuman").trigger("reset");
        $("#FormPengumuman").validate().resetForm();
        $('#FormPengumuman').find('.is-invalid').removeClass('is-invalid');
        $("#formId").val(0);
        $('#modal-formPengumuman').modal('toggle');
    });

    $(".todo-list").on('click', '.btn-edit', function() {
        $("#FormPengumuman").trigger("reset");
        $("#FormPengumuman").validate().resetForm();
        $('#FormPengumuman').find('.is-invalid').removeClass('is-invalid');
        let $li = $(this).closest('li');
        let id = $li.find('.id_pengumuman').val();
        let judul = $li.find('span.judul-text').html();
        let isi = $li.find('span.isi-text').html();
        $("#formId").val(id);
        $("#judul").val(judul);
        $("#isi").val(isi);
        $('#modal-formPengumuman').modal('toggle');
    });

    $(".todo-list").on('click', '.btn-delete', function() {
        let $li = $(this).closest('li');
        let id = $li.find('.id_pengumuman').val();

        bootbox.confirm({
            title: "Konfirmasi",
            message: "Apakah Anda Yakin ?",
            centerVertical: true,
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Tidak',
                    className: 'btn-danger'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Ya',
                    className: 'btn-success'
                }
            },
            callback: function(result) {
                if (result === true) {
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "Dashboard/deletePengumuman",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $li.remove();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#FormPengumuman").submit(function(event) {
        event.preventDefault();
        if ($("#FormPengumuman").valid()) {
            let judul = $("#judul").val();
            let isi = $("#isi").val();
            let id = $("#formId").val();
            let data = { id: id, judul: judul, isi: isi };

            let aSave = $.ajax({
                type: "POST",
                url: BASE_URL + "Dashboard/savePengumuman",
                data: JSON.stringify(data),
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });

            $.when(aSave).done(function(response) {
                if (response.status) {
                    console.log(response.data.id);
                    let template = `<li><input type="hidden" class="id_pengumuman" name="id_pengumuman" value="${response.data.id}">
            <span class="text judul-text ">${judul}</span>
            <span class="text isi-text d-none">${isi}</span>      
            <div class="tools">
              <i class="fas fa-edit btn-edit"></i>
              <i class="fas fa-trash btn-delete"></i>
            </div>
          </li>`;

                    let $ul = $('ul.todo-list');
                    if (id === 0) {
                        $ul.prepend(template);
                    } else {
                        let $input = $('input.id_pengumuman').filter(function() { return this.value == id });
                        $input.parent('li').replaceWith(template);

                    }

                    Toast.fire({
                        icon: 'success',
                        title: 'Data berhasil disimpan'
                    });
                } else
                    console.log(response.message);
            });

            $('#modal-formPengumuman').modal('toggle');
        }
    });

    // bootstrap WYSIHTML5 - text editor
    $('.textarea').summernote();

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
        window.alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    });

    /* jQueryKnob */
    $('.knob').knob();

    // The Calender
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true
    });
    chartBinding(moment(new Date()).format('YYYY-MM-DD'));
    $("#datePilihTanggal").on("change.datetimepicker", ({ date, oldDate }) => {
        //Use date and oldDate here
        chartBinding(moment(date._d).format('YYYY-MM-DD'));
    });
});

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

    var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d');
    $.getJSON(BASE_URL + 'Dashboard/getMonthlyOmzet', { date: date }, function(data) {
        var labelChart = data['MonthlyOmzet'].map(function(v) { return v['id'] });
        var dataKlinik = data['MonthlyOmzet'].map(function(v) { return v['total_tagihan_klinik'] });
        var dataObat = data['MonthlyOmzet'].map(function(v) { return v['total_tagihan_obat'] });


        var salesChartData = {
            labels: labelChart,
            datasets: [{
                    label: 'Klinik',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: dataKlinik
                },
                {
                    label: 'Obat',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: dataObat
                },
            ]
        };

        var salesChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: true
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Tanggal"
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            return rupiah(value);
                        }
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Omset per hari (Rp)"
                    }
                }]
            },
            tooltips: {
              callbacks: {
                  label: function(tooltipItem, data) {
                      return rupiah(tooltipItem.yLabel);
                  }
              }
            }              
        };


		if(salesChart!==null){
			salesChart.destroy();
		}
        // This will get the first returned node in the jQuery collection.
        salesChart = new Chart(salesChartCanvas, {
            type: 'line',
            data: salesChartData,
            options: salesChartOptions
        });

    });

    var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d');

    $.getJSON(BASE_URL + 'Dashboard/getYearlyOmzet', { date: date }, function(data) {
        var labelChart = data['YearlyOmzet'].map(function(v) { return v['bulan'] });
        var dataKlinik = data['YearlyOmzet'].map(function(v) { return v['total_tagihan_klinik'] });
        var dataObat = data['YearlyOmzet'].map(function(v) { return parseInt(v['total_tagihan_obat']) + parseInt(v['total_tagihan_klinik']) });
        
        //console.log(dataObat);

        var salesGraphChartData = {
            labels: labelChart,
            datasets: [{
                label: 'Omset',
                fill: false,
                borderWidth: 2,
                lineTension: 0,
                spanGaps: true,
                borderColor: '#efefef',
                pointRadius: 3,
                pointHoverRadius: 7,
                pointColor: '#efefef',
                pointBackgroundColor: '#efefef',
                data: dataObat
            }]
        };

        var salesGraphChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false,
            },
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: '#efefef',
                    },
                    gridLines: {
                        display: false,
                        color: '#efefef',
                        drawBorder: false,
                    },
                    scaleLabel: {
                        display: true,
                        fontColor: '#efefef',
                        labelString: "Bulan"
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: true,
                        color: '#efefef',
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        fontColor: '#efefef',
                        callback: function(value, index, values) {
                            return rupiah(value);
                        }
                    },
                    scaleLabel: {
                        display: true,
                        fontColor: '#efefef',
                        labelString: "Omset per hari (Rp)"
                    }
                }]
            },
            tooltips: {
              callbacks: {
                  label: function(tooltipItem, data) {
                      return rupiah(tooltipItem.yLabel);
                  }
              }
            }            
        };

		if(salesGraphChart!==null){
			console.log('destroy');
			salesGraphChart.destroy();
		}
        // This will get the first returned node in the jQuery collection.
        salesGraphChart = new Chart(salesGraphChartCanvas, {
            type: 'line',
            data: salesGraphChartData,
            options: salesGraphChartOptions
        });

    });
}