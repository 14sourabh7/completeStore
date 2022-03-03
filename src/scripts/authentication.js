var re = /\S+@\S+\.\S+/;
$(document).ready(function () {
  var login = sessionStorage.getItem("login");
  if (login == "1") {
    location.replace("/pages/userDashboard.php");
  }
  $("#signin").click(function () {
    var email = $("#email").val();
    var password = $("#password").val();

    if (email && password) {
      if (!re.test(email)) {
        $("#errorPass").html("");
        var emailErr = "Invalid email format";
        $("#errorEmail").html(emailErr);
      } else {
        $("#errorEmail").html("");
        $("#errorPass").html("");
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
            sessionStorage.setItem("email", data[0].email);
            sessionStorage.setItem("name", data[0].name);
            sessionStorage.setItem("name", data[0].user_id);
            sessionStorage.setItem("role", data[0].role);
            sessionStorage.setItem("login", 1);
            location.replace("/pages/userDashboard.php");
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
