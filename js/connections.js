$(document).ready(function(){

  $("#registerForm").submit(function(e) {
    e.preventDefault();
    var data = $("#registerForm").serialize();
 
    /*if (firstName.indexOf(' ') >= 0) {
      firstName = name.split(' ').slice(0, -1).join(' ');
    }*/
    $.ajax({
      url: "../register2.php",
      type: "POST",
      data: data,

      beforeSend: function(){
        $('#register_submit').html("Registering");
       // $('#loader_reg').show();
      },

      success: function(message) {
        // Success message
        $('#register_submit').html(message);

      },
      error: function() {
        $('#register_submit').html("Error");
      },
    });
  });


  $("#loginForm").submit(function(e) {
    e.preventDefault();
    var data = $("#loginForm").serialize();
    $.ajax({
      url: "../login2.php",
      type: "POST",
      data: data,

      beforeSend: function(){
        $('#login_submit').html("Signing in");
       // $('#loader_reg').show();
      },

      success: function(message) {
        // Success message
        $('#login_submit').html(message);
        if( message == "Success"){
          console.log("Bichl");
          window.location.replace("/login_success.php");
        }
        
        
      },
      error: function() {
        $('#login_submit').html("Error");
      },
    });
  });
});
