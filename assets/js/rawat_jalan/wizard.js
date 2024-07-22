/**
 * Rawat Jalan
 * ------------------
 * Denis Fadillah
 */
(function($) {
    'use strict'
    var $wizard = $('.wizard')
    var $wizardForm = $('#wizardForm')
    $wizard.find('.nav-tabs > li a[title]').tooltip();
    initWizard({ $wizard, $wizardForm });
    actionWizard({ $wizard, $wizardForm })
})(jQuery)

function GetStateIndex() {
    var $active = $(".wizard").find('li.active');
    const click_index = $('.wizard .nav-tabs li').index($active);
    return click_index - 2;
}

function initWizard({ $wizard, $wizardForm }) {
    //Initialize wizard			
    var $active = $wizard.find('li.active');
    $active.removeClass('active');
    let $step = $wizard.find('.nav-tabs li'); 
    $step.eq(WIZARD_INDEX).addClass('active').removeClass('disabled');
    $step.each(function(i, item) {
        if (i < WIZARD_INDEX)
            $(item).addClass('done').removeClass('disabled');
    });
    $step.eq(WIZARD_INDEX).find('a[data-toggle="tab"]').click();
    $wizardForm.validate();

    $wizard.find('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
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
} 

function actionNext($active) {
    $active
        .removeClass('active')
        .addClass('done')
        .next()
        .removeClass('disabled')
        .addClass('active').find('a[data-toggle="tab"]').click();
}

function actionWizard({ $wizard, $wizardForm }) {
    $wizardForm.find(".next-step").click(function(e) {
//console.log('disini');
        $wizardForm.validate().settings.ignore = ":disabled,:hidden";
        if (!$wizardForm.valid()) return false;
        var $this_=$(this);
        var $active = $wizard.find('li.active');
        $this_.attr('disabled','disabled');
        let click_index = $wizard.find('.nav-tabs li').index($active);
        switch (click_index) {
            case 0:
                console.log("save patient");
                patient.getStep1();
                $.when(patient.save()).done(function(response) {
                    $this_.removeAttr('disabled');

                    if (response.status) {
                        patient.updateID(response.data.id);
                        actionNext($active);
                    } else {
                        bootbox.alert({
                            centerVertical: true,
                            message: response.message,
                            size: 'small'
                        });
                    }                  
                });               
                break;
            case 1:
                $this_.removeAttr('disabled');
                encounter.state_index = 1;                
               // console.log("save encounter pendaftaran");
                encounter.getStep2();                
                $.when(encounter.save()).done(function(response) {
                    $this_.removeAttr('disabled');

                    if (response.status) {
                        encounter.updateValue(response.data.id, response.data.no_registrasi);
                        actionNext($active);
                    } else {
                        bootbox.alert({
                            centerVertical: true,
                            message: response.message,
                            size: 'small'
                        });
                    }
                });                
                break;
            case 2:
                $this_.removeAttr('disabled');
                encounter.state_index = 2;
                if (encounter.icd10.length === 0) {
                    bootbox.alert({
                        centerVertical: true,
                        message: "Minimal 1 ICD 10!",
                        size: 'small'
                    });
                    return false;
                }                
                console.log("save encounter pemeriksaan");                
                encounter.getStep3();   
                $.when(encounter.save()).done(function(response) {
                    $this_.removeAttr('disabled');

                    if (response.status) {
                        actionNext($active);
                    } else {
                        bootbox.alert({
                            centerVertical: true,
                            message: response.message,
                            size: 'small'
                        });
                    }
                });                              
                break;
            case 3:
                $this_.removeAttr('disabled');
                encounter.state_index = 3;                
                console.log("save encounter apotek");                
                encounter.getStep4();          
                $.when(encounter.save()).done(function(response) {
                    $this_.removeAttr('disabled');

                    if (response.status) {
                        actionNext($active);
                    } else {
                        bootbox.alert({
                            centerVertical: true,
                            message: response.message,
                            size: 'small'
                        });
                    }
                });                                     
                break;                
        }
    });

    $wizardForm.find(".prev-step").click(function(e) {
        console.log(encounter);        
        var $active = $wizard.find('li.active');
        $active
            .removeClass('active')
            .prev().addClass('active').find('a[data-toggle="tab"]').click();
    });

    $wizardForm.find(".rujuk-step").click(function (e) {
        $wizardForm.validate().settings.ignore = ":disabled,:hidden";
        if (!$wizardForm.valid()) return false;

        var $active = $wizard.find('li.active');

        if (encounter.icd10.length === 0) {
            bootbox.alert({
                centerVertical: true,
                message: "Minimal 1 ICD 10!",
                size: 'small'
            });
            return false;
        }           
        bootbox.confirm({
            title: "Konfirmasi Rujuk Rawat Inap",
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
                    encounter.state_index = 2;        
                    encounter.getStep3();   
                    $.when(encounter.save()).done(function (response) {
                        if (response.status) {
                            console.log('done');
                            $.when(encounter.rujuk()).done(function (response) {
                                if (response.status) {
                                    ToastEnd.fire({
                                        icon: 'success',
                                        title: 'Data berhasil disimpan'
                                    });
                                }                    
                            })                
            
                        } else {
                            console.log(response);
                        }
                    });
                    console.log(encounter);                    
                }
            }
        });        
    });    
}