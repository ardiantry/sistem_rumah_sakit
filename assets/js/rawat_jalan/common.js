//common js
let disableOrder = {
    targets: '_all',
    orderable: false
};
let buttonChoose = {
    targets: 0,
    data: null,
    defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
};

Handlebars.registerHelper('format-date', function (date) {
    return moment(date).format('DD/MM/YYYY')
})

Handlebars.registerHelper('format-time', function (date) {
    return moment(date).format('HH:mm')
})

Handlebars.registerHelper('format-datetime', function (date) {
    return moment(date).format('DD/MM/YYYY HH:mm')
})

Handlebars.registerHelper('rupiah', function (number) {
    return "Rp " + number_format(number, 2, ',', '.');
})

Handlebars.registerHelper('total-rupiah', function (jumlah, harga) {
    return "Rp " + number_format((jumlah * harga), 2, ',', '.');
})

Handlebars.registerHelper('button-status', function (status, options) {
    if (status == "Menunggu") {
        return new Handlebars.SafeString('<button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>');
    }
    else if (status == "Diproses") {
        return new Handlebars.SafeString('<button type="button" class="btn btn-warning btn-release" disabled><i class="fas fa-business-time"></i></button>');
    }
    else if (status == "Selesai") {
        return new Handlebars.SafeString('<button type="button" class="btn btn-success btn-release" disabled><i class="fas fa-check"></i></button>');
    }
})

function fillTable($target, data, template) {
    $target.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $target.find('thead tr th').length;
        $target.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        $target.find('tbody').append(template(value));
    });
}

function selectListner (event, item, arg) {
    event.preventDefault();
    let myObject = new(arg.objectType)(item.data);
    console.log(myObject);
    if (arg.obj.length === 0) {
        arg.$target.find('tbody').empty();
    }
    let index = indexItemInArray(arg.obj, myObject, arg.key);
    if (index == -1) {
        arg.obj.push(myObject);
        arg.$target.find('tbody').append(arg.template(myObject));
    } else {
        arg.obj[index].jumlah = arg.obj[index].jumlah + 1;
        let input = arg.$target.find('tbody tr').eq(index).find('.input-jumlah');
        $(input).val(parseInt($(input).val()) + 1);
        $(input).blur();
    }
    autoCompleteClear(arg.$control);
}

function searchListener(search, callback, arg, extra) {
	// let's do a custom ajax call
	let data = Object.fromEntries(
		// convert to array, map, and then fromEntries gives back the object
		Object.entries(extra).map(([key, value]) => [key, value])
	);
	data.search = search;
	$.getJSON(arg.url, data, function(response) {
		callback($.map(response, function(item) {
			const auto = { value: item[arg.field.value], text: item[arg.field.text] }
			const data = { data: item }
			const result = {
				...auto,
				...data,
			};
			return result;
		}))
	});
}

function deleteListener(e, arg){
	$tr = $(e.target).closest('tr');

	const index = $(e.target).closest('td').parent()[0].sectionRowIndex;
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
				arg.arr.splice(index, 1);
				$tr.remove();
				if (arg.$target.find('tbody tr').length == 0) {
					let colspan = arg.$target.find('thead tr th').length;
					arg.$target.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
				}
			}
		}
	});	
}

function autoCompleteClear($e) {
    $e.val('').focus();
    $e.parent().find('.dropdown-menu .dropdown-item.active').removeClass('active');
}

function selectClear($e) {
    $e.val('').focus();
}

function indexItemInArray(array, item, key) {
    for (var i = 0; i < array.length; i++) {
        // This if statement depends on the format of your array
        if (array[i][key] == item[key]) {
            return i; // Found it
        }
    }
    return -1; // Not found
}

function SpinnerOn() {
    console.log("spinner on");
    $(".spinner-input").show();
}

function SpinnerOff() {
    $(".spinner-input").hide();
}