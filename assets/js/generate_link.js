(function($) {
    'use strict'
   generate_link();
})(jQuery)

function generate_link()
{
    $('body').delegate('#generate_Link','click',function(e)
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