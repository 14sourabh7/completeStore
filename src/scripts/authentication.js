var re = /\S+@\S+\.\S+/;
$(document).ready(function () {
  var login = sessionStorage.getItem("login");
  var role = sessionStorage.getItem("role");
  // login check
  if (login == "1") {
    location.replace("/pages/dashboard.php");
  }

  // function to handle signin button
  $("#signin").click(function () {
    var email = $("#email").val();
    var password = $("#password").val();

    if (email && password) {
      // email vaildator
      if (!re.test(email)) {
        $("#errorPass").html("");
        var emailErr = "Invalid email format";
        $("#errorEmail").html(emailErr);
      } else {
        $("#errorEmail").html("");
        $("#errorPass").html("");

        // ajax call to validate User
        $.ajax({
          url: "/functions/operation.php",
          method: "post",
          data: {
            action: "validateUser",
            email: email,
            password: password,
          },
          dataType: "JSON",
        }).done((data) => {
          if (data.length > 0) {
            console.log(data);
            sessionStorage.setItem("email", data[0].email);
            sessionStorage.setItem("name", data[0].name);
            sessionStorage.setItem("user_id", data[0].user_id);
            sessionStorage.setItem("role", data[0].role);
            sessionStorage.setItem("login", 1);
            sessionStorage.setItem("status", data[0].status);
            console.log(data[0].name, data[0].email, data[0].role);
            location.replace("/pages/dashboard.php");
          } else {
            $("#errorPass").html("*Invalid Credentials");
          }
        });
      }
    } else {
      if (!email) {
        $("#errorEmail").html("*Enter email");
      }
      if (!password) {
        $("#errorPass").html("*Enter password");
      }
    }
  });
});
