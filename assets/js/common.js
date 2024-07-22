function GetStateIndex(){
    var $active = $(".wizard").find('li.active');
    const click_index = $('.wizard .nav-tabs li').index($active);    
    return click_index;
}

function setAutoCompleteSelection($control, $target, arr, objectType, key, template){
    $control.on('autocomplete.select', function(evt, item) {
        evt.preventDefault();
        let myObject = new(objectType)(item.data);
        if (arr.length === 0) {
            $target.find('tbody').empty();
        }          
        let index = indexItemInArray(arr, myObject, key);
        if (index == -1) {
            arr.push(myObject);
            $target.find('tbody').append(template(myObject));                    
        }
        else{
            arr[index].jumlah = arr[index].jumlah + 1;            
            let input = $target.find('tbody tr').eq(index).find('.input-jumlah');
            $(input).val(parseInt($(input).val()) + 1);
            $(input).blur();            
        }
        autoCompleteClear($control);
    }); 
}

function setAutoComplete({$control, field, url, extra}){
    $control.autoComplete({
        preventEnter: true,
        resolver: 'custom',
        events: {
            search: function(search, callback) {
                // let's do a custom ajax call
                let data = Object.fromEntries(
                    // convert to array, map, and then fromEntries gives back the object
                    Object.entries(extra).map(([key, value]) => [key, value.val()])
                );
                data.search = search;
                $.getJSON(url, function (response) {
                    callback($.map(response, function(item) {
                        const auto = {value: item[field.value], text: item[field.text]}
                        const data = {data: item}
                        const result = {
                            ...auto,
                            ...data,
                          };                        
                        return result;
					}))
                }); 
            }
        }
    });
}

function handleTableDelete($target, arr) {
    $target.find('tbody').on("click", "td .btn-delete", function() {
        $tr = $(this).closest('tr');
        const index = $(this).closest('td').parent()[0].sectionRowIndex;
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
                    arr.splice(index, 1);                
                    $tr.remove();
                    if ($target.find('tbody tr').length == 0) {
                        let colspan = $target.find('thead tr th').length;
                        $target.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
                    }
                }
            }
        });
    });
}

function autoCompleteClear($e) {
    $e.val('').focus();
    $e.parent().find('.dropdown-menu .dropdown-item.active').removeClass('active');
}
function selectClear($e) {
    $e.val('').focus();
}

function initWizard() {
    //Initialize wizard			
    var $active = $(".wizard").find('li.active');
    $active.removeClass('active');
    let $step = $('.wizard .nav-tabs li');
    $step.eq(WIZARD_INDEX).addClass('active').removeClass('disabled');

    $step.each(function(i, item) {
        if (i < WIZARD_INDEX)
            $(item).addClass('done').removeClass('disabled');
    });

    $step.eq(WIZARD_INDEX).find('a[data-toggle="tab"]').click();
}

function actionWizard() {
    $('.nav-tabs > li a[title]').tooltip();
    $("#WizardForm").validate();

    //Action Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        var $target = $(e.target);
        if ($target.parent().hasClass('disabled')) {
            return false;
        } else {
            $target.parent()
                .addClass('active')
                .siblings()
                .removeClass('active');
        }
    });

    $(".next-step").click(function(e) {
        var $wizard = $('#wizardForm');
        $wizard.validate().settings.ignore = ":disabled,:hidden";
        //check validation
        if (!$wizard.valid()) return false;
        var $active = $(".wizard").find('li.active');
        $active
            .removeClass('active')
            .addClass('done')
            .next()
            .removeClass('disabled')
            .addClass('active').find('a[data-toggle="tab"]').click();
    });

    $(".prev-step").click(function(e) {
        var $active = $(".wizard").find('li.active');
        $active
            .removeClass('active')
            .prev().addClass('active').find('a[data-toggle="tab"]').click();
    });
}

function indexItemInArray(array, item, key) {
    for (var i = 0; i < array.length; i++) {
        // This if statement depends on the format of your array
        if (array[i][key] == item[key]) {
            return i;   // Found it
        }
    }
    return -1;   // Not found
}