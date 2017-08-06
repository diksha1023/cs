$(document).ready(function(){

  alert("Chick");

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
        $('#register_submit').html("Signing in");
       // $('#loader_reg').show();
      },

      success: function(message) {
        // Success message
        $('#register_submit').html(message);
        alert(message);
      },
      error: function() {
        $('#register_submit').html("Error");
      },
    });
  });
});
