(function($) {
    var i = 0;

    // -----------------------------Miqdad tambahin Start-----------------------
    var j = 0;
    var k = 0;
    // -----------------------------Miqdad tambahin End-----------------------

    //var monthControl = document.querySelector('input[type="month"]');
    //monthControl.value = moment(new Date()).format('YYYY-MM');
    // console.log($);
    bsCustomFileInput.init();
    var nama_obat = [];
    var kode_akun = [];
    Highcharts.setOptions({
        time: {
            timezone: 'Asia/Jakarta'
        }
    });
    var chart = Highcharts.chart('container', {
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
                        [0, Highcharts.getOptions().colors[i]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[i]).setOpacity(0).get('rgba')]
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
    // -----------------------------Miqdad tambahin buat Chart Start-----------------------
    var chartMonth = null;
    var chartYear = null;

    chartMonth = Highcharts.chart('containerMonth', {
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

            type: 'datetime',
            labels: {
                formatter: function() {

                    // console.log(this);

                    return Highcharts.dateFormat('%b %Y', this.value);
                }
            }
        },
        yAxis: {
            title: {
                text: 'Jumlah',
                formatter: function() {
                    return this.value;
                }
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
                        [0, Highcharts.getOptions().colors[j]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[j]).setOpacity(0).get('rgba')]
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


    chartYear = Highcharts.chart('containerYear', {
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
                        [0, Highcharts.getOptions().colors[k]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[k]).setOpacity(0).get('rgba')]
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


    // -----------------------------Miqdad tambahin buat Chart End-----------------------

    $("select.dokter").change(function() {
        var selectedDokter = $(this).children("option:selected").val();
        var selectedDokterText = $(this).children("option:selected").text();
        $("#nama_dokter").val(selectedDokterText);
        //alert("You have selected the country - " + selectedDokterText);
    });

    $("select.supplier").change(function() {
        var selectedSupplier = $(this).children("option:selected").val();
        var selectedSupplierText = $(this).children("option:selected").text();
        $("#nama_supplier").val(selectedSupplierText);
        //alert("You have selected the country - " + selectedDokterText);
    });


    $("select.unit_layanan").change(function() {
        var selectedUnit_layanan = $(this).children("option:selected").val();
        var selectedUnit_layananText = $(this).children("option:selected").text();
        $("#nama_unit_layanan").val(selectedUnit_layananText);
        //alert("You have selected the country - " + selectedDokterText);
    });

    $("select.tipe_pasien").change(function() {
        var selectedtipe_pasien = $(this).children("option:selected").val();
        var selectedtipe_pasienText = $(this).children("option:selected").text();
        $("#nama_tipe_pasien").val(selectedtipe_pasienText);
        //alert("You have selected the country - " + selectedDokterText);
    });
    $("select.nama_layanan").change(function() {
        var selectedtipe_pasien = $(this).children("option:selected").val();
        var selectedtipe_pasienText = $(this).children("option:selected").text();
        $("#nama_layanan_text").val(selectedtipe_pasienText);
        //alert("You have selected the country - " + selectedDokterText);
    });
    $.getJSON(BASE_URL + 'Laporan/getObat', function(data) {
        $.each(data, function(i, row) {
            nama_obat.push(row.nama_obat);
        });
    })

    $.getJSON(BASE_URL + 'Laporan/getAkun', function(data) {
        $.each(data, function(i, row) {
            kode_akun.push(row.akun_display);
        });
    })

    $('#NamaObat').tagator({
        autocomplete: nama_obat,
        useDimmer: true,
        prefix: 'tagator_',
        showAllOptionsOnFocus: false,
        allowAutocompleteOnly: true,
    });

    $('#KodeAkun').tagator({
        autocomplete: kode_akun,
        useDimmer: true,
        prefix: 'tagator_',
        showAllOptionsOnFocus: false,
        allowAutocompleteOnly: true,
    });

    $("#FormReminder").submit(function(event) {
        let data = [];
        let fields = $("#FormReminder :input").serializeArray();
        var selectedVal = $("#pilih_tipe option:selected").val();
        $.each(fields, function(i, field) {
            if (typeof data[field.name] === 'undefined') {
                // does not exist
                data[field.name] = [field.value];
            } else {
                data[field.name].push(field.value);
            }
        });

        //console.log(data);

        let getData = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataReminder",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        //console.log(getData);
        var xtanggal = "";
        if (data.pilih_tanggal != "") {
            var tanggal_text = "";
            if (data.pilih_tanggal == "created_at")
                tanggal_text = "Tanggal Pendaftaran";
            else if (data.pilih_tanggal == "tanggal_reminder_paket")
                tanggal_text = "Tanggal Reminder Paket";
            else if (data.pilih_tanggal == "tanggal_reminder_kontrol_1")
                tanggal_text = "Tanggal Kontrol 1";
            else if (data.pilih_tanggal == "tanggal_reminder_kontrol_2")
                tanggal_text = "Tanggal Kontrol 2";
            else if (data.pilih_tanggal == "tanggal_reminder_kontrol_3")
                tanggal_text = "Tanggal Kontrol 3";

            if (data.tanggal_filter != "")
                xtanggal = tanggal_text + ": " + data.tanggal_filter;
        }
        var xnama_pasien = "";
        if (data.nama_pasien != "") {
            xnama_pasien = " | Nama pasien: " + data.nama_pasien;
        }
        var xrm_from = "";
        if (data.rm_from != "") {
            xrm_from = " | Rm From: " + data.rm_from;
        }
        var xrm_to = "";
        if (data.rm_to != "") {
            xrm_to = " | Rm To: " + data.rm_to;
        }

        var getIforloop = i + 1;

        console.log(getIforloop);

        $('#filterTable' + getIforloop).text(xtanggal +
            xnama_pasien +
            xrm_from +
            xrm_to);

        var className = $('#tab_' + getIforloop).attr('class');
        $("#tab_" + getIforloop).removeClass("d-none");

        $.when(getData).done(function(response) {

            //console.log(response.table);
            // console.log(response);
            $('#table_laporan' + getIforloop).DataTable({

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
                            $('c[r=A1] t', sheet).text("filter :" +
                                xtanggal +
                                xnama_pasien +
                                xrm_from +
                                xrm_to);
                            $('row:first c', sheet).attr('s', '0'); // first row is bold
                            // first row is bold
                        }

                    }

                ],
                columns: [
                    { title: "Tanggal Pendaftaran", data: "created_at", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "No RM", data: "no_rm" },
                    { title: "Nama Pasien", data: "nama_pasien" },
                    { title: "Reminder Paket", data: "reminder_paket" },
                    { title: "Tanggal Reminder Paket", data: "tanggal_reminder_paket", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "Tanggal Kontrol 1", data: "tanggal_reminder_kontrol_1", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "Alasan Kontrol 1", data: "alasan_kontrol_1" },
                    { title: "Tanggal Kontrol 2", data: "tanggal_reminder_kontrol_2", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "Alasan Kontrol 2", data: "alasan_kontrol_2" },
                    { title: "Tanggal Kontrol 3", data: "tanggal_reminder_kontrol_3", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "Alasan Kontrol 3", data: "alasan_kontrol_2" },
                ]
            });
        });
        var newDataset = {
            data: [],
        };
        var datasetI = i + 1;
        i += 1;
        event.preventDefault();
    });

    $("#FormPendaftaran").submit(function(event) {

        let data = [];
        let fields = $("#FormPendaftaran :input").serializeArray();
        var selectedVal = $("#pilih_tipe option:selected").val();

        $.each(fields, function(i, field) {
            if (typeof data[field.name] === 'undefined') {
                // does not exist
                data[field.name] = [field.value];
            } else {
                data[field.name].push(field.value);
            }
        });



        //console.log(data);

        let getData = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataPendaftaran",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });


        let getDataMonth = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataPendaftaranMonth",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        let getDataYear = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataPendaftaranYear",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        // -----------------------------Miqdad tambahin buat Note Filter di tabel Start-----------------------

        // console.log(data);


        var xjenis_kelamin = "";
        if (data.jenis_kelamin != null) {
            var agamadesc = ""
            if (data.jenis_kelamin == "P")
                agamadesc = "Perempuan"
            else if (data.jenis_kelamin == "L")
                agamadesc = "Laki-Laki"
            else if (data.jenis_kelamin == "L,P")
                agamadesc = "Laki-Laki,Perempuan"

            xjenis_kelamin = " | Jenis kelamin: " + agamadesc;
        }
        //console.log(data.jenis_kelamin);

        var xagama = "";
        if (data.agama != null) {
            xagama = " | Agama: " + data.agama;
        }

        var xalamat = "";
        if (data.alamat != "") {
            xalamat = " | Alamat: " + data.alamat;
        }
        var xcara_bayar = "";
        if (data.cara_bayar != "") {
            xcara_bayar = " | Cara bayar: " + data.cara_bayar;
        }
        var xdiagnosis = "";
        if (data.diagnosis != "") {
            xdiagnosis = " | Diagnosis: " + data.diagnosis;
        }
        var xdiskon_from = "";
        if (data.diskon_from != "") {
            xdiskon_from = " | Discount  From: " + data.diskon_from;
        }
        var xdiskon_to = "";
        if (data.diskon_to != "") {
            xdiskon_to = " | Discount To: " + data.diskon_to;
        }
        var xdokter = "";
        if (data.dokter != "") {

            xdokter = " | Dokter: " + $("#nama_dokter").val();
        }

        var xgolongan_darah = "";
        if (data.golongan_darah != null) {
            xgolongan_darah = " | Golongan Darah: " + data.golongan_darah;
        }
        var xicd9 = "";
        if (data.icd9 != "") {
            xicd9 = " | Icd9: " + data.icd9;
        }
        var xicd10 = "";
        if (data.icd10 != "") {
            xicd10 = " | Icd10: " + data.icd10;
        }
        var xketerangan = "";
        if (data.keterangan != "") {
            xketerangan = " | Keterangan: " + data.keterangan;
        }
        var xketerangan_apotek = "";
        if (data.keterangan_apotek != "") {
            xketerangan_apotek = " | Keterangan apotek: " + data.keterangan_apotek;
        }
        var xketerangan_pembayaran = "";
        if (data.keterangan_pembayaran != "") {
            xketerangan_pembayaran = " | Keterangan pembayaran: " + data.keterangan_pembayaran;
        }
        var xketerangan_pemeriksaan = "";
        if (data.keterangan_pemeriksaan != "") {
            xketerangan_pemeriksaan = " | Keterangan pemeriksaan: " + data.keterangan_pemeriksaan;
        }
        var xketerangan_unit_layanan = "";
        if (data.keterangan_unit_layanan != "") {
            xketerangan_unit_layanan = " | Keterangan unit layanan: " + data.keterangan_unit_layanan;
        }
        var xlayanan = "";
        if (data.layanan != "") {
            xlayanan = " | Layanan: " + $("#nama_layanan_text").val();
        }
        var xlayanan_from = "";
        if (data.layanan_from != "") {
            xlayanan_from = " | Layanan from: " + data.layanan_from;
        }
        var xlayanan_to = "";
        if (data.layanan_to != "") {
            xlayanan_to = " | Layanan To: " + data.layanan_to;
        }
        var xnama_obat = "";
        if (data.nama_obat != "") {
            xnama_obat = " | Nama obat: " + data.nama_obat;
        }
        var xnama_pasien = "";
        if (data.nama_pasien != "") {
            xnama_pasien = " | Nama pasien: " + data.nama_pasien;
        }
        var xno_telp = "";
        if (data.no_telp != "") {
            xno_telp = " | No telp: " + data.no_telp;
        }
        var xobat_from = "";
        if (data.obat_from != "") {
            xobat_from = " | Obat From: " + data.obat_from;
        }
        var xobat_to = "";
        if (data.obat_to != "") {
            xobat_to = " | Obat To: " + data.obat_to;
        }
        var xpajak_from = "";
        if (data.pajak_from != "") {
            xpajak_from = " | Pajak From: " + data.pajak_from;
        }
        var xpajak_to = "";
        if (data.pajak_to != "") {
            xpajak_to = " | Pajak To: " + data.pajak_to;
        }
        var xperiode = "";
        if (data.periode != "") {
            xperiode = " | Periode: " + data.periode;
        }
        var xperiode_transaksi = "";
        if (data.periode_transaksi != "") {
            xperiode_transaksi = " | periode_transaksi: " + data.periode_transaksi;
        }
        var xpilih_tanggal = ""; //: ["created_at"]
        var xpilih_tipe = ""; //: ["total"]
        var xrincian_tambahan = "";
        if (data.rincian_tambahan != "") {
            xrincian_tambahan = " | Rincian Tambahan: " + data.rincian_tambahan;
        }
        var xrm_from = "";
        if (data.rm_from != "") {
            xrm_from = " | Rm From: " + data.rm_from;
        }
        var xrm_to = "";
        if (data.rm_to != "") {
            xrm_to = " | Rm To: " + data.rm_to;
        }
        var xtagihan_from = "";
        if (data.tagihan_from != "") {
            xtagihan_from = " | Tagihan From: " + data.tagihan_from;
        }
        var xtagihan_to = "";
        if (data.tagihan_to != "") {
            xtagihan_to = " | Tagihan To: " + data.tagihan_to;
        }
        var xtambahan_from = "";
        if (data.tambahan_from != "") {
            xtambahan_from = " | Tambahan From: " + data.tambahan_from;
        }
        var xtambahan_to = "";
        if (data.tambahan_to != "") {
            xtambahan_to = " | Tambahan To: " + data.tambahan_to;
        }



        var xtanggal_daftar_layanan = "";
        if (data.tanggal_daftar_layanan != "") {
            xtanggal_daftar_layanan = "Tanggal daftar layanan: " + data.tanggal_daftar_layanan;
        }
        var xtanggal_nota = "";
        if (data.tanggal_nota != "") {
            xtanggal_nota = "Tanggal nota: " + data.tanggal_nota;
        }
        var xtanggal_pendaftaran = ""; //: ["29/11/2020 - 09/01/2021"]
        if (data.tanggal_pendaftaran != "") {
            xtanggal_pendaftaran = "  Tanggal pendaftaran: " + data.tanggal_pendaftaran;
        }
        var xtanggal_penyerahan_resep = "";
        if (data.tanggal_penyerahan_resep != "") {
            xtanggal_penyerahan_resep = "Tanggal penyerahan resep: " + data.tanggal_penyerahan_resep;
        }
        var xtanggal_periksa = "";
        if (data.tanggal_periksa != "") {
            xtanggal_periksa = "Tanggal periksa: " + data.tanggal_periksa;
        }




        var xtempat_lahir = "";
        if (data.tempat_lahir != "") {
            xtempat_lahir = " | Tempat lahir: " + data.tempat_lahir;
        }
        var xtipe_pasien = "";
        if (data.tipe_pasien != "") {
            xtipe_pasien = " | Tipe pasien: " + $("#nama_tipe_pasien").val();
        }
        var xunit_layanan = "";
        if (data.unit_layanan != "") {
            xunit_layanan = " | Unit layanan: " + $("#nama_unit_layanan").val();
        }
        var getIforloop = i + 1;
        //console.log(data);
        $('#filterTable' + getIforloop).text(xtanggal_pendaftaran +
            xjenis_kelamin +
            xagama +
            xtanggal_daftar_layanan +
            xtanggal_nota +
            xtanggal_penyerahan_resep +
            xtanggal_periksa +
            xalamat +
            xcara_bayar +
            xdiagnosis +
            xdiskon_from +
            xdiskon_to +
            xdokter +
            xicd9 +
            xicd10 +
            xketerangan +
            xketerangan_apotek +
            xketerangan_pembayaran +
            xketerangan_pemeriksaan +
            xketerangan_unit_layanan +
            xlayanan +
            xlayanan_from +
            xlayanan_to +
            xnama_obat +
            xnama_pasien +
            xno_telp +
            xgolongan_darah +
            xobat_from +
            xobat_to +
            xpajak_from +
            xpajak_to +
            xperiode +
            xperiode_transaksi +
            xrincian_tambahan +
            xrm_from +
            xrm_to +
            xtagihan_from +
            xtagihan_to +
            xtambahan_from +
            xtambahan_to +
            xtempat_lahir +
            xtipe_pasien +
            xunit_layanan);




        console.log(getIforloop);
        var className = $('#tab_' + getIforloop).attr('class');
        $("#tab_" + getIforloop).removeClass("d-none");
        // -----------------------------Miqdad tambahin buat Note Filter di tabel End-----------------------
        $.when(getData).done(function(response) {




            console.log(response.table);
            // console.log(response);
            $('#table_laporan' + getIforloop).DataTable({

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
                            $('c[r=A1] t', sheet).text("filter :" + xtanggal_pendaftaran +
                                xjenis_kelamin +
                                xagama +
                                xtanggal_daftar_layanan +
                                xtanggal_nota +
                                xtanggal_penyerahan_resep +
                                xtanggal_periksa +
                                xalamat +
                                xcara_bayar +
                                xdiagnosis +
                                xdiskon_from +
                                xdiskon_to +
                                xdokter +
                                xicd9 +
                                xicd10 +
                                xketerangan +
                                xketerangan_apotek +
                                xketerangan_pembayaran +
                                xketerangan_pemeriksaan +
                                xketerangan_unit_layanan +
                                xlayanan +
                                xlayanan_from +
                                xlayanan_to +
                                xnama_obat +
                                xnama_pasien +
                                xno_telp +
                                xgolongan_darah +
                                xobat_from +
                                xobat_to +
                                xpajak_from +
                                xpajak_to +
                                xperiode +
                                xperiode_transaksi +
                                xrincian_tambahan +
                                xrm_from +
                                xrm_to +
                                xtagihan_from +
                                xtagihan_to +
                                xtambahan_from +
                                xtambahan_to +
                                xtempat_lahir +
                                xtipe_pasien +
                                xunit_layanan);
                            $('row:first c', sheet).attr('s', '0'); // first row is bold
                            // first row is bold
                        }

                    }

                ],
                columns: [
                    { title: "Tanggal Pendaftaran", data: "tanggal", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "No Registrasi", data: "no_registrasi" },
                    { title: "No RM", data: "no_rm" },
                    { title: "Nama Pasien", data: "nama_pasien" },
                    { title: "No Telp", data: "no_telp" },
                    { title: "Tempat Lahir", data: "tempat_lahir" },
                    { title: "Tanggal Lahir", data: "tanggal_lahir", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "Golongan Darah", data: "golongan_darah" },
                    { title: "Jenis Kelamin", data: "jenis_kelamin" },
                    { title: "Pekerjaan", data: "pekerjaan" },
                    { title: "Agama", data: "agama" },
                    { title: "Alamat", data: "alamat" },
                    {
                        title: "Keterangan Pasien",
                        data: "keterangan",
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        }
                    },
                    { title: "Tanggal Unit Layanan", data: "tanggal_periksa", render: $.fn.dataTable.render.moment('DD/MM/YYYY') }, //not belum bener
                    { title: "Unit Layanan", data: "nama_unit_layanan" },
                    { title: "Dokter", data: "nama_dokter" },
                    { title: "Tipe Pasien", data: "tipe_pasien" },
                    {
                        title: "Keterangan Unit Layanan",
                        data: "keterangan1",
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        }
                    },
                    { title: "Tanggal Pemeriksaan ", data: "tanggal_pemeriksaan", render: $.fn.dataTable.render.moment('DD/MM/YYYY') }, //not belum bener  
                    {
                        title: "Diagnosa",
                        data: "diagnosa",
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        }
                    },
                    { title: "ICD 10", data: "icd10_name" },
                    { title: "Rincian Layanan", data: "rincian_layanan" },
                    { title: "ICD 9", data: "icd9_name" },
                    {
                        title: "Keterangan Pemeriksaan",
                        data: "keterangan2",
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        }
                    },

                    { title: "Tanggal Penyerahan Resep", data: "tanggal_penyerahan_resep", render: $.fn.dataTable.render.moment('DD/MM/YYYY') }, //not belum bener 
                    { title: "Rician Obat", data: "rincian_obat" },
                    {
                        title: "Keterangan Apotek",
                        data: "keterangan3",
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        }
                    },

                    { title: "Tanggal Pembayaran", data: "tanggal_pembayaran", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "Tambahan", data: "tambahan_name" },
                    {
                        title: "Pendapatan Layanan",
                        data: "harga_layanan",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    {
                        title: "Pendapatan Obat",
                        data: "harga_obat",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    {
                        title: "Pendapatan Tambahan",
                        data: "harga_tambahan",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    {
                        title: "Diskon",
                        data: "total_diskon",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    {
                        title: "Pajak",
                        data: "total_pajak",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    {
                        title: "Total Tagihan",
                        data: "total_tagihan",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    { title: "Cara Pembayaran 1", data: "cara_pembayaran_1" },
                    {
                        title: "Total Pembayaran 1",
                        data: "jumlah_pembayaran_1",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    { title: "Cara Pembayaran 2", data: "cara_pembayaran_2" },
                    {
                        title: "Total Pembayaran 2",
                        data: "jumlah_pembayaran_2",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    { title: "Cara Pembayaran 3", data: "cara_pembayaran_3" },
                    {
                        title: "Total Pembayaran 3",
                        data: "jumlah_pembayaran_3",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    {
                        title: "Keterangan Pembayaran",
                        data: "keterangan4",
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        }
                    },

                ]
            });


            var newDataset = {
                data: [],
            };

            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'harga_layanan':
                        newlabel = "Pendapatan Layanan";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].harga_layanan)]);
                        break;
                    case 'harga_obat':
                        newlabel = "Pendapatan Obat";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].harga_obat)]);
                        break;
                    case 'harga_tambahan':
                        newlabel = "Pendapatan Tambahan";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].harga_tambahan)]);
                        break;
                    case 'total_diskon':
                        newlabel = "Total Diskon";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_diskon)]);
                        break;
                    case 'total_pajak':
                        newlabel = "Total Pajak";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_pajak)]);
                        break;
                    case 'total_tagihan':
                        newlabel = "Total Tagihan";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_tagihan)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
            }
            var datasetI = i + 1;

            chart.addSeries({
                name: 'dataset ' + datasetI + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[i]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[i]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            i += 1;
        });

        // -----------------------------Miqdad tambahin buat bikin Chart Start-----------------------
        $.when(getDataMonth).done(function(response) {
            // console.log(response);

            var newDatasetMonth = {
                data: [],
            };

            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {


                switch (selectedVal) {
                    case 'harga_layanan':
                        newlabel = "Pendapatan Layanan";
                        newDatasetMonth.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].harga_layanan), Date.parse(response.chart[index].tanggal)]);
                        break;
                    case 'harga_obat':
                        newlabel = "Pendapatan Obat";
                        newDatasetMonth.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].harga_obat), Date.parse(response.chart[index].tanggal)]);
                        break;
                    case 'harga_tambahan':
                        newlabel = "Pendapatan Tambahan";
                        newDatasetMonth.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].harga_tambahan), Date.parse(response.chart[index].tanggal)]);
                        break;
                    case 'total_diskon':
                        newlabel = "Total Diskon";
                        newDatasetMonth.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_diskon), Date.parse(response.chart[index].tanggal)]);
                        break;
                    case 'total_pajak':
                        newlabel = "Total Pajak";
                        newDatasetMonth.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_pajak), Date.parse(response.chart[index].tanggal)]);
                        break;
                    case 'total_tagihan':
                        newlabel = "Total Tagihan";
                        newDatasetMonth.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_tagihan), Date.parse(response.chart[index].tanggal)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDatasetMonth.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total), Date.parse(response.chart[index].tanggal)]);
                }
            }
            var datasetJ = j + 1;
            chartMonth.addSeries({
                name: 'dataset ' + datasetJ + ' - ' + newlabel,
                data: newDatasetMonth.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[j]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[j]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            j += 1;
        });


        $.when(getDataYear).done(function(response) {
            //  console.log(response);

            var newDataset = {
                data: [],
            };

            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {

                switch (selectedVal) {
                    case 'harga_layanan':
                        newlabel = "Pendapatan Layanan";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].harga_layanan)]);
                        break;
                    case 'harga_obat':
                        newlabel = "Pendapatan Obat";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].harga_obat)]);
                        break;
                    case 'harga_tambahan':
                        newlabel = "Pendapatan Tambahan";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].harga_tambahan)]);
                        break;
                    case 'total_diskon':
                        newlabel = "Total Diskon";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_diskon)]);
                        break;
                    case 'total_pajak':
                        newlabel = "Total Pajak";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_pajak)]);
                        break;
                    case 'total_tagihan':
                        newlabel = "Total Tagihan";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_tagihan)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
            }
            var datasetk = k + 1;
            chartYear.addSeries({
                name: 'dataset ' + datasetk + ' - ' + newlabel,
                data: newDataset.data,

                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[k]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[k]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            k += 1;
        });
        // -----------------------------Miqdad tambahin buat bikin Chart End-----------------------

        event.preventDefault();
    });

    $("#FormApotek").submit(function(event) {
        let data = [];
        let fields = $("#FormApotek :input").serializeArray();
        var selectedVal = $("#pilih_tipe option:selected").val();

        $.each(fields, function(i, field) {
            if (typeof data[field.name] === 'undefined') {
                data[field.name] = [field.value];
            } else {
                data[field.name].push(field.value);
            }
        });

        let getData = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataPenjualanApotek",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        let getDataMonth = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataPenjualanApotekMonth",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        let getDataYear = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataPenjualanApotekYear",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        console.log(data);
        // console.log(getDataMonth);


        var xagama = "";
        if (data.agama != null) {
            xagama = " | Agama: " + data.agama;
        }

        var keterangan = "";
        if (data.keterangan != "") {
            keterangan = " | Keterangan: " + data.keterangan;
        }

        var keterangan_pembayaran = "";
        if (data.keterangan_pembayaran != "") {
            keterangan_pembayaran = " | Keterangan Pembayaran: " + data.keterangan_pembayaran;
        }

        var nama_obat = "";
        if (data.nama_obat != "") {
            nama_obat = " | Nama obat: " + data.nama_obat;
        }
        var obat_from = "";
        if (data.obat_from != "") {
            obat_from = " | Obat From: " + data.obat_from;
        }
        var obat_to = "";
        if (data.obat_to != "") {
            obat_to = " | Obat To: " + data.obat_to;
        }
        var pilih_tipe = "";
        if (data.pilih_tipe != "") {
            pilih_tipe = " | Tipe Tampilan: " + data.pilih_tipe;
        }
        var tanggal_transaksi = "";
        if (data.tanggal_transaksi != "") {
            tanggal_transaksi = "  Tanggal transaksi: " + data.tanggal_transaksi;
        }

        var nama_pelanggan = "";
        if (data.nama_pelanggan != "") {
            nama_pelanggan = "  | Nama Pelanggan : " + data.nama_pelanggan;
        }

        var no_tlpn = "";
        if (data.no_tlpn != "") {
            no_tlpn = "  | No Telp : " + data.no_tlpn;
        }

        var getIforloop = i + 1;
        console.log(getIforloop);
        var className = $('#tab_' + getIforloop).attr('class');
        $("#tab_" + getIforloop).removeClass("d-none");


        $('#filterTable' + getIforloop).text(tanggal_transaksi + nama_obat + obat_from + obat_to + keterangan + keterangan_pembayaran + pilih_tipe + nama_pelanggan + no_tlpn);

        $.when(getData).done(function(response) {
            console.log(response);
            $('#table_laporan' + getIforloop).DataTable({
                data: response.table,
                destroy: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv',
                    {
                        extend: 'excelHtml5',
                        exportOptions: { orthogonal: 'export' },
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            $('c[r=A1] t', sheet).text("filter => " + tanggal_transaksi + nama_obat + obat_from + obat_to + keterangan + keterangan_pembayaran + pilih_tipe + nama_pelanggan + no_tlpn);
                            $('row:first c', sheet).attr('s', '0'); // first row is bold 


                        },


                    }
                ],
                columns: [
                    { title: "Tanggal", data: "tanggal", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "Nama Pelanggan", data: "nama_pelanggan" },
                    { title: "No Telp", data: "no_telp" },
                    { title: "No Obat", data: "kode_obat" },
                    { title: "Nama Obat", data: "nama_obat" },
                    { title: "Jumlah (Qty)", data: "jumlah_obat" },
                    {
                        title: "Harga satuan",
                        data: "harga_satuan",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    {
                        title: "Pendapatan Obat",
                        data: "harga_obat",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    {
                        title: "Keterangan",
                        data: "keterangan",
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        title: "HPP",
                        data: "hpp",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    {
                        title: "Laba Kotor",
                        data: "laba_kotor",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    {
                        title: "Keterangan Pembayaran",
                        data: "keterangan2",
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        }
                    },
                ]
            });

            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'harga_obat':
                        newlabel = "Penjualan Obat";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].harga_obat)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
            }
            var datasetI = i + 1;
            chart.addSeries({
                name: 'dataset ' + datasetI + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[i]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[i]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            i += 1;
        });

        $.when(getDataMonth).done(function(response) {
            console.log(response);


            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'harga_obat':
                        newlabel = "Penjualan Obat";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].harga_obat)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
            }
            var datasetJ = j + 1;
            chartMonth.addSeries({
                name: 'dataset ' + datasetJ + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[j]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[j]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            j += 1;
        });

        $.when(getDataYear).done(function(response) {
            //   console.log(response);


            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'harga_obat':
                        newlabel = "Penjualan Obat";
                        newDataset.data.push([response.chart[index].id, parseInt(response.chart[index].harga_obat)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([response.chart[index].id, parseInt(response.chart[index].total)]);
                }
            }
            var datasetK = k + 1;
            chartYear.addSeries({
                name: 'dataset ' + datasetK + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[k]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[k]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            k += 1;
        });
        event.preventDefault();
    });

    $("#FormLaporan").submit(function(event) {
        let data = [];
        let fields = $("#FormLaporan :input").serializeArray();

        $.each(fields, function(i, field) {
            if (typeof data[field.name] === 'undefined') {
                data[field.name] = [field.value];
            } else {
                data[field.name].push(field.value);
            }
        });

        // console.log(data);

        let getData = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getData",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        $.when(getData).done(function(response) {

            var newDataset = {
                data: [],
            };

            for (var index = 0; index < config.data.labels.length; ++index) {
                newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
            }
            var dataseti = i + 1;
            chart.addSeries({
                name: 'dataset ' + dataseti + ' - Total Transaksi',
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[i]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[i]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            i += 1;
        });

        event.preventDefault();
    });


    $("#FormStok").submit(function(event) {
        let data = [];
        let fields = $("#FormStok :input").serializeArray();
        var selectedVal = $("#pilih_tipe option:selected").val();

        $.each(fields, function(i, field) {
            if (typeof data[field.name] === 'undefined') {
                data[field.name] = [field.value];
            } else {
                data[field.name].push(field.value);
            }
        });

        console.log(data);

        let getData = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataStok",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        let getDataMonth = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataStokMonth",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        let getDataYear = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataStokYear",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });


        //   console.log(data);
        var gudang_from = "";
        if (data.gudang_from != "") {
            gudang_from = " | Gudang From: " + data.gudang_from;
        }
        var gudang_to = "";
        if (data.gudang_to != "") {
            gudang_to = " | Gudang To: " + data.gudang_to;
        }
        var nama_obat = "";
        if (data.nama_obat != "") {
            nama_obat = " | Nama Obat: " + data.nama_obat;
        }
        var no_faktur = "";
        if (data.no_faktur != "") {
            no_faktur = " | No Faktur: " + data.no_faktur;
        }
        var no_po = "";
        if (data.no_po != "") {
            no_po = " | No PO: " + data.no_po;
        }
        var opname_from = "";
        if (data.opname_from != "") {
            opname_from = " | Opname From: " + data.opname_from;
        }
        var opname_to = "";
        if (data.opname_to != "") {
            opname_to = " | Opname To: " + data.opname_to;
        }
        var pilih_tanggal = "";
        if (data.pilih_tanggal != "") {
            pilih_tanggal = " | Pilih Tanggal: " + data.pilih_tanggal;
        }
        var supplier = "";
        if (data.supplier != "") {
            supplier = " | Supplier: " + $("#nama_supplier").val();
        }
        var tanggal = "";
        if (data.tanggal != "") {
            tanggal = " Tanggal: " + data.tanggal;
        }
        var keterangan_pembayaran = "";
        if (data.keterangan_pembayaran != "") {
            keterangan_pembayaran = " | Keterangan Pembayaran: " + data.keterangan_pembayaran;
        }

        var getIforloop = i + 1;
        $('#filterTable' + getIforloop).text(tanggal + no_po + supplier + nama_obat + no_faktur + opname_from + opname_to + gudang_from + gudang_to + keterangan_pembayaran)
        var className = $('#tab_' + getIforloop).attr('class');
        $("#tab_" + getIforloop).removeClass("d-none");


        $.when(getData).done(function(response) {
            //  console.log(response);

            $('#table_laporan' + getIforloop).DataTable({
                data: response.table,
                destroy: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv',
                    {
                        extend: 'excelHtml5',
                        exportOptions: { orthogonal: 'export' },
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];


                            $('c[r=A1] t', sheet).text("filter => " + tanggal + no_po + supplier + nama_obat + no_faktur + opname_from + opname_to + gudang_from + gudang_to + keterangan_pembayaran);
                            $('row:first c', sheet).attr('s', '0'); // first row is bold
                        }

                    }
                ],

                columns: [
                    { title: "Tanggal", data: "tanggal", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "No Po", data: "no_po" },
                    { title: "Supplier", data: "nama_supplier" },
                    { title: "Nama Obat", data: "nama_obat" },
                    { title: "Jumlah Pemesanan", data: "jumlah_pemesanan" },
                    {
                        title: "Keterangan Pemesanan",
                        data: "keterangan_pemesanan",
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        }
                    },
                    { title: "Tanggal Faktur", data: "tanggal_faktur", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "No Faktur", data: "no_faktur" },
                    { title: "Jumlah Penerimaan", data: "jumlah_penerimaan" },
                    { title: "Harga Beli", data: "harga_beli" },
                    { title: "Total", data: "total", className: "text-right" },
                    { title: "Tanggal Kadaluarsa", data: "expired_date", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "Lokasi Penerimaan", data: "lokasi" },
                    {
                        title: "Keterangan Penerimaan",
                        data: "keterangan_penerimaan",
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        }
                    },
                    { title: "No. Obat", data: "kode_obat" },
                    { title: "Stok Opname", data: "stok_opname" },
                    { title: "Stok Gudang", data: "stok_gudang" },
                    {
                        title: "Keterangan Pembayaran",
                        data: "keterangan_pembayaran",
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return data;
                            } else if (typeof data === 'string') {
                                return (data.length > 20) ? data.substr(0, 20) + '...' : data;
                            } else {
                                return data;
                            }
                        }
                    },
                ]
            });

            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'stok_opname':
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_pajak)]);
                        break;
                    case 'stok_gudang':
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_tagihan)]);
                        break;
                    default:
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
            }
            var dataseti = i + 1;
            chart.addSeries({
                name: 'dataset ' + dataseti + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[i]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[i]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            i += 1;
        });
        $.when(getDataMonth).done(function(response) {
            //console.log(response); 
            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'stok_opname':
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_pajak)]);
                        break;
                    case 'stok_gudang':
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_tagihan)]);
                        break;
                    default:
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
            }
            var datasetJ = j + 1;
            chartMonth.addSeries({
                name: 'dataset ' + datasetJ + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[j]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[j]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            j += 1;
        });

        $.when(getDataYear).done(function(response) {
            //console.log(response); 
            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'stok_opname':
                        newDataset.data.push([response.chart[index].id, parseInt(response.chart[index].total_pajak)]);
                        break;
                    case 'stok_gudang':
                        newDataset.data.push([response.chart[index].id, parseInt(response.chart[index].total_tagihan)]);
                        break;
                    default:
                        newDataset.data.push([response.chart[index].id, parseInt(response.chart[index].total)]);
                }
            }
            var datasetK = k + 1;
            chartYear.addSeries({
                name: 'dataset ' + datasetK + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[k]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[k]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            k += 1;
        });
        event.preventDefault();
    });

    $("#FormJurnal").submit(function(event) {
        let data = [];
        let fields = $("#FormJurnal :input").serializeArray();
        var selectedVal = $("#pilih_tipe option:selected").val();

        $.each(fields, function(i, field) {
            if (typeof data[field.name] === 'undefined') {
                data[field.name] = [field.value];
            } else {
                data[field.name].push(field.value);
            }
        });

        let getData = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataJurnal",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        let getDataMonth = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataJurnalMonth",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        let getDataYear = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataJurnalYear",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        //console.log(data);

        var tanggal_transaksi = "";
        if (data.tanggal_transaksi != "") {
            tanggal_transaksi = "Tanggal Transaksi: " + data.tanggal_transaksi;
        }

        var debit_from = "";
        if (data.debit_from != "") {
            debit_from = " | Debit From: " + data.debit_from;
        }

        var debit_to = "";
        if (data.debit_to != "") {
            debit_to = " | Debit To: " + data.debit_to;
        }

        var kode_akun = "";
        if (data.kode_akun != "") {
            kode_akun = " | Kode Akun: " + data.kode_akun;
        }

        var kredit_from = "";
        if (data.kredit_from != "") {
            kredit_from = " | Kredit From: " + data.kredit_from;
        }

        var kredit_to = "";
        if (data.kredit_to != "") {
            kredit_to = " | Kredit From: " + data.kredit_to;
        }

        var pilih_tipe = "";
        if (data.pilih_tipe != "") {
            pilih_tipe = " | Tampilan: " + data.pilih_tipe;
        }

        var getIforloop = i + 1;
        $('#filterTable' + getIforloop).text(tanggal_transaksi + debit_from + debit_to + kode_akun + kredit_from +
            kredit_to + pilih_tipe
        )



        var className = $('#tab_' + getIforloop).attr('class');
        $("#tab_" + getIforloop).removeClass("d-none");


        $.when(getData).done(function(response) {
            //   console.log(response);
            $('#table_laporan' + getIforloop).DataTable({
                data: response.table,
                destroy: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv',
                    {
                        extend: 'excel',
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            var numrows = 4;
                            $('row c ', sheet).each(function(index) {
                                var attr = $(this).attr('r');

                                var pre = attr.substring(0, 1);
                                var ind = parseInt(attr.substring(1, attr.length));
                                ind = ind + numrows;
                                $(this).attr("r", pre + ind);
                            });

                            $('c[r=A1] t', sheet).text("filter => " +
                                tanggal_transaksi + debit_from + debit_to + kode_akun + kredit_from +
                                kredit_to + pilih_tipe);
                            $('row:first c', sheet).attr('s', '0'); // first row is bold
                        }

                    }
                ],
                columns: [
                    { title: "Tanggal", data: "tanggal", render: $.fn.dataTable.render.moment('DD/MM/YYYY') },
                    { title: "Uraian", data: "nama" },
                    { title: "Kode Akun", data: "kode_akun" },
                    { title: "Nama Akun", data: "nama_akun" },
                    {
                        title: "Debit",
                        data: "debit",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                    {
                        title: "Kredit",
                        data: "kredit",
                        className: "text-right",
                        render: function(data, type, row) {
                            return rupiah(data);
                        }
                    },
                ]
            });

            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'total_debit':
                        newlabel = "Total Debit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_debit)]);
                        break;
                    case 'total_kredit':
                        newlabel = "Total Kredit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_kredit)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
                //newlabel.push(response.chart[index].id);
            }

            dataseti = i + 1;
            chart.addSeries({
                name: 'dataset ' + dataseti + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[i]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[i]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            i += 1;

        });

        $.when(getDataMonth).done(function(response) {
            //   console.log(response);


            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'total_debit':
                        newlabel = "Total Debit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_debit)]);
                        break;
                    case 'total_kredit':
                        newlabel = "Total Kredit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_kredit)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
                //newlabel.push(response.chart[index].id);
            }

            datasetJ = j + 1;
            chartMonth.addSeries({
                name: 'dataset ' + datasetJ + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[j]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[j]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            j += 1;

        });

        $.when(getDataYear).done(function(response) {
            // console.log(response);


            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'total_debit':
                        newlabel = "Total Debit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_debit)]);
                        break;
                    case 'total_kredit':
                        newlabel = "Total Kredit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_kredit)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
                //newlabel.push(response.chart[index].id);
            }

            datasetK = k + 1;
            chartYear.addSeries({
                name: 'dataset ' + datasetK + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[k]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[k]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            k += 1;

        });

        event.preventDefault();
    });

    $("#FormNeraca").submit(function(event) {
        let data = [];
        let fields = $("#FormNeraca :input").serializeArray();
        var selectedVal = $("#pilih_tipe option:selected").val();

        $.each(fields, function(i, field) {
            if (typeof data[field.name] === 'undefined') {
                data[field.name] = [field.value];
            } else {
                data[field.name].push(field.value);
            }
        });

        let getData = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataJurnal",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        let getDataNeraca = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataNeraca",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        let getDataMonth = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataNeracaMonth",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        let getDataYear = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataNeracaYear",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        //    console.log(getDataNeraca);

        var tanggal_transaksi = "";
        if (data.tanggal_transaksi != "") {
            tanggal_transaksi = "Tanggal Transaksi: " + data.tanggal_transaksi;
        }

        var debit_from = "";
        if (data.debit_from != "") {
            debit_from = " | Debit From: " + data.debit_from;
        }

        var debit_to = "";
        if (data.debit_to != "") {
            debit_to = " | Debit To: " + data.debit_to;
        }

        var kode_akun = "";
        if (data.kode_akun != "") {
            kode_akun = " | Kode Akun: " + data.kode_akun;
        }

        var kredit_from = "";
        if (data.kredit_from != "") {
            kredit_from = " | Kredit From: " + data.kredit_from;
        }

        var kredit_to = "";
        if (data.kredit_to != "") {
            kredit_to = " | Kredit From: " + data.kredit_to;
        }

        var pilih_tipe = "";
        if (data.pilih_tipe != "") {
            pilih_tipe = " | Tampilan: " + data.pilih_tipe;
        }

        var getIforloop = i + 1;
        $('#filterTable' + getIforloop).text(tanggal_transaksi)



        var className = $('#tab_' + getIforloop).attr('class');
        $("#tab_" + getIforloop).removeClass("d-none");
        // console.log(getDataNeraca);

        $.when(getDataNeraca).done(function(response) {

            console.log(response);
            $('#table_laporan' + getIforloop).DataTable({
                paging: false,
                data: response.table,
                destroy: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv',
                    {
                        extend: 'excel',
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            $('c[r=A1] t', sheet).text("filter => " +
                                tanggal_transaksi);
                            $('row:first c', sheet).attr('s', '0'); // first row is bold
                        }

                    }
                ],
                fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    //console.log(aData);
                    if (aData['is_pilih'] === '0') {
                        $('td', nRow).css('background-color', '#e3e3e3');
                        $('td', nRow).css('font-weight', 'bold');
                    }
                },
                columns: [
                    { title: "Kode Akun", data: "kode_akun" },
                    { title: "Nama Akun", data: "nama_akun" },
                    {
                        title: "Debit",
                        data: "total_debit",
                        className: "text-right",
                        render: function(data, type, row) {
                            return (row['is_pilih'] === '0') ? '' : rupiah(data)
                        }
                    },
                    {
                        title: "Kredit",
                        data: "total_kredit",
                        className: "text-right",
                        render: function(data, type, row) {
                            return (row['is_pilih'] === '0') ? '' : rupiah(data)
                        }
                    },
                ]
            });

            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                newlabel = "Total Transaksi";
                newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                //newlabel.push(response.chart[index].id);
            }

            dataseti = i + 1;
            chart.addSeries({
                name: 'dataset ' + dataseti + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[i]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[i]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            i += 1;

        });

        $.when(getDataMonth).done(function(response) {
            //    console.log(response);


            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                newlabel = "Total Transaksi";
                newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                //newlabel.push(response.chart[index].id);
            }

            datasetJ = j + 1;
            chartMonth.addSeries({
                name: 'dataset ' + datasetJ + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[j]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[j]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            j += 1;

        });

        $.when(getDataYear).done(function(response) {
            console.log(response);


            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                newlabel = "Total Transaksi";
                newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                //newlabel.push(response.chart[index].id);
            }

            datasetK = k + 1;
            chartYear.addSeries({
                name: 'dataset ' + datasetK + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[k]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[k]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            k += 1;

        });

        event.preventDefault();
    });

    $("#FormRugi_Laba").submit(function(event) {
        let data = [];
        let fields = $("#FormRugi_Laba :input").serializeArray();
        var selectedVal = $("#pilih_tipe option:selected").val();

        $.each(fields, function(i, field) {
            if (typeof data[field.name] === 'undefined') {
                data[field.name] = [field.value];
            } else {
                data[field.name].push(field.value);
            }
        });


        let getDataRugiLaba = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataRugiLaba",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        let getDataMonth = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataRugiLabaMonth",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        let getDataYear = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataRugiLabaYear",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        //    console.log(getDataNeraca);

        var tanggal_transaksi = "";
        if (data.tanggal_transaksi != "") {
            tanggal_transaksi = "Tanggal Transaksi: " + data.tanggal_transaksi;
        }

        var debit_from = "";
        if (data.debit_from != "") {
            debit_from = " | Debit From: " + data.debit_from;
        }

        var debit_to = "";
        if (data.debit_to != "") {
            debit_to = " | Debit To: " + data.debit_to;
        }

        var kode_akun = "";
        if (data.kode_akun != "") {
            kode_akun = " | Kode Akun: " + data.kode_akun;
        }

        var kredit_from = "";
        if (data.kredit_from != "") {
            kredit_from = " | Kredit From: " + data.kredit_from;
        }

        var kredit_to = "";
        if (data.kredit_to != "") {
            kredit_to = " | Kredit From: " + data.kredit_to;
        }

        var pilih_tipe = "";
        if (data.pilih_tipe != "") {
            pilih_tipe = " | Tampilan: " + data.pilih_tipe;
        }

        var getIforloop = i + 1;
        $('#filterTable' + getIforloop).text(tanggal_transaksi)



        var className = $('#tab_' + getIforloop).attr('class');
        $("#tab_" + getIforloop).removeClass("d-none");


        $.when(getDataRugiLaba).done(function(response) {

            console.log(response);
            $('#table_laporan' + getIforloop).DataTable({
                paging: false,
                data: response.table,
                destroy: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv',
                    {
                        extend: 'excel',
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            $('c[r=A1] t', sheet).text("filter => " +
                                tanggal_transaksi);
                            $('row:first c', sheet).attr('s', '0'); // first row is bold
                        }

                    }
                ],
                fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    //console.log(aData);
                    if (aData['is_pilih'] === '0') {
                        $('td', nRow).css('background-color', '#e3e3e3');
                        $('td', nRow).css('font-weight', 'bold');
                    }
                },
                columns: [
                    { title: "Kode Akun", data: "kode_akun" },
                    { title: "Nama Akun", data: "nama_akun" },
                    {
                        title: "Debit",
                        data: "total_debit",
                        className: "text-right",
                        render: function(data, type, row) {
                            return (row['is_pilih'] === '0') ? '' : rupiah(data)
                        }
                    },
                    {
                        title: "Kredit",
                        data: "total_kredit",
                        className: "text-right",
                        render: function(data, type, row) {
                            return (row['is_pilih'] === '0') ? '' : rupiah(data)
                        }
                    },
                ]
            });

            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                newlabel = "Total Transaksi";
                newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                //newlabel.push(response.chart[index].id);
            }

            dataseti = i + 1;
            chart.addSeries({
                name: 'dataset ' + dataseti + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[i]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[i]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            i += 1;

        });

        $.when(getDataMonth).done(function(response) {
            //    console.log(response);


            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'total_debit':
                        newlabel = "Total Debit";
                        newDataset.data.push([response.chart[index].id, parseInt(response.chart[index].total_debit)]);
                        break;
                    case 'total_kredit':
                        newlabel = "Total Kredit";
                        newDataset.data.push([response.chart[index].id, parseInt(response.chart[index].total_kredit)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
                //newlabel.push(response.chart[index].id);
            }

            datasetJ = j + 1;
            chartMonth.addSeries({
                name: 'dataset ' + datasetJ + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[j]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[j]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            j += 1;

        });

        $.when(getDataYear).done(function(response) {
            // console.log(response);


            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'total_debit':
                        newlabel = "Total Debit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_debit)]);
                        break;
                    case 'total_kredit':
                        newlabel = "Total Kredit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_kredit)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
                //newlabel.push(response.chart[index].id);
            }

            datasetK = k + 1;
            chartYear.addSeries({
                name: 'dataset ' + datasetK + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[k]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[k]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            k += 1;

        });

        event.preventDefault();
    });


    $("#FormAruskas").submit(function(event) {
        let data = [];
        let fields = $("#FormAruskas :input").serializeArray();
        var selectedVal = $("#pilih_tipe option:selected").val();

        $.each(fields, function(i, field) {
            if (typeof data[field.name] === 'undefined') {
                data[field.name] = [field.value];
            } else {
                data[field.name].push(field.value);
            }
        });

        let getData = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataJurnal",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        let getDataNeraca = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataAruskas",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        let getDataMonth = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataAruskasMonth",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        let getDataYear = $.ajax({
            type: "POST",
            url: BASE_URL + "Laporan/getDataAruskasYear",
            data: JSON.stringify(Object.assign({}, data)),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        //    console.log(getDataNeraca);

        var tanggal_transaksi = "";
        if (data.tanggal_transaksi != "") {
            tanggal_transaksi = "Tanggal Transaksi: " + data.tanggal_transaksi;
        }

        var debit_from = "";
        if (data.debit_from != "") {
            debit_from = " | Debit From: " + data.debit_from;
        }

        var debit_to = "";
        if (data.debit_to != "") {
            debit_to = " | Debit To: " + data.debit_to;
        }

        var kode_akun = "";
        if (data.kode_akun != "") {
            kode_akun = " | Kode Akun: " + data.kode_akun;
        }

        var kredit_from = "";
        if (data.kredit_from != "") {
            kredit_from = " | Kredit From: " + data.kredit_from;
        }

        var kredit_to = "";
        if (data.kredit_to != "") {
            kredit_to = " | Kredit From: " + data.kredit_to;
        }

        var pilih_tipe = "";
        if (data.pilih_tipe != "") {
            pilih_tipe = " | Tampilan: " + data.pilih_tipe;
        }

        var getIforloop = i + 1;
        $('#filterTable' + getIforloop).text(tanggal_transaksi)



        var className = $('#tab_' + getIforloop).attr('class');
        $("#tab_" + getIforloop).removeClass("d-none");
        console.log(getDataNeraca);

        $.when(getDataNeraca).done(function(response) {

            console.log(response);
            $('#table_laporan' + getIforloop).DataTable({
                ordering: false,
                paging: false,
                data: response.table,
                destroy: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv',
                    {
                        extend: 'excel',
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            $('c[r=A1] t', sheet).text("filter => " +
                                tanggal_transaksi);
                            $('row:first c', sheet).attr('s', '0'); // first row is bold
                        }

                    }
                ],
                fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    //console.log(aData);
                    if (aData['is_pilih'] === '0') {
                        $('td', nRow).css('background-color', '#e3e3e3');
                        $('td', nRow).css('font-weight', 'bold');
                    }
                },
                footerCallback: function(tfoot, data, start, end, display) {
                    var api = this.api(),
                        data;
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };

                    var amtTotal = api
                        .column(3)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    $(tfoot).find('th').eq(1).html(amtTotal);
                },
                columns: [
                    { title: "Kode Akun", data: "kode_akun" },
                    { title: "Nama Akun", data: "nama_akun" },
                    {
                        title: "Debit",
                        data: "total_debit",
                        className: "text-right",
                        render: function(data, type, row) {
                            return (row['is_pilih'] === '0') ? '' : rupiah(data)
                        }
                    },
                    {
                        title: "Kredit",
                        data: "total_kredit",
                        className: "text-right",
                        render: function(data, type, row) {
                            return (row['is_pilih'] === '0') ? '' : rupiah(data)
                        }
                    },
                ]
            });

            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'total_debit':
                        newlabel = "Total Debit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_debit)]);
                        break;
                    case 'total_kredit':
                        newlabel = "Total Kredit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_kredit)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
                //newlabel.push(response.chart[index].id);
            }

            dataseti = i + 1;
            chart.addSeries({
                name: 'dataset ' + dataseti + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[i]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[i]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            i += 1;

        });

        $.when(getDataMonth).done(function(response) {
            //    console.log(response);


            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'total_debit':
                        newlabel = "Total Debit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_debit)]);
                        break;
                    case 'total_kredit':
                        newlabel = "Total Kredit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_kredit)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
                //newlabel.push(response.chart[index].id);
            }

            datasetJ = j + 1;
            chartMonth.addSeries({
                name: 'dataset ' + datasetJ + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[j]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[j]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            j += 1;

        });

        $.when(getDataYear).done(function(response) {
            // console.log(response);


            var newDataset = {
                data: [],
            };
            let newlabel = "";
            for (var index = 0; index < response.chart.length; ++index) {
                switch (selectedVal) {
                    case 'total_debit':
                        newlabel = "Total Debit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_debit)]);
                        break;
                    case 'total_kredit':
                        newlabel = "Total Kredit";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total_kredit)]);
                        break;
                    default:
                        newlabel = "Total Transaksi";
                        newDataset.data.push([parseInt(response.chart[index].id), parseInt(response.chart[index].total)]);
                }
                //newlabel.push(response.chart[index].id);
            }

            datasetK = k + 1;
            chartYear.addSeries({
                name: 'dataset ' + datasetK + ' - ' + newlabel,
                data: newDataset.data,
                type: 'area',
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[k]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[k]).setOpacity(0).get('rgba')]
                    ]
                }
            });
            k += 1;

        });

        event.preventDefault();
    });

    //Date range picker
    $('#reservation, #tanggal_pendaftaran, #tanggal_daftar_layanan, #tanggal_periksa, #Tanggal_lahir, #tanggal_filter').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoUpdateInput: false
    });

    $('#reservation, #tanggal_pendaftaran, #tanggal_daftar_layanan, #tanggal_periksa, #Tanggal_lahir, #tanggal_filter').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#reservation, #tanggal_pendaftaran, #tanggal_daftar_layanan, #tanggal_periksa, #Tanggal_lahir, #tanggal_filter').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });



    document.getElementById('clearDataset').addEventListener('click', function() {


        for (var index = i + 1; index >= 1; index--) {

            var className = $('#tab_' + index).attr('class');
            $("#tab_" + index).addClass("d-none");
            $('#filterTable' + index).text("")
            var $table = $('#table_laporan' + index).DataTable({
                destroy: true,
            });
            $table
                .clear()
                .draw();
        }

        i = 0;



        while (chart.series.length) {
            chart.series[0].remove();
        }

        // -----------------------------Miqdad tambahin buat reset Chart Start-----------------------
        j = 0;
        k = 0;
        try {
            while (chartMonth.series.length) {
                chartMonth.series[0].remove();
            }
            while (chartYear.series.length) {
                chartYear.series[0].remove();
            }

        } catch (err) {

        }

        // -----------------------------Miqdad tambahin buat reset Chart End-----------------------
    });


})(jQuery);