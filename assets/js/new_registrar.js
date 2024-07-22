(function($) {
    'use strict'
   allaction();
})(jQuery)

function allaction()
{
    

    var $tableOwnerDT = $("#tableNewregistrar").DataTable({
                autoWidth: false,
                processing: true,
                serverSide: true,
                pageLength: 10,
                order: [
                    [1, "asc"]
                ],
                ajax: {
                    url: BASE_URL + 'ControlPanel/getNewRegistrarDatatable',
                    type: "POST"
                },
                "columns": [
                    { "data": "first_name" },
                    { "data": "kantor" },
                    { "data": "type_join" },
                    { "data": "alamat_kantor" },
                    { "data": "no_wa" },
                    { "data": "status" },
                    { "data": "created_at" },
                    { "data": null }
                ],
                columnDefs: [{
                        targets: [1, 2, 3, 4, 5],
                        orderable: true
                    },
                    {
                        targets: '_all',
                        orderable: false
                    },
                    {
                        targets: [-1],
                        data: null,
                        defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i> Detail</button>
                    <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i> Hapus</button>`,
                        className: "actions text-right"
                    },
                ],
            });
    $('body').delegate('.btn-delete','click',function(e)
    {
        e.preventDefault();
        if(!confirm('yakin akan mengapus data ini?'))
        {
            return false;
        }
        var $this_=$(this);
        $this_.html('loading...');
        $this_.attr('disabled','disabled'); 
        const id_member=$tableOwnerDT.row($this_.closest('tr')).data().id;
        const Form_item  = new FormData();
        Form_item.append('id_delete',id_member);  
        fetch(BASE_URL + 'ControlPanel/deletenewMember', { method: 'POST',body:Form_item}).then(res => res.json()).then(data => 
        {  
            $this_.html('<i class="fas fa-trash"></i> Hapus');
            $this_.removeAttr('disabled');
            $tableOwnerDT.ajax.reload();
        }); 

    });
    $('body').delegate('.btn-edit','click',function(e)
    {
        e.preventDefault();
        window.this_=$(this);
        $('#modal-new-member-detail').modal('show');
        // const id_member=$tableOwnerDT.row($this_.closest('tr')).data();
        // const Form_item  = new FormData();
        // Form_item.append('id_delete',id_member);  
        // fetch(BASE_URL + 'ControlPanel/deletenewMember', { method: 'POST',body:Form_item}).then(res => res.json()).then(data => 
        // {  
        //     $this_.html('<i class="fas fa-trash"></i> Hapus');
        //     $this_.removeAttr('disabled');
        //     $tableOwnerDT.ajax.reload();
        // }); 

    });

}