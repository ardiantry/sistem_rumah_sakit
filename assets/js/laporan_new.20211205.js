function getFilter(data) {
    var filter = "";

    if ("tanggal_filter" in data) {
        let pilih_tanggal = $("#pilih_tanggal option:selected").text();
        filter = filter.concat(`${pilih_tanggal}: ${data['tanggal_filter'][0]}`);
    }

    if (("no_rm_from" in data) && ("no_rm_to" in data)) {
        filter = filter.concat(` | No RM: ${data['no_rm_from'][0]} - ${data['no_rm_to'][0]}`);
    }

    if ("nama_pasien" in data) {
        filter = filter.concat(` | Nama Pasien: ${data['nama_pasien'][0]}`);
    }

    if ("nama_pelanggan" in data) {
        filter = filter.concat(` | Nama Pelanggan: ${data['nama_pelanggan'][0]}`);
    }

    if ("no_po" in data) {
        filter = filter.concat(` | No Po: ${data['no_po'][0]}`);
    }

    if ("supplier" in data) {
        filter = filter.concat(` | Supplier: ${$("#supplier option:selected").text()}`);
    }

    if ("keterangan_pemesanan" in data) {
        filter = filter.concat(` | Keterangan Pemesanan: ${data['keterangan_pemesanan'][0]}`);
    }

    if ("no_faktur" in data) {
        filter = filter.concat(` | No Faktur: ${data['no_faktur'][0]}`);
    }

    if ("keterangan_penerimaan" in data) {
        filter = filter.concat(` | Keterangan Penerimaan: ${data['keterangan_penerimaan'][0]}`);
    }

    if ("keterangan_pembayaran" in data) {
        filter = filter.concat(` | Keterangan Pembayaran: ${data['keterangan_pembayaran'][0]}`);
    }

    if ("no_telp" in data) {
        filter = filter.concat(` | No Telp: ${data['no_telp'][0]}`);
    }

    if ("tempat_lahir" in data) {
        filter = filter.concat(` | Tempat Lahir: ${data['tempat_lahir'][0]}`);
    }

    if ("tanggal_lahir" in data) {
        filter = filter.concat(` | Tanggal Lahir: ${data['tanggal_lahir'][0]}`);
    }

    if ("golongan_darah" in data) {
        filter = filter.concat(` | Golongan Darah: ${JSON.stringify(data['golongan_darah'])}`);
    }

    if ("jenis_kelamin" in data) {
        filter = filter.concat(` | Jenis Kelamin: ${JSON.stringify(data['jenis_kelamin'])}`);
    }

    if ("pekerjaan" in data) {
        let label = [];
        $.each(data['pekerjaan'], function(k, id) {
            label.push($(`#checkboxPekerjaan_${id}`).data('label'));
        });

        filter = filter.concat(` | Pekerjaan: ${JSON.stringify(label)}`);
    }

    if ("agama" in data) {
        filter = filter.concat(` | Agama: ${JSON.stringify(data['agama'])}`);
    }

    if ("alamat" in data) {
        filter = filter.concat(` | Alamat: ${data['alamat'][0]}`);
    }

    if ("keterangan_pasien" in data) {
        filter = filter.concat(` | Keterangan Pasien: ${data['keterangan_pasien'][0]}`);
    }

    if ("keterangan_transaksi" in data) {
        filter = filter.concat(` | Keterangan Transaksi: ${data['keterangan_transaksi'][0]}`);
    }

    if ("keterangan_pelanggan" in data) {
        filter = filter.concat(` | Keterangan Pelanggan: ${data['keterangan_pelanggan'][0]}`);
    }

    if ("unit_layanan" in data) {
        filter = filter.concat(` | Unit Layanan: ${$("#unit_layanan option:selected").text()}`);
    }

    if ("dokter" in data) {
        filter = filter.concat(` | Dokter: ${$("#dokter option:selected").text()}`);
    }

    if ("tipe_pasien" in data) {
        filter = filter.concat(` | Tipe Pasien: ${$("#tipe_pasien option:selected").text()}`);
    }

    if ("keterangan_unit_layanan" in data) {
        filter = filter.concat(` | Keterangan Unit Layanan: ${data['keterangan_unit_layanan'][0]}`);
    }

    if ("layanan" in data) {
        filter = filter.concat(` | Layanan: ${$("#layanan option:selected").text()}`);
    }

    if (("layanan_from" in data) && ("layanan_to" in data)) {
        filter = filter.concat(` | Pendapatan Layanan: ${data['layanan_from'][0]} - ${data['layanan_to'][0]}`);
    }

    if ("diagnosis" in data) {
        filter = filter.concat(` | Diagnosis: ${data['diagnosis'][0]}`);
    }

    if ("icd9" in data) {
        filter = filter.concat(` | ICD 9: ${data['icd9'][0]}`);
    }

    if ("icd10" in data) {
        filter = filter.concat(` | ICD 10: ${data['icd10'][0]}`);
    }

    if ("keterangan_pemeriksaan" in data) {
        filter = filter.concat(` | Keterangan Pemeriksaan: ${data['keterangan_pemeriksaan'][0]}`);
    }

    if ("nama_obat" in data) {
        filter = filter.concat(` | Nama Obat: [${data['nama_obat'][0]}]`);
    }

    if (("obat_from" in data) && ("obat_to" in data)) {
        filter = filter.concat(` | Pendapatan Obat: ${data['obat_from'][0]} - ${data['obat_to'][0]}`);
    }

    if (("stok_opname_from" in data) && ("stok_opname_to" in data)) {
        filter = filter.concat(` | Stok Opname: ${data['stok_opname_from'][0]} - ${data['stok_opname_to'][0]}`);
    }

    if (("stok_gudang_from" in data) && ("stok_gudang_to" in data)) {
        filter = filter.concat(` | Stok Gudang: ${data['stok_gudang_from'][0]} - ${data['stok_gudang_to'][0]}`);
    }

    if ("keterangan_apotek" in data) {
        filter = filter.concat(` | Keterangan Apotek: ${data['keterangan_apotek'][0]}`);
    }

    if ("rincian_tambahan" in data) {
        filter = filter.concat(` | Tambahan: ${data['rincian_tambahan'][0]}`);
    }

    if (("tambahan_from" in data) && ("tambahan_to" in data)) {
        filter = filter.concat(` | Pendapatan Tambahan: ${data['tambahan_from'][0]} - ${data['tambahan_to'][0]}`);
    }

    if (("diskon_from" in data) && ("diskon_to" in data)) {
        filter = filter.concat(` | Diskon: ${data['diskon_from'][0]} - ${data['diskon_to'][0]}`);
    }

    if (("pajak_from" in data) && ("pajak_to" in data)) {
        filter = filter.concat(` | Pajak: ${data['pajak_from'][0]} - ${data['pajak_to'][0]}`);
    }

    if (("tagihan_from" in data) && ("tagihan_to" in data)) {
        filter = filter.concat(` | Total Tagihan: ${data['tagihan_from'][0]} - ${data['tagihan_to'][0]}`);
    }

    if ("keterangan_pembayaran" in data) {
        filter = filter.concat(` | Keterangan Pembayaran: ${data['keterangan_pembayaran'][0]}`);
    }

    if ("cara_bayar" in data) {
        filter = filter.concat(` | Cara Bayar: ${$("#cara_bayar option:selected").text()}`);
    }

    // apotek


    return filter;
}

(function($) {
    var i_dataset = 0;
    var nama_obat = [];

    Highcharts.setOptions({
        time: {
            timezone: 'Asia/Jakarta'
        }
    });

    $('#tanggal_filter, #tanggal_lahir').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoUpdateInput: false
    });

    $('#tanggal_filter, #tanggal_lahir').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#tanggal_filter, #tanggal_lahir').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    $.getJSON(BASE_URL + 'Laporan/getObat', function(data) {
        $.each(data, function(i, row) {
            nama_obat.push(row.nama_obat);
        });
    });

    $('#nama_obat').tagator({
        autocomplete: nama_obat,
        useDimmer: true,
        prefix: 'tagator_',
        showAllOptionsOnFocus: false,
        allowAutocompleteOnly: true,
    });

    var chartDay = Highcharts.chart('containerDay', {
        chart: {
            zoomType: 'x'
        },
        title: {
            text: 'Laporan'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'datetime'
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
            labels: {
                formatter: function() {

                    function formatNumber(num) {
                        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
                    }
                    return formatNumber(this.value);
                }
            }
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[i_dataset]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[i_dataset]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        }
    });

    var chartMonth = Highcharts.chart('containerMonth', {
        chart: {
            zoomType: 'x'
        },
        title: {
            text: 'Laporan'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
            labels: {
                formatter: function() {

                    function formatNumber(num) {
                        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
                    }
                    return formatNumber(this.value);
                }
            }
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[i_dataset]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[i_dataset]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        }
    });

    var chartYear = Highcharts.chart('containerYear', {
        chart: {
            zoomType: 'x'
        },
        title: {
            text: 'Laporan'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
            labels: {
                formatter: function() {

                    function formatNumber(num) {
                        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
                    }
                    return formatNumber(this.value);
                }
            }
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[i_dataset]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[i_dataset]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        }
    });


    document.getElementById('clearDataset').addEventListener('click', function() {
        i_dataset = 0;
        $('#table-card-tabs').empty();
        $('#table-card-tabs-content').empty();

        while (chartDay.series.length) {
            chartDay.series[0].remove();
            chartMonth.series[0].remove();
            chartYear.series[0].remove();
        }

    });

    $("#FormPendaftaran").submit(function(event) {
        event.preventDefault();
        let data = [];
        let fields = $("#FormPendaftaran :input").serializeArray();
        var selectedVal = $("#pilih_tipe option:selected").val();


        $.each(fields, function(i, field) {
            if (typeof data[field.name] === 'undefined') {
                // does not exist
                if (field.value !== '')
                    data[field.name] = [field.value];
            } else {
                data[field.name].push(field.value);
            }
        });
        let filterList = getFilter(data);

        let getData = $.ajax({
            type: "POST",
            url: BASE_URL + "LaporanNew/getLaporanLayanan",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(getData).done(function(response) {
            if (response.length === 0) {
                bootbox.alert({
                    centerVertical: true,
                    message: "Ada kesalahan ambil data!",
                    size: 'small'
                });
                return false;
            } else {
                i_dataset++;
                let add_target = [];
                for (let i = 1; i <= response.table.additional_data; i++) {
                    add_target.push(i * -1);
                }
                let tabDOM = `<li class="nav-item"><a id="tab_${i_dataset}" class="nav-link" data-toggle="pill" href="#table-content-dataset${i_dataset}" role="tab" aria-controls="table-content-dataset${i_dataset}" aria-selected="false">Dataset ${i_dataset}</a></li>`;
                let tableDOM = `<div class="tab-pane fade" id="table-content-dataset${i_dataset}" role="tabpanel" aria-labelledby="table-content-dataset${i_dataset}"><p id="filter_list_${i_dataset}"></p><table id="table_${i_dataset}" class="table table-hover text-nowrap table-display"><thead><tr></tr></thead></table></div>`;
                $(tabDOM).appendTo('#table-card-tabs');
                $(tableDOM).appendTo('#table-card-tabs-content');
                $.each(response.table.columns, function(k, colObj) {
                    let str = `<th>${colObj.name}</th>`;
                    $(str).appendTo(`#table_${i_dataset}>thead>tr`);
                });

                $(`#table_${i_dataset}`).DataTable({
                    data: response.table,
                    destroy: true,
                    scrollX: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv',
                        {
                            extend: 'excelHtml5',
                            exportOptions: { orthogonal: 'export' },
                            customize: function(xlsx) {
                                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                $('c[r=A1] t', sheet).text(`Filter: ${filterList}`);
                                $('row:first c', sheet).attr('s', '0'); // first row is bold
                                // first row is bold
                            }
                        }
                    ],
                    data: response.table.data,
                    columns: response.table.columns,
                    columnDefs: [{
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        },
                        targets: [11, 12, 17, 19, 20, 21, 22, 23, 26, 28, 29],
                    }, {
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else {
                                return rupiah(data);
                            }
                        },
                        targets: [30, 31, 32, 33, 34, 35].concat(add_target),
                    }, {
                        render: $.fn.dataTable.render.moment('DD/MM/YYYY'),
                        targets: [0, 6, 13, 18, 24, 27],
                    }],
                    fnInitComplete: function() {
                        // Event handler to be fired when rendering is complete (Turn off Loading gif for example)
                        $(`#filter_list_${i_dataset}`).append(`<strong>Filter:</strong> ${filterList}`);
                        console.log('Datatable rendering complete');
                    }
                });

                $(`#tab_${i_dataset}`).tab('show');

                $(`#tab_${i_dataset}`).on('shown.bs.tab', function(e) {
                    $(`#table_${i_dataset}`).DataTable().columns.adjust();
                });
                //chart

                var newDataset = {
                    data_day: [],
                    data_month: [],
                    data_year: [],
                };

                let newlabel = "";
                for (var index = 0; index < response.chart.chart_day.length; ++index) {
                    switch (selectedVal) {
                        case 'pendapatan_layanan':
                            newlabel = "Pendapatan Layanan";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].pendapatan_layanan)]);
                            break;
                        case 'pendapatan_obat':
                            newlabel = "Pendapatan Obat";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].pendapatan_obat)]);
                            break;
                        case 'pendapatan_tambahan':
                            newlabel = "Pendapatan Tambahan";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].pendapatan_tambahan)]);
                            break;
                        case 'total_diskon':
                            newlabel = "Total Diskon";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].total_diskon)]);
                            break;
                        case 'total_pajak':
                            newlabel = "Total Pajak";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].total_pajak)]);
                            break;
                        case 'total_tagihan':
                            newlabel = "Total Tagihan";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].total_tagihan)]);
                            break;
                        default:
                            newlabel = "Total Transaksi";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].total)]);
                    }
                }

                for (var index = 0; index < response.chart.chart_month.length; ++index) {
                    switch (selectedVal) {
                        case 'pendapatan_layanan':
                            newlabel = "Pendapatan Layanan";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].pendapatan_layanan)]);
                            break;
                        case 'pendapatan_obat':
                            newlabel = "Pendapatan Obat";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].pendapatan_obat)]);
                            break;
                        case 'pendapatan_tambahan':
                            newlabel = "Pendapatan Tambahan";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].pendapatan_tambahan)]);
                            break;
                        case 'total_diskon':
                            newlabel = "Total Diskon";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].total_diskon)]);
                            break;
                        case 'total_pajak':
                            newlabel = "Total Pajak";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].total_pajak)]);
                            break;
                        case 'total_tagihan':
                            newlabel = "Total Tagihan";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].total_tagihan)]);
                            break;
                        default:
                            newlabel = "Total Transaksi";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].total)]);
                    }
                }

                for (var index = 0; index < response.chart.chart_year.length; ++index) {
                    switch (selectedVal) {
                        case 'pendapatan_layanan':
                            newlabel = "Pendapatan Layanan";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].pendapatan_layanan)]);
                            break;
                        case 'pendapatan_obat':
                            newlabel = "Pendapatan Obat";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].pendapatan_obat)]);
                            break;
                        case 'pendapatan_tambahan':
                            newlabel = "Pendapatan Tambahan";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].pendapatan_tambahan)]);
                            break;
                        case 'total_diskon':
                            newlabel = "Total Diskon";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].total_diskon)]);
                            break;
                        case 'total_pajak':
                            newlabel = "Total Pajak";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].total_pajak)]);
                            break;
                        case 'total_tagihan':
                            newlabel = "Total Tagihan";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].total_tagihan)]);
                            break;
                        default:
                            newlabel = "Total Transaksi";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].total)]);
                    }
                }

                chartDay.addSeries({
                    name: 'dataset ' + i_dataset + ' - ' + newlabel,
                    data: newDataset.data_day,
                    type: 'area',
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[i_dataset - 1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[i_dataset - 1]).setOpacity(0).get('rgba')]
                        ]
                    }
                });

                chartMonth.addSeries({
                    name: 'dataset ' + i_dataset + ' - ' + newlabel,
                    data: newDataset.data_month,
                    type: 'area',
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[i_dataset - 1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[i_dataset - 1]).setOpacity(0).get('rgba')]
                        ]
                    }
                });

                chartYear.addSeries({
                    name: 'dataset ' + i_dataset + ' - ' + newlabel,
                    data: newDataset.data_year,
                    type: 'area',
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[i_dataset - 1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[i_dataset - 1]).setOpacity(0).get('rgba')]
                        ]
                    }
                });

            }
        });
        //console.log(data);
    });

    $("#FormApotek").submit(function(event) {
        event.preventDefault();
        let data = [];
        let fields = $("#FormApotek :input").serializeArray();
        var selectedVal = $("#pilih_tipe option:selected").val();


        $.each(fields, function(i, field) {
            if (typeof data[field.name] === 'undefined') {
                // does not exist
                if (field.value !== '')
                    data[field.name] = [field.value];
            } else {
                data[field.name].push(field.value);
            }
        });
        let filterList = getFilter(data);

        let getData = $.ajax({
            type: "POST",
            url: BASE_URL + "LaporanNew/getLaporanPenjualanApotek",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(getData).done(function(response) {
            if (response.length === 0) {
                bootbox.alert({
                    centerVertical: true,
                    message: "Ada kesalahan ambil data!",
                    size: 'small'
                });
                return false;
            } else {
                i_dataset++;
                let add_target = [];
                for (let i = 1; i <= response.table.additional_data; i++) {
                    add_target.push(i * -1);
                }
                let tabDOM = `<li class="nav-item"><a id="tab_${i_dataset}" class="nav-link" data-toggle="pill" href="#table-content-dataset${i_dataset}" role="tab" aria-controls="table-content-dataset${i_dataset}" aria-selected="false">Dataset ${i_dataset}</a></li>`;
                let tableDOM = `<div class="tab-pane fade" id="table-content-dataset${i_dataset}" role="tabpanel" aria-labelledby="table-content-dataset${i_dataset}"><p id="filter_list_${i_dataset}"></p><table id="table_${i_dataset}" class="table table-hover text-nowrap table-display"><thead><tr></tr></thead></table></div>`;
                $(tabDOM).appendTo('#table-card-tabs');
                $(tableDOM).appendTo('#table-card-tabs-content');
                $.each(response.table.columns, function(k, colObj) {
                    let str = `<th>${colObj.name}</th>`;
                    $(str).appendTo(`#table_${i_dataset}>thead>tr`);
                });

                $(`#table_${i_dataset}`).DataTable({
                    data: response.table,
                    destroy: true,
                    scrollX: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv',
                        {
                            extend: 'excelHtml5',
                            exportOptions: { orthogonal: 'export' },
                            customize: function(xlsx) {
                                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                $('c[r=A1] t', sheet).text(`Filter: ${filterList}`);
                                $('row:first c', sheet).attr('s', '0'); // first row is bold
                                // first row is bold
                            }
                        }
                    ],
                    data: response.table.data,
                    columns: response.table.columns,
                    columnDefs: [{
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        },
                        targets: [3, 9, 10, 12],
                    }, {
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else {
                                return rupiah(data);
                            }
                        },
                        targets: [13, 14, 15, 16].concat(add_target),
                    }, {
                        render: $.fn.dataTable.render.moment('DD/MM/YYYY'),
                        targets: [0, 7, 11],
                    }],
                    fnInitComplete: function() {
                        // Event handler to be fired when rendering is complete (Turn off Loading gif for example)
                        $(`#filter_list_${i_dataset}`).append(`<strong>Filter:</strong> ${filterList}`);
                        console.log('Datatable rendering complete');
                    }
                });
                $(`#tab_${i_dataset}`).tab('show');

                $(`#tab_${i_dataset}`).on('shown.bs.tab', function(e) {
                    $(`#table_${i_dataset}`).DataTable().columns.adjust();
                });
                //chart

                var newDataset = {
                    data_day: [],
                    data_month: [],
                    data_year: [],
                };

                let newlabel = "";
                for (var index = 0; index < response.chart.chart_day.length; ++index) {
                    switch (selectedVal) {
                        case 'pendapatan_obat':
                            newlabel = "Pendapatan Obat";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].pendapatan_obat)]);
                            break;
                        case 'total_diskon':
                            newlabel = "Total Diskon";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].total_diskon)]);
                            break;
                        case 'total_pajak':
                            newlabel = "Total Pajak";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].total_pajak)]);
                            break;
                        case 'total_tagihan':
                            newlabel = "Total Tagihan";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].total_tagihan)]);
                            break;
                        default:
                            newlabel = "Total Transaksi";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].total)]);
                    }
                }

                for (var index = 0; index < response.chart.chart_month.length; ++index) {
                    switch (selectedVal) {
                        case 'pendapatan_obat':
                            newlabel = "Pendapatan Obat";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].pendapatan_obat)]);
                            break;
                        case 'total_diskon':
                            newlabel = "Total Diskon";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].total_diskon)]);
                            break;
                        case 'total_pajak':
                            newlabel = "Total Pajak";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].total_pajak)]);
                            break;
                        case 'total_tagihan':
                            newlabel = "Total Tagihan";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].total_tagihan)]);
                            break;
                        default:
                            newlabel = "Total Transaksi";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].total)]);
                    }
                }

                for (var index = 0; index < response.chart.chart_year.length; ++index) {
                    switch (selectedVal) {
                        case 'pendapatan_obat':
                            newlabel = "Pendapatan Obat";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].pendapatan_obat)]);
                            break;
                        case 'total_diskon':
                            newlabel = "Total Diskon";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].total_diskon)]);
                            break;
                        case 'total_pajak':
                            newlabel = "Total Pajak";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].total_pajak)]);
                            break;
                        case 'total_tagihan':
                            newlabel = "Total Tagihan";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].total_tagihan)]);
                            break;
                        default:
                            newlabel = "Total Transaksi";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].total)]);
                    }
                }

                chartDay.addSeries({
                    name: 'dataset ' + i_dataset + ' - ' + newlabel,
                    data: newDataset.data_day,
                    type: 'area',
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[i_dataset - 1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[i_dataset - 1]).setOpacity(0).get('rgba')]
                        ]
                    }
                });

                chartMonth.addSeries({
                    name: 'dataset ' + i_dataset + ' - ' + newlabel,
                    data: newDataset.data_month,
                    type: 'area',
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[i_dataset - 1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[i_dataset - 1]).setOpacity(0).get('rgba')]
                        ]
                    }
                });

                chartYear.addSeries({
                    name: 'dataset ' + i_dataset + ' - ' + newlabel,
                    data: newDataset.data_year,
                    type: 'area',
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[i_dataset - 1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[i_dataset - 1]).setOpacity(0).get('rgba')]
                        ]
                    }
                });

            }
        });
        //console.log(data);
    });

    $("#FormStok").submit(function(event) {
        event.preventDefault();
        let data = [];
        let fields = $("#FormStok :input").serializeArray();
        var selectedVal = $("#pilih_tipe option:selected").val();


        $.each(fields, function(i, field) {
            if (typeof data[field.name] === 'undefined') {
                // does not exist
                if (field.value !== '')
                    data[field.name] = [field.value];
            } else {
                data[field.name].push(field.value);
            }
        });
        let filterList = getFilter(data);

        let getData = $.ajax({
            type: "POST",
            url: BASE_URL + "LaporanNew/getLaporanStok",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(getData).done(function(response) {
            if (response.length === 0) {
                bootbox.alert({
                    centerVertical: true,
                    message: "Ada kesalahan ambil data!",
                    size: 'small'
                });
                return false;
            } else {
                i_dataset++;
                let add_target = [];
                for (let i = 1; i <= response.table.additional_data; i++) {
                    add_target.push(i * -1);
                }
                let tabDOM = `<li class="nav-item"><a id="tab_${i_dataset}" class="nav-link" data-toggle="pill" href="#table-content-dataset${i_dataset}" role="tab" aria-controls="table-content-dataset${i_dataset}" aria-selected="false">Dataset ${i_dataset}</a></li>`;
                let tableDOM = `<div class="tab-pane fade" id="table-content-dataset${i_dataset}" role="tabpanel" aria-labelledby="table-content-dataset${i_dataset}"><p id="filter_list_${i_dataset}"></p><table id="table_${i_dataset}" class="table table-hover text-nowrap table-display"><thead><tr></tr></thead></table></div>`;
                $(tabDOM).appendTo('#table-card-tabs');
                $(tableDOM).appendTo('#table-card-tabs-content');
                $.each(response.table.columns, function(k, colObj) {
                    let str = `<th>${colObj.name}</th>`;
                    $(str).appendTo(`#table_${i_dataset}>thead>tr`);
                });

                $(`#table_${i_dataset}`).DataTable({
                    data: response.table,
                    destroy: true,
                    scrollX: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv',
                        {
                            extend: 'excelHtml5',
                            exportOptions: { orthogonal: 'export' },
                            customize: function(xlsx) {
                                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                $('c[r=A1] t', sheet).text(`Filter: ${filterList}`);
                                $('row:first c', sheet).attr('s', '0'); // first row is bold
                                // first row is bold
                            }
                        }
                    ],
                    data: response.table.data,
                    columns: response.table.columns,
                    columnDefs: [{
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        },
                        targets: [3, 14, 16],
                    }, {
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else {
                                return rupiah(data);
                            }
                        },
                        targets: [9, 10].concat(add_target),
                    }, {
                        render: $.fn.dataTable.render.moment('DD/MM/YYYY'),
                        targets: [0, 4, 13, 15],
                    }],
                    fnInitComplete: function() {
                        // Event handler to be fired when rendering is complete (Turn off Loading gif for example)
                        $(`#filter_list_${i_dataset}`).append(`<strong>Filter:</strong> ${filterList}`);
                        console.log('Datatable rendering complete');
                    }
                });

                $(`#tab_${i_dataset}`).tab('show');

                $(`#tab_${i_dataset}`).on('shown.bs.tab', function(e) {
                    $(`#table_${i_dataset}`).DataTable().columns.adjust();
                });
                //chart

                var newDataset = {
                    data_day: [],
                    data_month: [],
                    data_year: [],
                };

                let newlabel = "";
                for (var index = 0; index < response.chart.chart_day.length; ++index) {
                    switch (selectedVal) {
                        case 'pendapatan_obat':
                            newlabel = "Pendapatan Obat";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].pendapatan_obat)]);
                            break;
                        case 'total_diskon':
                            newlabel = "Total Diskon";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].total_diskon)]);
                            break;
                        case 'total_pajak':
                            newlabel = "Total Pajak";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].total_pajak)]);
                            break;
                        case 'total_tagihan':
                            newlabel = "Total Tagihan";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].total_tagihan)]);
                            break;
                        default:
                            newlabel = "Total Transaksi";
                            newDataset.data_day.push([parseInt(response.chart.chart_day[index].id), parseInt(response.chart.chart_day[index].total)]);
                    }
                }

                for (var index = 0; index < response.chart.chart_month.length; ++index) {
                    switch (selectedVal) {
                        case 'pendapatan_obat':
                            newlabel = "Pendapatan Obat";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].pendapatan_obat)]);
                            break;
                        case 'total_diskon':
                            newlabel = "Total Diskon";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].total_diskon)]);
                            break;
                        case 'total_pajak':
                            newlabel = "Total Pajak";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].total_pajak)]);
                            break;
                        case 'total_tagihan':
                            newlabel = "Total Tagihan";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].total_tagihan)]);
                            break;
                        default:
                            newlabel = "Total Transaksi";
                            newDataset.data_month.push([response.chart.chart_month[index].id, parseInt(response.chart.chart_month[index].total)]);
                    }
                }

                for (var index = 0; index < response.chart.chart_year.length; ++index) {
                    switch (selectedVal) {
                        case 'pendapatan_obat':
                            newlabel = "Pendapatan Obat";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].pendapatan_obat)]);
                            break;
                        case 'total_diskon':
                            newlabel = "Total Diskon";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].total_diskon)]);
                            break;
                        case 'total_pajak':
                            newlabel = "Total Pajak";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].total_pajak)]);
                            break;
                        case 'total_tagihan':
                            newlabel = "Total Tagihan";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].total_tagihan)]);
                            break;
                        default:
                            newlabel = "Total Transaksi";
                            newDataset.data_year.push([parseInt(response.chart.chart_year[index].id), parseInt(response.chart.chart_year[index].total)]);
                    }
                }

                chartDay.addSeries({
                    name: 'dataset ' + i_dataset + ' - ' + newlabel,
                    data: newDataset.data_day,
                    type: 'area',
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[i_dataset - 1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[i_dataset - 1]).setOpacity(0).get('rgba')]
                        ]
                    }
                });

                chartMonth.addSeries({
                    name: 'dataset ' + i_dataset + ' - ' + newlabel,
                    data: newDataset.data_month,
                    type: 'area',
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[i_dataset - 1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[i_dataset - 1]).setOpacity(0).get('rgba')]
                        ]
                    }
                });

                chartYear.addSeries({
                    name: 'dataset ' + i_dataset + ' - ' + newlabel,
                    data: newDataset.data_year,
                    type: 'area',
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[i_dataset - 1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[i_dataset - 1]).setOpacity(0).get('rgba')]
                        ]
                    }
                });

            }
        });
        //console.log(data);
    });

    /*
    $('#table-card-tabs').find('tbody').on("show.bs.tab", 'a[data-toggle="pill"]', function() {
        console.log('test');
    });
    */
})(jQuery);