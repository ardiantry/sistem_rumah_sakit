$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
        if (settings.nTable.id !== 'tableTransaksi') {
            return true;
        }
        var tanggal_transaksi = $('#tanggal_transaksi').val();
        console.log(tanggal_transaksi);
        var age = data[0]; // use data for the age column            
        console.log(age);
        /*
                    var max = parseInt($('#max').val(), 10);
                    var age = parseFloat(data[3]) || 0; // use data for the age column

                    if ((isNaN(min) && isNaN(max)) ||
                        (isNaN(min) && age <= max) ||
                        (min <= age && isNaN(max)) ||
                        (min <= age && age <= max)) {
                        return true;
                    }
        */
        return false;
    }
); 

(function($) {
    //PEKERJAAN 
    TransaksiBinding($);
    MasterBinding($);
})(jQuery);

function MasterBinding($) {
    $.getJSON(BASE_URL + 'TransaksiLain/getDataMasterAjax', function(data) {
        bindCombo({
            $combo: $('#master_akun'),
            dataSource: data.akun,
            dataTextField: 'akun_display',
            dataValueField: 'id'
        });
    })
}

function save_transaksi() {
    let id = $('#id_transaksi').val();
    let tanggal = $('#tanggal_transaksi').val();
    let nama = $('#nama_transaksi').val();
    let $table = $('#tableRincianTransaksi');
    let jTransaksi = fnTableToObject($table);
    console.log(jTransaksi);

    let aDebit = jTransaksi.filter(element => element["arus"] == "Debit");
    let aKredit = jTransaksi.filter(element => element["arus"] == "Kredit");

    let totalDebit = aDebit.reduce((totalDebit, currentValue) => totalDebit + clearRupiah(currentValue["nilai"]), 0);
    let totalKredit = aKredit.reduce((totalKredit, currentValue) => totalKredit + clearRupiah(currentValue["nilai"]), 0);

    if (totalDebit !== totalKredit) {
        bootbox.alert({
            centerVertical: true,
            message: "Jumlah Kredit dan Debit tidak sama !",
            size: 'small'
        });
        return false;
    };

    let data = { 
        id: id,
        tanggal: tanggal,
        nama: nama,
        transaksi: jTransaksi
    };

    let aSave = $.ajax({
        type: "POST",
        url: BASE_URL + "TransaksiLain/save",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });
    $.when(aSave).done(function(response) {
        if (response.status) {
            $("#tableTransaksi").DataTable()
                .ajax.reload();
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            });
            console.log(response.status);
        } else
            console.log(response.message);
    });

    $('#modal-formTransaksi').modal('toggle');
}

function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments; 
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
}

function TransaksiBinding($) {
    $("#FormTransaksi").validate();

    $("#FormTransaksi").submit(function(event) {
        event.preventDefault();

        if ($("#FormTransaksi").valid()) {
            save_transaksi();
        }

    });

    //Date range picker
    $('#tanggal_transaksi').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoUpdateInput: false
    });

    fill_datatable();

    function fill_datatable(filter_tanggal = '') {
        var total_debit;
        var total_kredit;
        var $tableTransaksiDT = $("#tableTransaksi").DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            searching: true,
            pageLength: 10,
            order: [],
            columnDefs: [{
                    targets: [6, 8],
                    visible: false,
                },
                {
                    targets: [0],
                    orderable: true
                },
                {
                    targets: '_all',
                    orderable: false
                },
                {
                    targets: -1,
                    data: null,
                    defaultContent: `<button class="btn btn-info btn-sm btn-detail">Detail</button>`,
                    className: "actions text-right"
                }
            ],
            ajax: {
                url: BASE_URL + 'Pembukuan/getDatatable',
                type: "POST",
                cache: false,
                data: {
                    tanggal_transaksi: filter_tanggal
                },
                dataSrc: function(data) {
                    total_debit = data.total_debit;
                    total_kredit = data.total_kredit;
                    return data.data;
                }
            },
            "columns": [
                { "data": "tanggal", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
                { "data": "nama" },
                { "data": "kode_akun" },
                { "data": "nama_akun" },
                { "data": "debit_display", "className": "text-right", },
                { "data": "kredit_display", "className": "text-right" },
                { "data": "id_jurnal_header" },
                {
                    "data": "id_reference",
                    "className": "actions text-right",
                    "render": function(data, type, row, meta) {
                        //console.log(row["tipe_transaksi"]);
                        let ret = "";
                        let url = "";
                        switch (row["tipe_transaksi"]) {
                            case 'Rawat Jalan':

                                url = BASE_URL + "RawatJalan/print/" + row["id_reference"];
                                ret = '<a href="' + url + '" target="_blank" class="btn btn-info btn-sm">Detail</a>';
                                break;
                            case 'Resep Luar':

                                url = BASE_URL + "ResepLuar/print/" + row["id_reference"];
                                ret = '<a href="' + url + '" target="_blank" class="btn btn-info btn-sm">Detail</a>';
                                break;
                            case 'Pembayaran Faktur':

                                url = BASE_URL + "Pembelian/print/" + row["id_reference"];
                                ret = '<a href="' + url + '" target="_blank" class="btn btn-info btn-sm">Detail</a>';
                                break;
                            case 'Hutang Supplier':

                                url = BASE_URL + "Hutang/print/" + row["id_reference"];
                                ret = '<a href="' + url + '" target="_blank" class="btn btn-info btn-sm">Detail</a>';
                                break;
                            default:

                                ret = '';
                                break;
                        }
                        return ret;
                    }
                },
                { "data": null }
            ],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // converting to interger to find total
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        (i === '-' ? 0 : clearRupiah(i) * 1) :
                        typeof i === 'number' ?
                        i : 0;
                };

                // computing column Total of the complete result 
                var debitTotal = api
                    .column(4)
                    .data()
                    .reduce(function(a, b) {
                        var res = b.split("<br />");
                        var total_b = res.reduce(function(x, y) {
                            return intVal(x) + intVal(y);
                        })
                        return intVal(a) + intVal(total_b);
                    }, 0);

                var kreditTotal = api
                    .column(5)
                    .data()
                    .reduce(function(a, b) {
                        var res = b.split("<br />");
                        var total_b = res.reduce(function(x, y) {
                            return intVal(x) + intVal(y);
                        })
                        return intVal(a) + intVal(total_b);
                    }, 0);

                // Update footer by showing the total with the reference of the column index 
                $(api.column(3).footer()).html('Total per page : <br /> Total :');
                $(api.column(4).footer()).html(rupiah(debitTotal) + '<br />(' + rupiah(total_debit) + ')');
                $(api.column(5).footer()).html(rupiah(kreditTotal) + '<br />(' + rupiah(total_kredit) + ')');
            },
            drawCallback: function(settings) {
                var api = this.api();
                //console.log(api.data());
                //$(api.column(4).footer()).html(' (' + rupiah(total_debit) + ')');
            }
        });

        $("#nama").on('keyup',
            delay(function (e) {
                console.log(this.value);
                //$tableTransaksiDT.fnFilter(this.value);
                $tableTransaksiDT.search(this.value).draw();
            }, 500)            
        );
        
        $('#pilih_length').on('change', function() {
            $tableTransaksiDT.page.len(this.value).draw();
            //console.log(this.value)
        });
    }

    $('#tanggal_transaksi').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        var filter_tanggal = picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD');
        if (filter_tanggal != '') {
            $("#tableTransaksi").DataTable().destroy();
            fill_datatable(filter_tanggal);
        } else {
            $("#tableTransaksi").DataTable().destroy();
            fill_datatable();
        }
    });

    $('#tanggal_transaksi').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        $("#tableTransaksi").DataTable().destroy();
        fill_datatable();
    });

    $("#tableTransaksi tbody").on('click', 'button.btn-detail', function() {
        let data = $("#tableTransaksi").row($(this).parents('tr')).data();
        let id = data['id_reference'];
        //window.open(BASE_URL + "RawatJalan/print/" + id, "_blank");
    });

    $("#tableTransaksi tbody").on('click', 'button.btn-edit', function() {
        let data = $("#tableTransaksi").row($(this).parents('tr')).data();
        $('#id_transaksi').val(data['id_transaksi_header']);
        $('#tanggal_transaksi').val(moment(data['tanggal']).format('DD/MM/YYYY'));
        $('#nama_transaksi').val(data['nama']);
        $("#btnDeleteTransaksi").removeClass("d-none");

        $('#tableRincianTransaksi').find('tbody').empty();
        $.each(data.transaksi, function(key, value) {
            $('#tableRincianTransaksi').find('tbody').append(
                `<tr>
                <td class="d-none" data-label="id">${value.id_akun}</td>            
                <td class="text-left align-middle" data-label="master_akun">${value.akun_display}</td>
                <td class="text-left align-middle" data-label="arus">${value.arus}</td>
                <td class="text-right align-middle" data-label="nilai">${rupiah(value.nilai)}</td>
                <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`
            );
        });
        $('#modal-formTransaksi').modal('toggle');
    });

    $('#btnTambahan').on('click', function() {
        let akunid = $('#master_akun').val();
        var akunSelected = $("#master_akun option:selected").html();
        let arus = $('#arus').val();
        let nilai = $('#nilai').val();

        if ($('#tableRincianTransaksi').find('tbody tr td[data-label="empty_row"]').length > 0)
            $('#tableRincianTransaksi').find('tbody').empty();

        $('#tableRincianTransaksi').find('tbody').append(
            `<tr>
            <td class="d-none" data-label="id">${akunid}</td>            
            <td class="text-left align-middle" data-label="master_akun">${akunSelected}</td>
            <td class="text-left align-middle" data-label="arus">${arus}</td>
            <td class="text-right align-middle" data-label="nilai">${rupiah(nilai)}</td>
            <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`);
    });

    $('#tableRincianTransaksi').find('tbody').on("click", "td .btn-delete", function() {
        $(this).closest('tr').remove();
        if ($('#tableRincianTransaksi').find('tbody tr').length == 0) {
            let colspan = $('#tableRincianTransaksi').find('thead tr th').length;
            $('#tableRincianTransaksi').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
        }
    });

    $("#btnAddTransaksi").on('click', function() {
        $("#id_transaksi").val(0);
        $("#nama_transaksi").val('').focus();
        $('#tanggal_transaksi').val(moment(new Date()).format('DD/MM/YYYY'));
        $('#tableRincianTransaksi').find('tbody').empty();
        $("#btnDeleteTransaksi").addClass("d-none");

        $('#modal-formTransaksi').modal('toggle');
    });

    $("#btnDeleteTransaksi").on('click', function() {
        let id = $('#id_transaksi').val();
        $('#modal-formTransaksi').modal('toggle');

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
                        url: BASE_URL + "TransaksiLain/delete",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });
                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableTransaksi").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil disimpan'
                            });
                            console.log(response.status);
                        } else
                            console.log(response.message);
                    });
                } else {
                    $('#modal-formTransaksi').modal('toggle');
                }
            }
        });
    });

}