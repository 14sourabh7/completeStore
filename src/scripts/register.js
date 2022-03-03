var re = /\S+@\S+\.\S+/;
$(document).ready(function () {
  $(".submit").click(function (e) {
    e.preventDefault();
    var name = $("#name").val();
    var email = $("#email").val();
    var password = $("#pwd").val();
    var cnfPassword = $("#cnfpwd").val();
    if (name && email && password && cnfPassword) {
      if (password == cnfPassword) {
        if (!re.test(email)) {
          console.log("invalid email");
          $("#errorMsg").html("");
          var emailErr = "Invalid email format";
          $("#emailError").html(emailErr);
        } else {
          $.ajax({
            url: "/functions/operation.php",
            method: "post",
            data: {
              action: "validateEmail",
              email: email,
              password: password,
            },
            dataType: "JSON",
          }).done((data) => {
            if (data.length > 0) {
              $("#emailError").html("*Email already exists");
            } else {
              $("#emailError").html("");
              console.log("adding");
              $.ajax({
                url: "/functions/operation.php",
                method: "post",
                data: {
                  action: "addUser",
                  email: email,
                  password: password,
                  name: name,
                },
                dataType: "JSON",
              }).done((data) => {
                console.log(data);
              });
            }
          });
        }
      } else {
        $("#errorMsg").html("Password mismatch");
      }
    } else {
      $("#errorMsg").html("Please fill all details");
    }
  });
});
