$(document).ready(function () {
  var role = sessionStorage.getItem("role");
  var login = sessionStorage.getItem("login");
  var name = sessionStorage.getItem("name");
  var email = sessionStorage.getItem("email");
  var status = sessionStorage.getItem("status");
  if (login == "1") {
    // if admin then this block will execute
    if (role == "admin") {
      $("#user").hide();
      getUsers();
    } else if (status == "restricted") {
      $("#admin").hide();
      var message =
        '<h1 class="text-danger mt-5">You are restricted to access data</h1>';
      $("#user").html(message);
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

  // event handler to update status
  $("body").on("change", "#status", function () {
    var status = $(this).val();
    var user_id = $(this).data("id");

    if (status && user_id) {
      $.ajax({
        url: "/functions/operation.php",
        method: "post",
        data: {
          action: "updateStatus",
          status: status,
          user_id: user_id,
        },
        dataType: "JSON",
      }).done((data) => {
        getUsers();
      });
    }
  });
});

// function to getUsers from db
function getUsers() {
  $.ajax({
    url: "/functions/operation.php",
    method: "post",
    data: { action: "getUsers" },
    dataType: "JSON",
  }).done((data) => {
    console.log(data);
    displayUsers(data);
  });
}

// function to display users
function displayUsers(data, limit = data.length) {
  var html = "";
  console.log(data);
  if (data) {
    for (let i = 0; i < limit; i++) {
      var color = data[i].status == "approved" ? "text-success" : "text-danger";
      var changeBtn = data[i].role == "admin" ? "disabled" : "";

      html += `
          <tr>
          <td id='user_id'>${data[i].user_id}</td>
          <td>${data[i].password}</td>
          <td>${data[i].name}</td>
          <td>${data[i].email}</td>
          <td>${data[i].role}</td>
          <td> <select name='status' class='btn ${color}' data-id='${data[i].user_id}' value='${data[i].status}' id='status' ${changeBtn}>
          <option  class='btn ${color}'  value='${data[i].status}'  name='status'>
         ${data[i].status}
          </option>
          <option name='status' class='text-success' value='approved'>approved</option>
            <option name='status' class='text-danger' value = 'restricted'>restricted</option>
          </select></td>
          </tr>
          `;
    }
  }

  $(".userData").html(html);
}
