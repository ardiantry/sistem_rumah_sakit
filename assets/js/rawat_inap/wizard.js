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
    return click_index;
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
        $wizardForm.validate().settings.ignore = ":disabled,:hidden";
        if (!$wizardForm.valid()) return false;
        var $this_=$(this);
        var $active = $wizard.find('li.active');
        $this_.attr('disabled','disabled');
        let click_index = $wizard.find('.nav-tabs li').index($active);
        switch (click_index) {
            case 0:
                encounter.state_index = 1;                
                console.log("save encounter pendaftaran");
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
            case 1:
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
                        console.log('done');
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
                encounter.state_index = 3;      
                encounter.is_release = 1;                          
                console.log("save encounter apotek & next");                
                encounter.getStep4();          
                $.when(encounter.save()).done(function(response) {
                     $this_.removeAttr('disabled');
                    if (response.status) {
                        encounter.renderPayment(); 
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

    $wizardForm.find(".pembayaran-step").click(function (e) {
        $wizardForm.validate().settings.ignore = ":disabled,:hidden";
        if (!$wizardForm.valid()) return false;
        var $btn = $(this);
        var $active = $wizard.find('li.active');
        let click_index = $wizard.find('.nav-tabs li').index($active);

        if (encounter.icd10.length === 0) {
            bootbox.alert({
                centerVertical: true,
                message: "Minimal 1 ICD 10!",
                size: 'small'
            });
            return false;
        }

        bootbox.confirm({
            title: "Konfirmasi Penyimpanan",
            message: "Apakah anda yakin mengakhiri transaksi ? Pastikan seluruh proses pemeriksaan dan obat sudah selesai.",
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
            callback: function (result) {
                if (result === true) {
                    $btn.prop('disabled', true);
                    encounter.state_index = 3;
                    encounter.is_release = 1;
                    console.log("save encounter pemeriksaan pembayaran");
                    encounter.getStep3();
                    encounter.getStep4();          
                    $.when(encounter.save()).done(function (response) {
                        if (response.status) {
                            encounter.obat = [];
                            encounter.renderPayment();
                            actionNext($active);
                            actionNext($active);
                        } else {
                            bootbox.alert({
                                centerVertical: true,
                                message: response.message,
                                size: 'small'
                            });
                        }
                    });
                    $btn.prop('disabled', false);
                }
            }
        });
    });

    $wizardForm.find(".pembayaran-apotek-step").click(function (e) {
        $wizardForm.validate().settings.ignore = ":disabled,:hidden";
        if (!$wizardForm.valid()) return false;
        var $btn = $(this);
        var $active = $wizard.find('li.active');
        bootbox.confirm({
            title: "Konfirmasi Penyimpanan",
            message: "Apakah anda yakin mengakhiri transaksi ? Pastikan seluruh proses pemeriksaan dan obat sudah selesai.",
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
            callback: function (result) {
                if (result === true) {
                    $btn.prop('disabled', true);
                    encounter.state_index = 3;
                    encounter.is_release = 1;
                    console.log("save encounter apotek & next");
                    encounter.getStep4();
                    $.when(encounter.save()).done(function (response) {
                        if (response.status) {
                            encounter.obat = [];
                            encounter.renderPayment();
                            actionNext($active);
                        } else {
                            bootbox.alert({
                                centerVertical: true,
                                message: response.message,
                                size: 'small'
                            });
                        }
                    });                        
                    $btn.prop('disabled', false);
                }
            }
        });
    });

    $wizardForm.find(".release-step").click(function (e) {
        $wizardForm.validate().settings.ignore = ":disabled,:hidden";
        if (!$wizardForm.valid()) return false;
        var $btn = $(this);
        bootbox.confirm({
            title: "Konfirmasi Penyimpanan",
            message: "Apakah Anda Yakin ? Pengeluaran obat akan mengurangi stok.",
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
            callback: function (result) {
                if (result === true) {
                    $btn.prop('disabled', true);
                    encounter.state_index = 3;
                    encounter.is_release = 1;
                    console.log("release encounter apotek");
                    encounter.getStep4();
                    $.when(encounter.save()).done(function (response) {
                        if (response.status) {
                            console.log('done');
                            ToastEnd.fire({
                                icon: 'success',
                                title: 'Data berhasil disimpan'
                            });
                        } else {
                            bootbox.alert({
                                centerVertical: true,
                                message: response.message,
                                size: 'small'
                            });
                        }
                    });
                    $btn.prop('disabled', false);
                }
            }
        });
    });

    $wizardForm.find(".save-step").click(function (e) {
        $wizardForm.validate().settings.ignore = ":disabled,:hidden";
        if (!$wizardForm.valid()) return false;
        var $btn = $(this);
        var $active = $wizard.find('li.active');
        bootbox.confirm({
            title: "Konfirmasi Penyimpanan",
            message: "Apakah Anda Yakin ? Simpan sebagai draft dan obat belum keluar dari apotek.",
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
            callback: function (result) {
                if (result === true) {             
                    $btn.prop('disabled', true);                    
                    encounter.state_index = 3;
                    encounter.is_release = 0;
                    console.log("save encounter apotek");
                    encounter.getStep4();
                    $.when(encounter.save()).done(function (response) {
                        if (response.status) {
                            console.log('done');
                            ToastEnd.fire({
                                icon: 'success',
                                title: 'Data berhasil disimpan'
                            });
                        } else {
                            bootbox.alert({
                                centerVertical: true,
                                message: response.message,
                                size: 'small'
                            });
                        }
                    });
                    $btn.prop('disabled', false);
                }
            }
        });
    });

    $wizardForm.find(".prev-step").click(function(e) {
        var $active = $wizard.find('li.active');
        $active
            .removeClass('active')
            .prev().addClass('active').find('a[data-toggle="tab"]').click();
    });
}