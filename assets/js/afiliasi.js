 $(function () {
    var $tableOwnerDT = $("#tableLayanan").DataTable({
                autoWidth: false,
                processing: true,
                serverSide: true,
                pageLength: 10,
                // order: [
                //     [1, "asc"]
                // ],
                ajax: {
                    url: BASE_URL + 'Afiliasi/getLayananDatatable',
                    type: "POST" 
                }, 
                "columns": [
                    { "data": "nama_layanan" },
                    { "data": null},
                    { "data": null }
                ],
                "columnDefs": [
                      {
                          targets: [1],
                          render: function (data, type, row, meta) {
                              if (type === 'display') {
                                const harga_=data.harga?data.harga:0;
                                  return `
                                  <input type="hidden" name="id[]"  value="${data.id}">
                                  <input type="text" style="width:150px;" name="harga[${data.id}]" class="form-control" value="${harga_}">`;
                              }
                              return data;
                          },
                      },
                      {
                          targets: [2],
                          render: function (data, type, row, meta) {
                              if (type === 'display') {
                                const status_=data.status=='aktif'?'checked="checked"':'';
                                  return `<input type="checkbox" name="status[${data.id}]" value="aktif" ${status_}>`;
                              }
                              return data;
                          },
                      }
                  ],
            });

$('body').delegate('#UpdateLayanan','submit',function(e)
{
            e.preventDefault();
            $('.form-control').removeClass('is-invalid');
            $('.error.invalid-feedback').remove();
            var $this_ =$(this);
            $this_.find('button[type="submit"]').html('Loading...');
            $this_.find('button[type="submit"]').attr('disabled','disabled'); 
            const data_form_= document.forms.namedItem('UpdateLayanan'); 
            saveJSON(data_form_).then(data => { 
                $this_.find('button[type="submit"]').html('Save changes');
                $this_.find('button[type="submit"]').removeAttr('disabled');
                $tableOwnerDT.ajax.reload();
                 
    });
    
});
$('body').delegate('#AturModal','click',function(e)
{
    e.preventDefault();
    $('#modal-atur-harga').modal('show');
    
});

async function saveJSON(form_) {
const   _item   = new FormData(form_);  
    const response = await fetch( BASE_URL + 'Afiliasi/updateLayanan',{method: 'POST',body:_item});
    const data = await response.json();
    return data;
}

$('body').delegate('#simpanhargadefault','submit',function(e)
{
            e.preventDefault();
            $('.form-control').removeClass('is-invalid');
            $('.error.invalid-feedback').remove();
            var $this_ =$(this);
            $this_.find('button[type="submit"]').html('Loading...');
            $this_.find('button[type="submit"]').attr('disabled','disabled'); 
            const data_form_= document.forms.namedItem('simpanhargadefault'); 
            simpanhargadefault(data_form_).then(data => { 
                $this_.find('button[type="submit"]').html('Save changes');
                $this_.find('button[type="submit"]').removeAttr('disabled');
                window.location.reload();
              //  $tableOwnerDT.ajax.reload();
                 
    });
    
});
async function simpanhargadefault(form_) {
const   _item   = new FormData(form_);  
    const response = await fetch( BASE_URL + 'Afiliasi/simpanhargadefault',{method: 'POST',body:_item});
   // const data = await response.json();
    return true;
}



   var $tableAfiliasiKomisi = $("#AfiliasiKomisi").DataTable({
                autoWidth: false,
                processing: true,
                serverSide: true,
                pageLength: 10,
                // order: [ 
                //     [1, "asc"]
                // ],
                ajax: {
                    url:  BASE_URL + 'Afiliasi/getkomisiafiliasiDatatable',
                    type: "POST",
                //     data: {
                //     tanggal_transaksi: $('#tanggal_transaksi').val()
                // },
                    dataSrc: function(data) {
                    $('#ttl_kmisi').html(data.ttl_kmisi);
                    $('#ttl_ditolak').html(data.ttl_ditolak);
                    $('#ttl_diproses').html(data.ttl_diproses);
                   //  console.log(data);
                     return data.data;
                    }
                },
                "columns": [
                    { "data": "nama_afiliator" },
                    { "data": "email_afiliator" },
                    { "data": "tanggal" },
                    { "data": "nama_layanan" },
                    { "data": "nama_pasien"},
                    { "data": "status_lbl" },
                    { "data": "harga_rp" },
                    { "data": null },
                    { "data": null },


                ],
                "columnDefs": [
                   {
                          targets: [7],
                          render: function (data, type, row, meta) {
                              if (type === 'display') {
                                 
                                  return `<a  data-id="${data.id}" class="UbahStatus btn btn-success btn-sm" href="#">Ubah Status</a>`;
                              }
                              return data;
                          },
                      },
                      {
                          targets: [8],
                          render: function (data, type, row, meta) {
                              if (type === 'display') {
                                 
                                  return `<a  data-id="${data.id}" href="`+BASE_URL+ `TransaksiLain?id=${data.id}" class="Detail btn btn-primary btn-sm" >Transaksi</a>`;
                              }
                              return data;
                          },
                      }
                  ], 
                drawCallback: function () {
                //console.log( 'Table redrawn '+new Date() );
                  if(window.range==undefined)
                  {window.range=true;
                    $('#AfiliasiKomisi_filter').append(` 
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="tanggal_transaksi" class="form-control float-right" id="tanggal_transaksi">
                            </div> `);
                       //Date range picker
                     

                  
                  }
                   $('#tanggal_transaksi').daterangepicker({
                      locale: {
                      format: 'DD/MM/YYYY'
                      },
                      autoUpdateInput: false
                      });

                      $('#tanggal_transaksi').on('apply.daterangepicker', function(ev, picker) 
                      {
                        console.log( picker.endDate.format('DD/MM/YYYY'));
                       // window.range=undefined;
                         $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
                        var filter_tanggal = picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD');
                        
      
                         if($('#tanggal_transaksi').val() != '') 
                         {
                           $tableAfiliasiKomisi.ajax.url(BASE_URL + 'Afiliasi/getkomisiafiliasiDatatable?tanggal_transaksi='+$('#tanggal_transaksi').val()).load(); 

                         }
                         else
                         {
                            $tableAfiliasiKomisi.ajax.url(BASE_URL + 'Afiliasi/getkomisiafiliasiDatatable').load(); 

                         }
                       
                      });

                }

                
            });

    

   $('body').delegate('.UbahStatus','click',function(e)
   {
        e.preventDefault();
        var $this_tr   =$(this).closest('tr'); 
        window.dt_tb  =$tableAfiliasiKomisi.row($this_tr).data();
        $('#modal-Ubah-komisi').modal(); 
    });

    $('#modal-Ubah-komisi').on('show.bs.modal', function (e) { 
        const dt_tb= window.dt_tb;
        $('#simpanstatuskomisi').find('input[name="komisi"]').val(dt_tb.harga); 
        $('#Namaafiliasi').html(dt_tb.nama_afiliator);
        $('#simpanstatuskomisi').find('select[name="status"]').val(dt_tb.status);
        $('#simpanstatuskomisi').find('select[name="status"]').trigger('change'); 
    });
    $('body').delegate('#simpanstatuskomisi','submit',function(e)
    {
          e.preventDefault();
          var $this             = $(this);   
          $this.find('button[type="submit"]').html('loading...');
          $this.find('button[type="submit"]').attr('disabled','disabled');

          var form_             = document.forms.namedItem("simpanstatuskomisi");
          const form_data    = new FormData(form_);  
          form_data.append('id_af_pas',  window.dt_tb.id);  
          fetch(BASE_URL +'/Afiliasi/simpanstatus' , { method: 'POST',body:form_data}).then(res => res.json()).then(data => 
          {
          $this.find('button[type="submit"]').html('Simpan');
          $this.find('button[type="submit"]').removeAttr('disabled');
          $('#modal-Ubah-komisi').modal('hide');
          $tableAfiliasiKomisi.ajax.reload();
        
      });
    });

});


   