$(document).ready(function(){

  $("#registerForm").submit(function(e) {
    e.preventDefault();
    var name = $("input#name").val();
    var email = $("input#emailReg").val();
    var reg_no = $("input#reg_no").val();
    var phone = $("input#contact").val();
    var pass = $("input#passwordReg").val();
    var reg = $("input#registration").val();
    var conf_pass = $("input#conf_pass").val();
    var college_name = $("#cb_is_vit").prop("checked") ? null : $("#txt_external_college").val();
    var firstName = name; // For Success/Failure Message
    // Check for white space in name for Success/Fail message
    if (firstName.indexOf(' ') >= 0) {
      firstName = name.split(' ').slice(0, -1).join(' ');
    }
    $.ajax({
      url: "https://enigma2.herokuapp.com/auth/save",
      type: "POST",
      datatype: "json",
      contentType: "application/json; charset=utf-8",
      data: JSON.stringify({
        name: name,
        email: email,
        reg_no: reg_no,
        contact: phone,
        password: pass,
        registration_id: reg,
        college_id: college_name
      }),
      cache: false,

      beforeSend: function(){
        $('#signupButton').hide();
        $('#loader_reg').show();
      },

      success: function(message) {
        // Success message
        $("#loader_reg").hide();
        $('#success').html("<div class='alert alert-success'>");
        $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' onclick='btn_reapp()' aria-hidden='true'>&times;")
        .append("</button>");
        $('#success > .alert-success')
        .append("<strong style='font-size: 14px;'>" + message.message + "</strong>");
        $('#success > .alert-success')
        .append('</div>');
        $('#registerForm').trigger("reset");

        setTimeout(function(){
           document.getElementById("myModal").style.display = "none";
           $('#success').hide();
           $('#signupButton').show();
        },2000);

        $('.refresh_image').html('<img src="img/blank.png" width="25" height="25"/>');
        $('#registerForm').trigger("reset");

      },
      error: function() {
        $('#loader_reg').hide();
        $('#signupButton').show();

        // Fail message
        $('#success').html("<div class='alert alert-danger'>");
        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
        .append("</button>");
        $('#success > .alert-danger').append("<strong style='font-size: 14px;'>Oops! Something went wrong!</strong>");
        $('#success > .alert-danger').append('</div>');
        //clear all fields

      },
    });
  });
});
