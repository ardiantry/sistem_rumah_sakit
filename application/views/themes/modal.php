<?php
$id_linik_=$this->ion_auth->users()->row()->id_klinik;
$klinik_invew =&get_instance();
$klinik_invew->load->model('Klinik_model');
$tb_klinik = $klinik_invew->Klinik_model->generate_slug_klinik($id_linik_);
$link_klinik='https://appointment.simraisha.id/auth/login?k='.@$tb_klinik->slug;
?>
<div class="modal fade" id="modal-generate-link">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <label>Link Appointment Klinik <?php echo @$tb_klinik->nama_klinik;?></label>
            </div>
            <div class="modal-body table-responsive">
                <form>
                    <div class="form-group">
                        
                        <div class="input-group">
                            <input type="text" name="link" class="form-control" value="<?php echo $link_klinik;?>">
                            <span class="input-group-append"><button class="btn btn-primary" id="copy--generate-link">Copy</button></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
(function($) {
    'use strict'
   generate_link();
})(jQuery)

function generate_link()
{
    $('#generate_Link').click(function(e)
    {
        e.preventDefault();
        $('#modal-generate-link').modal('show');
    });
     $('#copy--generate-link').click(function(e)
    {
        e.preventDefault();
       $('input[name="link"]').select().val();
       document.execCommand("copy");
    });

}
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>