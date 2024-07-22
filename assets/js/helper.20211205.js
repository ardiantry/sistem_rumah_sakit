let today = new Date();
let dd = String(today.getDate()).padStart(2, '0');
let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
let yyyy = today.getFullYear();
let hh = addZero(today.getHours());
let min = addZero(today.getMinutes());
let sec = addZero(today.getSeconds());
const TODAY = dd + '/' + mm + '/' + yyyy;
const TODAY_ISO = yyyy + '-' + mm + '-' + dd;
const TODAY_TIME = yyyy + mm + dd + hh + min + sec;



const Toast = Swal.mixin({
    toast: true,
    position: 'center',
    showConfirmButton: false,
    timer: 2000
});

const ToastEnd = Swal.mixin({
    toast: true,
    position: 'center',
    showConfirmButton: false,
    timer: 2000,
    onAfterClose: (toast) => {
        location.reload();
    }
});

function getNoReg() {
    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    let yyyy = today.getFullYear();
    let hh = addZero(today.getHours());
    let min = addZero(today.getMinutes());
    let sec = addZero(today.getSeconds());
    return 'R' + yyyy + mm + dd + hh + min + sec;
}

function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function bindCombo({
    $combo,
    dataSource,
    dataTextField,
    dataValueField,
    onSelectedIndexChanged
}) {
    $.each(dataSource, function(_key, comboOptionProperty) {
        let comboProp = {
            dataText: comboOptionProperty[dataTextField],
            dataValue: comboOptionProperty[dataValueField]
        }
        let comboOption = makeCombo(comboProp, comboOptionProperty);
        $combo.append(comboOption);
    });
    $combo.on('change', onSelectedIndexChanged);
}

function makeCombo({ dataText, dataValue}, data) {
    const myJSON = JSON.stringify(data);
    
    return `<option value="${dataValue}" data-item="${myJSON}'>${dataText}</option>`;
}

function fnTableToObject($table) {
    var data = [];
    // go through cells
    for (var i = 1; i < $table[0].rows.length; i++) {
        var tableRow = $table[0].rows[i];
        var rowData = {};
        if ($(tableRow).has('[data-label="empty_row"]').length == 0) {
            for (var j = 0; j < tableRow.cells.length; j++) {
                if (!(tableRow.cells[j].dataset.label).includes('button')) {
                    if ($(tableRow.cells[j]).has('input').length > 0) {
                        if ($(tableRow.cells[j]).find('input').eq(0).hasClass("datetimepicker-input")) {
                            rowData[tableRow.cells[j].dataset.label] = moment($(tableRow.cells[j]).find('input').eq(0).datetimepicker('viewDate')).format('YYYY-MM-DD');
                        } else {
                            rowData[tableRow.cells[j].dataset.label] = $(tableRow.cells[j]).find('input').eq(0).val();
                        }
                    } else if ($(tableRow.cells[j]).has('img').length > 0) {
                        let file = $(tableRow.cells[j]).find('img').eq(0).attr('src');
                        file = file.replace(/^data:image\/(png|jpg|jpeg);base64,/, '');
                        rowData[tableRow.cells[j].dataset.label] = file;
                    } else {
                        rowData[tableRow.cells[j].dataset.label] = tableRow.cells[j].innerHTML;
                    }
                }
            }
            data.push(rowData);
        }
    }
    return data;
}

function rupiah(angka) {
    $hasil_rupiah = "Rp " + number_format(angka, 2, ',', '.');
    return $hasil_rupiah;
}

function clearRupiah(rupiahFormat) {
    return parseInt(rupiahFormat.replace(/Rp/g, "").replace(/[.]/g, '').replace(/[,]/g, '.'));
}

function number_format(number, decimals, decPoint, thousandsSep) { // eslint-disable-line camelcase
    //  discuss at: https://locutus.io/php/number_format/
    // original by: Jonas Raoni Soares Silva (https://www.jsfromhell.com)
    // improved by: Kevin van Zonneveld (https://kvz.io)
    // improved by: davook
    // improved by: Brett Zamir (https://brett-zamir.me)
    // improved by: Brett Zamir (https://brett-zamir.me)
    // improved by: Theriault (https://github.com/Theriault)
    // improved by: Kevin van Zonneveld (https://kvz.io)
    // bugfixed by: Michael White (https://getsprink.com)
    // bugfixed by: Benjamin Lupton
    // bugfixed by: Allan Jensen (https://www.winternet.no)
    // bugfixed by: Howard Yeend
    // bugfixed by: Diogo Resende
    // bugfixed by: Rival
    // bugfixed by: Brett Zamir (https://brett-zamir.me)
    //  revised by: Jonas Raoni Soares Silva (https://www.jsfromhell.com)
    //  revised by: Luke Smith (https://lucassmith.name)
    //    input by: Kheang Hok Chin (https://www.distantia.ca/)
    //    input by: Jay Klehr
    //    input by: Amir Habibi (https://www.residence-mixte.com/)
    //    input by: Amirouche
    //   example 1: number_format(1234.56)
    //   returns 1: '1,235'
    //   example 2: number_format(1234.56, 2, ',', ' ')
    //   returns 2: '1 234,56'
    //   example 3: number_format(1234.5678, 2, '.', '')
    //   returns 3: '1234.57'
    //   example 4: number_format(67, 2, ',', '.')
    //   returns 4: '67,00'
    //   example 5: number_format(1000)
    //   returns 5: '1,000'
    //   example 6: number_format(67.311, 2)
    //   returns 6: '67.31'
    //   example 7: number_format(1000.55, 1)
    //   returns 7: '1,000.6'
    //   example 8: number_format(67000, 5, ',', '.')
    //   returns 8: '67.000,00000'
    //   example 9: number_format(0.9, 0)
    //   returns 9: '1'
    //  example 10: number_format('1.20', 2)
    //  returns 10: '1.20'
    //  example 11: number_format('1.20', 4)
    //  returns 11: '1.2000'
    //  example 12: number_format('1.2000', 3)
    //  returns 12: '1.200'
    //  example 13: number_format('1 000,50', 2, '.', ' ')
    //  returns 13: '100 050.00'
    //  example 14: number_format(1e-8, 8, '.', '')
    //  returns 14: '0.00000001'

    number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
    var n = !isFinite(+number) ? 0 : +number
    var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
    var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
    var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
    var s = ''

    var toFixedFix = function(n, prec) {
        if (('' + n).indexOf('e') === -1) {
            return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
        } else {
            var arr = ('' + n).split('e')
            var sig = ''
            if (+arr[1] + prec > 0) {
                sig = '+'
            }
            return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
        }
    }

    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || ''
        s[1] += new Array(prec - s[1].length + 1).join('0')
    }

    return s.join(dec)
}

(function($) {
    initConfig($);
})(jQuery);

function initConfig($) {
    //$.fn.datetimepicker.Constructor.Default.format = 'DD/MM/YYYY';
    //$.fn.datetimepicker.Constructor.Default.locale = 'en';

    //$.fn.datetimepicker.Constructor.Default.defaultDate = new Date();

    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
        },
    });

    $('.datepicker').datetimepicker({
        language: 'en',
        format: 'DD/MM/YYYY',
        defaultDate: new Date()
    });

    $('.datetimepicker').datetimepicker({
        language: 'en',
        format: 'DD/MM/YYYY HH:mm',
        sideBySide: true,
        defaultDate: new Date()
    });

    $.validator.setDefaults({
        errorElement: 'span',
        errorPlacement: function(error, element) {
            //error.addClass('invalid-feedback');
            //element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function() {
            //alert("Form successful submitted!");
        }
    });

    $('.show-alert').on("click", function(e) {
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
                console.log('This was logged in the callback: ' + result);
                if (result === true) {
                    ToastEnd.fire({
                        icon: 'success',
                        title: 'Data berhasil disimpan'
                    })
                }
            }
        });
    });
}

function getFormData($form) {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};
    console.log(unindexed_array);
    $.map(unindexed_array, function(n, i) {
        indexed_array[n['name']] = n['value'];
    });
    return indexed_array;
}

function template(strings, ...keys) {
    return (function(...values) {
        let dict = values[values.length - 1] || {};
        let result = [strings[0]];
        keys.forEach(function(key, i) {
            let value = Number.isInteger(key) ? values[key] : dict[key];
            result.push(value, strings[i + 1]);
        });
        return result.join('');
    });
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    console.log(charCode);
    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode != 37))
        return false;

    return true;
}