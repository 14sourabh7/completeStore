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
      getProducts();
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
    var column = $(this).data("col");

    if (status && user_id) {
      $.ajax({
        url: "/functions/operation.php",
        method: "post",
        data: {
          action: "updateStatus",
          status: status,
          user_id: user_id,
          column: column,
        },
        dataType: "JSON",
      }).done((data) => {
        getUsers();
      });
    }
  });

  // event handler to add new product
  $("#btnAddNew").click(function () {
    console.log("clicked");
    var name = $("#newName").val();
    var brand = $("#newBrand").val();
    var category = $("#newCateg").val();
    var price = $("#newPrice").val();
    var discount = $("#newDisc").val();
    console.log(name, brand, discount, category, price);

    if (name && brand && category && price && discount) {
      $.ajax({
        url: "/functions/operation.php",
        method: "post",
        data: {
          action: "addNewProduct",
          name: name,
          brand: brand,
          category: category,
          price: price,
          discount: discount,
        },
        dataType: "JSON",
      }).done((data) => {
        console.log(data);
        getProducts();
      });
    }
  });

  $("body").on("click", ".editProduct", function () {
    $(this).parent().parent().children().children().removeAttr("disabled");
    console.log();
    $(".editProduct").hide();
    $(".updateProduct").show();
  });
});
$("body").on("click", ".updateProduct", function () {
  var name = $(this)
    .parent()
    .parent()
    .children()
    .children("#productName")
    .val();
  var brand = $(this)
    .parent()
    .parent()
    .children()
    .children("#productBrand")
    .val();
  var type = $(this)
    .parent()
    .parent()
    .children()
    .children("#productType")
    .val();
  var price = $(this)
    .parent()
    .parent()
    .children()
    .children("#productPrice")
    .val();
  var discount = $(this)
    .parent()
    .parent()
    .children()
    .children("#productDiscount")
    .val();
  var product_id = $(this).data("id");
  console.log($(this).data("id"));
  if (name && brand && type && price && discount) {
    $.ajax({
      url: "/functions/operation.php",
      method: "post",
      data: {
        action: "updateProduct",
        name: name,
        brand: brand,
        category: type,
        price: price,
        discount: discount,
        product_id: product_id,
      },
      dataType: "JSON",
    }).done((data) => {
      console.log(data);
      getProducts();
    });
  }
});

$("body").on("click", ".deleteProduct", function () {
  var product_id = $(this).data("id");
  if (product_id) {
    $.ajax({
      url: "/functions/operation.php",
      method: "post",
      data: {
        action: "deleteProduct",
        product_id: product_id,
      },
      dataType: "JSON",
    }).done((data) => {
      getProducts();
    });
  }
});
$("body").on("click", "#delUser", function () {
  var user_id = $(this).data("id");
  console.log(user_id);
  if (user_id) {
    $.ajax({
      url: "/functions/operation.php",
      method: "post",
      data: {
        action: "deleteUser",
        user_id: user_id,
      },
      dataType: "JSON",
    }).done((data) => {
      getUsers();
    });
  }
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
      var userColor = data[i].role == "admin" ? "text-danger" : "text-success";
      var changeBtn =
        data[i].role == "admin" && data[i].user_id == "101" ? "disabled" : "";

      html += `
          <tr>
          <td id='user_id'>${data[i].user_id}</td>
          <td>${data[i].password}</td>
          <td>${data[i].name}</td>
          <td>${data[i].email}</td>
          <td><select name='role' class='btn ${userColor}' data-id='${data[i].user_id}' data-col='role' value='${data[i].role}' id='status' ${changeBtn}>
          <option  class='btn ${userColor}'  value='${data[i].role}'  name='role'>
         ${data[i].role}
          </option>
          <option name='role' class='text-success' value='customer'>customer</option>
            <option name='role' class='text-danger' value = 'admin'>admin</option>
          </select></td>
          <td> <select name='status' class='btn ${color}' data-id='${data[i].user_id}' data-col='status' value='${data[i].status}' id='status' ${changeBtn}>
          <option  class='btn ${color}'  value='${data[i].status}'  name='status'>
         ${data[i].status}
          </option>
          <option name='status' class='text-success' value='approved'>approved</option>
            <option name='status' class='text-danger' value = 'restricted'>restricted</option>
          </select></td>
          <td><a href='#' data-id='${data[i].user_id}' id='delUser'>Delete </a> </td>
          </tr>
          
          `;
    }
  }

  $(".userData").html(html);
}

// function to getProducts from db
function getProducts() {
  $.ajax({
    url: "/functions/operation.php",
    method: "post",
    data: { action: "getProducts" },
    dataType: "JSON",
  }).done((data) => {
    console.log(data);
    displayProducts(data);
  });
}

// function to display products
function displayProducts(data, limit = data.length) {
  var html = "";
  console.log(data);
  if (data) {
    for (let i = 0; i < limit; i++) {
      var color = data[i].status == "approved" ? "text-success" : "text-danger";
      var changeBtn = data[i].role == "admin" ? "disabled" : "";

      html += `
          <tr>
          <td id='user_id'>${data[i].sku_no}</td>
          <td><input type='text' class='w-100 border-0' value=${data[i].name} id='productName' disabled/></td>
          <td>
          <input type='text' class='w-100 border-0' value=${data[i].brand} id='productBrand' disabled/>
          </td>
          <td>
          <input type='text' class='w-100 border-0' value=${data[i].type} id='productType' disabled/>
          </td>
          <td>
          <input type='text' class='w-100 border-0' value=${data[i].price} id='productPrice' disabled/></td>
         <td>
         <input type='text' class='w-100 border-0' value=${data[i].discount} id='productDiscount' disabled/></td>
         <td><button class='btn editProduct'>edit</button>
         <a href='#' class='btn updateProduct' data-id='${data[i].sku_no}' style='display:none;' >update</a>
         </td>
         <td><button class='btn deleteProduct' data-id='${data[i].sku_no}'>delete</button></td>
          </tr>
          `;
    }
  }
  //  <td> <select name='status' class='btn ${color}' data-id='${data[i].user_id}' value='${data[i].status}' id='status' ${changeBtn}>
  //           <option  class='btn ${color}'  value='${data[i].status}'  name='status'>
  //          ${data[i].status}
  //           </option>
  //           <option name='status' class='text-success' value='approved'>approved</option>
  //             <option name='status' class='text-danger' value = 'restricted'>restricted</option>
  //           </select></td>
  $(".productData").html(html);
}
