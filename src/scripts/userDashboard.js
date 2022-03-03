$(document).ready(function () {
  var role = sessionStorage.getItem("role");
  var login = sessionStorage.getItem("login");
  if (login == "1") {
    if (role == "admin") {
      location.replace("/pages/adminDashboard.php");
    } else {
      var name = sessionStorage.getItem("name");
      $("#user").html(`Hello ${name}`);
      $("#signout").html("Sign Out");
    }
  } else {
    location.replace("/pages/authentication.php");
  }

  $("#signout").click(function () {
    sessionStorage.clear();
    if (!sessionStorage.getItem("login")) {
      location.replace("/pages/authentication.php");
    }
  });
});
