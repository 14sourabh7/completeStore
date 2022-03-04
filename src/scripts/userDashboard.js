$(document).ready(function () {
  var role = sessionStorage.getItem("role");
  var login = sessionStorage.getItem("login");
  var name = sessionStorage.getItem("name");
  var email = sessionStorage.getItem("email");

  if (login == "1") {
    if (role == "admin") {
      $("#user").hide();
      getUsers();
    } else {
      var name = sessionStorage.getItem("name");
      $("#admin").hide();
      $("#name").html(name);
      $("#email").html(email);
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

function getUsers() {
  $.ajax({
    url: "/functions/operation.php",
    method: "post",
    data: { action: "getUsers" },
    dataType: "JSON",
  }).done((data) => {
    console.log(data);
    displayUsers(data, 5);
  });
}

function displayUsers(data, limit = data.length) {
  var html = "";

  if (data) {
    for (let i = 0; i < limit; i++) {
      html += `
          <tr>
          <td id='user_id'>${data[i].user_id}</td>
          <td>${data[i].password}</td>
          <td>${data[i].name}</td>
          <td>${data[i].email}</td>
          <td>${data[i].role}</td>
          <td><button class='btn editUser' data-idx='${i}'
         data-bs-toggle="modal" data-bs-target="#editModal"
          > <i class='fa fa-edit' ></i></button></td>
         <td><button class='btn delBtn' data-idx='${i}'>
         <i class='fa fa-trash' ></i>
         </button></td>
          </tr>
          `;
    }
  }

  $(".userData").html(html);
}
