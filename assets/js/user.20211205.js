(function($) {
    UserBinding($);
})(jQuery);

function UserBinding($) {
    $("#FormUser").validate({
        rules: {
            formEmail: {
                remote: {
                    url: 'User/checkEmail',
                    type: "post",
                    async: false
                }
            },
            formPassword: {
                minlength: 8
            },
            formPasswordConfirmation: {
                minlength: 8,
                equalTo: "#formPassword"
            }
        },
        messages: {
            formEmail: { remote: "Email sudah terdaftar", email: "Alamat email tidak valid" },
            formPassword: { minlength: "Password minimal 8 karakter" },
            formPasswordConfirmation: { minlength: "Password minimal 8 karakter", equalTo: "Konfirmasi password tidak sama" }
        },
        onkeyup: false,
        onfocusout: function(element) {
            // "eager" validation
            this.element(element);
        },

        errorElement: 'span',
        errorPlacement: function(error, element) {
            //if(element.is($('#formEmail')) && (error.text() === "Email sudah terdaftar")){
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            //}
        }
    });

    $("#FormUserEdit").validate({
        rules: {
            formEmailEdit: {
                remote: {
                    url: 'User/checkEmail',
                    type: "post",
                    async: false
                }
            },
            formPasswordEdit: {
                minlength: 8
            },
            formPasswordConfirmationEdit: {
                minlength: 8,
                equalTo: "#formPasswordEdit"
            }
        },
        messages: {
            formEmailEdit: { remote: "Email sudah terdaftar", email: "Alamat email tidak valid" },
            formPasswordEdit: { minlength: "Password minimal 8 karakter" },
            formPasswordConfirmationEdit: { minlength: "Password minimal 8 karakter", equalTo: "Konfirmasi password tidak sama" }
        },
        onkeyup: false,
        onfocusout: function(element) {
            // "eager" validation
            this.element(element);
        },

        errorElement: 'span',
        errorPlacement: function(error, element) {
            //if(element.is($('#formEmail')) && (error.text() === "Email sudah terdaftar")){
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            //}
        }
    });
    var $tableUserPrivilegeDT = $("#tableUserPrivilege").DataTable({
        autoWidth: false,
        paging: false,
        ordering: false,
        info: false,
        searching: false,
        "columnDefs": [{
                targets: -1,
                data: "privilege_status",
                render: function(data, type, row, meta) {
                    return `<div class="form-group">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="Status-${row.id_menu}" value="0" ${(data==0) ? 'checked' : ''}>
                  <label class="form-check-label">No Access</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="Status-${row.id_menu}" value="1" ${(data==1) ? 'checked' : ''}>
                  <label class="form-check-label">Read Only</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="Status-${row.id_menu}" value="2" ${(data==2) ? 'checked' : ''}>
                  <label class="form-check-label">Full Access</label>
                </div>
              </div>`;
                },
                className: "text-center py-0 align-middle"
            },
            {
                targets: [0, 1],
                visible: false
            }
        ],
        "columns": [
            { "data": "id_user" },
            { "data": "id_user" },
            { "data": "nama_menu" },
            { "data": "privilege_status" },
        ]
    });

    $('#btnSaveUserPrivilege').click(function() {
        var unindexed_array = $tableUserPrivilegeDT.$('input').serializeArray();
        let id = $("#IdUserPrivilege").val();
        var indexed_array = {};

        $.map(unindexed_array, function(n, i) {
            indexed_array[n['name']] = n['value'];
        });

        //console.log(data);        
        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "User/savePrivilege",
            data: JSON.stringify({ id_user: id, menu: indexed_array }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });
        $.when(aSave).done(function(response) {
            if (response.status) {
                console.log(response);
            } else
                console.log(response.message);
        });
        $('#modal-formUserPrivilege').modal('toggle');
        return false;
    });

    var $tableUsersDT = $("#tableUsers").DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [0, "asc"]
        ],
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-primary btn-sm btn-view" ><i class="fas fa-user-lock"></i> Hak Akses</button>
            <button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i> Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i> Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [0, -2],
                visible: false
            }
        ],
        ajax: {
            url: BASE_URL + 'User/getUsersDatatable',
            type: "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "first_name" },
            { "data": "last_name" },
            { "data": "email" },
            { "data": "phone" },
            { "data": "description" },
            {
                "data": "active",
                "render": function(data, type, row) { return (data == 1) ? 'Yes' : 'No' }
            },
            { "data": "group_id" },
            { "data": null }
        ]
    });

    $("#tableUsers tbody").on('click', 'button.btn-view', function() {
        let data = $tableUsersDT.row($(this).parents('tr')).data();

        let aPrivilege = $.ajax({
            type: "POST",
            url: BASE_URL + "User/getRegisterPrivilege",
            data: JSON.stringify({ id: data['id'] }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aPrivilege).done(function(response) {

            $tableUserPrivilegeDT.clear().draw();
            $tableUserPrivilegeDT.rows.add(response.data); // Add new data
            $tableUserPrivilegeDT.columns.adjust().draw(); // Redraw the DataTable            

        });

        $("#IdUserPrivilege").val(data['id']);
        $('#modal-formUserPrivilege').modal('toggle');
    });

    $("#tableUsers tbody").on('click', 'button.btn-edit', function() {
        $("#FormUserEdit").trigger("reset");
        $("#FormUserEdit").validate().resetForm();
        $('#FormUserEdit').find('.is-invalid').removeClass('is-invalid');

        let data = $tableUsersDT.row($(this).parents('tr')).data();
        $("#formIdUserEdit").val(data['id']);
        $("#formNamaDepanEdit").val(data['first_name']);
        $("#formNamaBelakangEdit").val(data['last_name']);
        $("#formEmailEdit").val(data['email']);
        $("#formNoTelpEdit").val(data['phone']);

        if (data['group_id'] === "4")
            $("input[name=formUserGroupEdit][value=4]").prop("checked", true);
        else
            $("input[name=formUserGroupEdit][value=5]").prop("checked", true);

        $("input[name=formIsActiveEdit][value=" + data['active'] + "]").prop('checked', true);
        $('#modal-formUserEdit').modal('toggle');
    });

    $("#tableUsers tbody").on('click', 'button.btn-delete', function() {
        let data = $tableUsersDT.row($(this).parents('tr')).data();
        let id = data['id'];

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
                        url: BASE_URL + "User/deleteUser",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableUsers").DataTable()
                                .ajax.reload();
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

    $("#btnAddUser").on('click', function() {
        $("#FormUser").trigger("reset");
        $("#FormUser").validate().resetForm();
        $('#FormUser').find('.is-invalid').removeClass('is-invalid');
        $("#formIdUser").val(0);
        $('#modal-formUser').modal('toggle');
    });

    $("#btnSaveUserEdit").on('click', function() {
        //$('#FormUser').valid();
        if (!$('#FormUserEdit').valid()) {
            return false;
        }

        let id = $("#formIdUserEdit").val();
        let first_name = $("#formNamaDepanEdit").val();
        let last_name = $("#formNamaBelakangEdit").val();
        let email = $("#formEmailEdit").val();
        let password = $("#formPasswordEdit").val();
        let password_confirmation = $("#formPasswordConfirmationEdit").val();
        let telepon = $("#formNoTelpEdit").val();
        let user_group = $("input[name='formUserGroupEdit']:checked").val();
        let is_active = $("input[name='formIsActiveEdit']:checked").val();

        let arr = {
            id: id,
            first_name: first_name,
            last_name: last_name,
            email: email,
            password: password,
            password_confirmation: password_confirmation,
            telepon: telepon,
            user_group: user_group,
            is_active: is_active
        }

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "User/saveUser",
            data: JSON.stringify(arr),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableUsers").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response);
        });

        $('#modal-formUserEdit').modal('toggle');
        return false;
    });

    $("#btnSaveUser").on('click', function() {
        //$('#FormUser').valid();
        if (!$('#FormUser').valid()) {
            return false;
        }


        let id = $("#formIdUser").val();
        let first_name = $("#formNamaDepan").val();
        let last_name = $("#formNamaBelakang").val();
        let email = $("#formEmail").val();
        let password = $("#formPassword").val();
        let password_confirmation = $("#formPasswordConfirmation").val();
        let telepon = $("#formNoTelp").val();
        let user_group = $("input[name='formUserGroup']:checked").val();
        let is_active = $("input[name='formIsActive']:checked").val();

        let arr = {
            id: id,
            first_name: first_name,
            last_name: last_name,
            email: email,
            password: password,
            password_confirmation: password_confirmation,
            telepon: telepon,
            user_group: user_group,
            is_active: is_active
        }

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "User/saveUser",
            data: JSON.stringify(arr),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableUsers").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formUser').modal('toggle');
        return false;
    });
}