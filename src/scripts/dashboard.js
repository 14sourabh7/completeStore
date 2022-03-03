$(document).ready(function () {
  var role = sessionStorage.getItem("role");
  var login = sessionStorage.getItem("login");
  if (login == "1") {
    if (role == "customer") {
      location.replace("/pages/userDashboard.php");
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

  getUsers();
  getProducts();
  getOrders();
  $(".viewAll").click(function () {
    console.log("clicked", $(this).data("list"));
    var fun = $(this).data("list");
    $.ajax({
      url: `/data/${$(this).data("list")}.php`,
      method: "post",
      data: { action: "getAll" },
      dataType: "JSON",
    }).done((data) => {
      console.log(data);
      fun == "users"
        ? displayUsers(data)
        : fun == "products"
        ? displayProducts(data)
        : displayOrders(data);
    });
  });

  //   // function to search element
  //   $("#users").on("keyup", "#searchInput", function () {
  //     var value = $(this).val().toLowerCase();
  //     console.log(value);

  //     $("#userTable").on("filter", "#userData> tr> #user_id ", function () {
  //       $(this)
  //         .parent()
  //         .toggle($(this).text().toLowerCase().indexOf(value) > -1);
  //     });
  //     // $().filter();
  //   });

  $("#users").on("click", ".editUser", function () {
    console.log($(this).data());
    $.ajax({
      url: "/data/users.php",
      method: "post",
      data: { id: $(this).data("idx"), action: "getUser" },
      dataType: "JSON",
    }).done((data) => {
      console.log(data);
      $("#userID").html(`user_id - ${data.user_id}`);
      $("#user_name").val(data.user_name);
      $("#name").val(data.name);
      $("#email").val(data.email);
      $("#pwd").val(data.password), $("#role").val(data.role);
      $("#modalButton").val({ id: $(this).data("idx"), list: "users" });
      $("#modalButton").html("Update");
    });
  });

  $(".addNewUser").click(function () {
    console.log("user");
    // $.ajax({
    //   url: "/data/users.php",
    //   method: "post",
    //   data: {
    //     user_name: $("#user_name").val(),
    //     email: $("#email").val(),
    //     password: $("pwd").val(),
    //     name: $("name").val(),
    //     role: $("#role").val(),
    //     action: "addUser",
    //   },
    //   dataType: "JSON",
    // }).done((data) => {
    //   console.log(data);
    //   displayUsers(data);
    // });
  });

  $("#modalButton").click(function () {
    console.log("clicked");
  });
  $(".addNewProduct").click(function () {
    console.log("product");
  });
});

function getUsers() {
  $.ajax({
    url: "/data/users.php",
    method: "post",
    data: { action: "getAll" },
    dataType: "JSON",
  }).done((data) => {
    displayUsers(data, 5);
  });
}

function getProducts() {
  $.ajax({
    url: "/data/products.php",
    method: "post",
    dataType: "JSON",
  }).done((data) => {
    displayProducts(data, 5);
  });
}
function getOrders() {
  $.ajax({
    url: "/data/orders.php",
    method: "post",
    dataType: "JSON",
  }).done((data) => {
    console.log("producrts - ", data);
    displayOrders(data, 5);
  });
}

function displayUsers(data, limit = data.length) {
  var html = "";

  if (data) {
    for (let i = 0; i < limit; i++) {
      html += `
          <tr>
          <td id='user_id'>${data[i].user_id}</td>
          <td>${data[i].user_name}</td>
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

function displayProducts(data, limit = data.length) {
  var html = "";

  if (data) {
    for (let i = 0; i < limit; i++) {
      html += `
          <tr>
          <td>${data[i].sku_no}</td>
          <td>${data[i].name}</td>
          <td>${data[i].brand}</td>
          <td>${data[i].type}</td>
          <td>${data[i].price}</td>
          <td>${data[i].discount}</td>
          <td>${data[i].price - (data[i].price * data[i].discount) / 100}</td>
          <td><button class='btn editProduct' data-idx='${i}'
           data-bs-toggle="modal" data-bs-target="#editModal"
          > <i class='fa fa-edit' ></i></button></td>
         <td><button class='btn delBtn' data-idx='${i}'>
         <i class='fa fa-trash' ></i>
         </button></td>
          </tr>
          `;
    }
  }
  $(".productData").html(html);
}

function displayOrders(data, limit = data.length) {
  var html = "";

  if (data) {
    for (let i = 0; i < limit; i++) {
      html += `
          <tr>
          <td>${data[i].order_id}</td>
          <td>${data[i].user_id}</td>
          <td>${data[i].user_email}</td>
          <td>${data[i].quantity}</td>
          <td>${data[i].total}</td>
          <td>${data[i].status}</td>
          <td><button class='btn btn-light border changeStatus' data-idx='${i}'> Change Status</button></td>
         
          </tr>
          `;
    }
  }
  $(".orderData").html(html);
}
