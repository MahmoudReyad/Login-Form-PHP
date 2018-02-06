$(document).ready(function(){
    $('form input:first-of-type').on('blur' , function(){
      if($(this).val().length <4){
           $(this).parent().find('.custom-alert').fadeIn(200);

      }
    });
});
