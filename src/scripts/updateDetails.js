var re = /\S+@\S+\.\S+/;
$(document).ready(function () {
  // variables
  var name = sessionStorage.getItem("name");
  $("#name").val(name);
  var email = sessionStorage.getItem("email");
  $("#email").val(email);
  $(".submit").click(function (e) {
    e.preventDefault();

    // var password = $("#pwd").val();
    // var cnfPassword = $("#cnfpwd").val();
    var user_id = sessionStorage.getItem("user_id");

    // input checker
    if (name && email) {
      if (!re.test(email)) {
        console.log("invalid email");
        $("#errorMsg").html("");
        var emailErr = "Invalid email format";
        $("#emailError").html(emailErr);
      } else {
        // code to check email already exists
        $.ajax({
          url: "/functions/operation.php",
          method: "post",
          data: {
            action: "validateEmail",
            email: email,
          },
          dataType: "JSON",
        }).done((data) => {
          if (data.length > 1) {
            $("#emailError").html("*Email already exists");
          } else {
            $("#emailError").html("");
            console.log("adding");

            // ajax call to add user
            $.ajax({
              url: "/functions/operation.php",
              method: "post",
              data: {
                action: "updateUserDetails",
                email: email,
                name: name,
                user_id: user_id,
              },
              dataType: "JSON",
            }).done((data) => {
              var name = sessionStorage.setItem("name", $("#name").val());
              var email = sessionStorage.setItem("email", $("#email").val());
              location.replace("/pages/authentication.php");
            });
          }
        });
      }
    } else {
      $("#errorMsg").html("Please fill all details");
    }
  });
});
