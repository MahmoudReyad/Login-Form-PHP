$(document).ready(function(){
  var user_error = true;
  var email_error =true;
  var phone_error = true;
  var message_error = true;

  var Check = function(){
    if(user_error || email_error || phone_error || message_error){
      return 1;
    }
    else {
      return 0;
    }
  }
    $('input[type="name"] , input[type="email"] , input[type="tel"]').on('blur' , function(){
      if($(this).val().length == 0){
           $(this).parent().find('.custom-alert').empty().append("<p>Can't be Empty</p>").fadeIn(200);
           $(this).css("border" , "1px solid #e20f0f");
      }
      else {
        $(this).parent().find('.custom-alert').fadeOut(200);

      }
    });

    $('input[type="name"]').on('blur' , function(){
      if($(this).val().length <= 3){
           $(this).parent().find('.custom-alert').empty().append("<p>Should be more than 3 Characters</p>").fadeIn(200);
           $(this).css("border" , "1px solid #e20f0f");
           user_error = true;
      }
      else {
        $(this).parent().find('.custom-alert').fadeOut(200);
        $(this).css("border" , "1px solid #63e30b");
        user_error = false;
      }
      Check();
    });
    $('input[type="email"]').on('blur' , function(){
      if($(this).val().length <= 7){
           $(this).parent().find('.custom-alert').empty().append("<p>Should be more than 7 Characters and contain sympol @</p>").fadeIn(200);
           $(this).css("border" , "1px solid #e20f0f");
           email_error = true;
      }
      else {
        $(this).parent().find('.custom-alert').fadeOut(200);
        $(this).css("border" , "1px solid #63e30b");
        email_error = false;
      }
      Check();
    });
    $('input[type="tel"]').on('blur' , function(){
      if($(this).val().length < 11 || $(this).val().length > 11){
           $(this).parent().find('.custom-alert').empty().append("<p>Should Contain 11 Numbers only</p>").fadeIn(200);
           $(this).css("border" , "1px solid #e20f0f");
           $(this).removeClass('True');
           phone_error = true;

      }
      else {
        $(this).parent().find('.custom-alert').fadeOut(200);
        $(this).css("border" , "1px solid #63e30b");
        phone_error = false;
      }
      Check();
    });
    $('form textarea').on('blur' , function(){
      if($(this).val().length < 20){
           $(this).parent().find('.custom-alert').empty().append("<p>Should Contain at least 20 Characters</p>").fadeIn(200);
           $(this).css("border" , "1px solid #e20f0f");
           $(this).removeClass('True');
           message_error = true;
      }
      else {
        $(this).parent().find('.custom-alert').fadeOut(200);
        $(this).css("border" , "1px solid #63e30b");
        message_error = false;
      }
      Check();
    });
    $('.my_form').on('submit' , function(e){
      var check = Check();
      if(check === 0){
        return true;

      }
      else {
        e.preventDefault();
      }
    });
});
