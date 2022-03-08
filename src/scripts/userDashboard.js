var re = /\S+@\S+\.\S+/;
var users = [];
var products = [];
var orders = [];
$(document).ready(function () {
  // variables
  var role = sessionStorage.getItem("role");
  var login = sessionStorage.getItem("login");
  var name = sessionStorage.getItem("name");
  var email = sessionStorage.getItem("email");
  var status = sessionStorage.getItem("status");
  var user_id = sessionStorage.getItem("user_id");

  // login check
  if (login == "1") {
    // if admin then this block will execute
    if (role == "admin") {
      $("#userProfile").hide();
      getUsers();
      getProducts();
      getOrders();
    } else if (status == "restricted") {
      console.log(status);
      $("#admin").hide();
      $("#userProfile").show();
      var message =
        '<h1 class="text-danger mt-5">You are restricted to access data</h1>';
      $("#userProfile").html(message);
    } else {
      userProfile();
    }
  } else {
    location.replace("/pages/authentication.php");
  }

  // event listener to log out user
  $("#signout").click(function () {
    sessionStorage.clear();
    if (!sessionStorage.getItem("login")) {
      location.replace("/pages/authentication.php");
    }
  });

  $(".management").click(function () {
    if ($(this).data("id") == "users") {
      $("#users").show();
      $("#products").hide();
      $("#orders").hide();
    } else if ($(this).data("id") == "products") {
      $("#users").hide();
      $("#products").show();
      $("#orders").hide();
    } else if ($(this).data("id") == "orders") {
      $("#users").hide();
      $("#products").hide();
      $("#orders").show();
    } else {
      $("#users").show();
      $("#products").show();
      $("#orders").show();
    }
  });

  ///////////////// User table    /////////////////////////////////////////////////

  // event listener to delete user
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

  // event handler to update user status
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

  // function to getUsers from db
  function getUsers() {
    $.ajax({
      url: "/functions/operation.php",
      method: "post",
      data: { action: "getUsers" },
      dataType: "JSON",
    }).done((data) => {
      users = data;
      paginationUser(data);
    });
  }

  // function to display users
  function displayUsers(data, limit = data.length) {
    var html = "";

    if (data) {
      for (let i = 0; i < limit; i++) {
        var color =
          data[i].status == "approved" ? "text-success" : "text-danger";
        var userColor =
          data[i].role == "admin" ? "text-danger" : "text-success";

        var changeBtn =
          data[i].role == "admin" && data[i].user_id == "9921"
            ? "disabled"
            : "";

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

  $("#searchUsers").on("keyup", function () {
    console.log($(this).val());
    var user, email;
    user = users.filter((x) =>
      x.user_id.toLowerCase().includes($(this).val().toLowerCase())
    );
    email = users.filter((x) =>
      x.email.toLowerCase().includes($(this).val().toLowerCase())
    );
    if (user.length > 0) {
      paginationUser(user);
    } else if (email.length > 0) {
      paginationUser(email);
    }
  });
  //////////////// Product table /////////////////////////////////////////////////

  // event handler to add new product
  $("#btnAddNew").click(function () {
    console.log("clicked");
    var name = $("#newName").val();
    var brand = $("#newBrand").val();
    var category = $("#newCateg").val();
    var price = $("#newPrice").val();
    var discount = $("#newDisc").val();
    var desc = $("#desc").val();
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
          description: desc,
        },
        dataType: "JSON",
      }).done((data) => {
        console.log(data);
        getProducts();
      });
    }
  });

  // function to edit product
  $("body").on("click", ".editProduct", function () {
    $(this).parent().parent().children().children().removeAttr("disabled");
    console.log();
    $(".editProduct").hide();
    $(".updateProduct").show();
  });

  // event  listener to delete product
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

  // event listener to update product
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
    console.log(type);
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

  // function to getProducts from db
  function getProducts() {
    $.ajax({
      url: "/functions/operation.php",
      method: "post",
      data: { action: "getProducts" },
      dataType: "JSON",
    }).done((data) => {
      products = data;
      paginationProduct(data);
    });
  }

  /**function to display products */
  function displayProducts(data, limit = data.length) {
    var html = "";

    if (data) {
      for (let i = 0; i < limit; i++) {
        html += `
          <tr>
          <td id='user_id'>${data[i].sku_no}</td>
          <td><input type='text' class='w-100 border-0' value=${data[i].name} id='productName' disabled/></td>
          <td>
          <input type='text' class='w-100 border-0' value=${data[i].brand} id='productBrand' disabled/>
          </td>
          <td>
          <select class="form-control w-100 border-0 btn" id='productType' name="editcategory" disabled>
          <option value=${data[i].type} name='editcategory'>${data[i].type} </option>
                             <option value="faishion" name='editcategory'>faishion</option>
                             <option value="electronics" name='editcategory'>electronics</option>
                             <option value="appliances" name='editcategory'>appliances</option>
                             <option value="furniture" name='editcategory'>furniture</option>
                         </select>
          
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
    $(".productData").html(html);
  }
  $("#searchProducts").on("keyup", function () {
    console.log($(this).val());
    var product, name;
    product = products.filter((x) =>
      x.sku_no.toLowerCase().includes($(this).val().toLowerCase())
    );
    name = products.filter((x) =>
      x.name.toLowerCase().includes($(this).val().toLowerCase())
    );
    if (product.length > 0) {
      paginationProduct(product);
    } else if (name.length > 0) {
      paginationProduct(name);
    }
  });

  //////////////// Order Management  ///////////////////////////////////////////////////////////

  //function to handle order status update
  $("body").on("change", ".orderStatus", function () {
    $.ajax({
      url: "/functions/operation.php",
      method: "post",
      data: {
        action: "updateOrderStatus",
        order_id: $(this).data("id"),
        status: $(this).val(),
      },
      dataType: "JSON",
    }).done((data) => {
      getOrders();
    });
  });
  function paginationUser(array) {
    $(".userPages").pagination({
      dataSource: array,
      pageSize: 5,
      showGoInput: true,
      showGoButton: true,
      callback: function (data, pagination) {
        displayUsers(data);
      },
    });
  }
  function paginationProduct(array) {
    $(".productPages").pagination({
      dataSource: array,
      pageSize: 5,
      showGoInput: true,
      showGoButton: true,
      callback: function (data, pagination) {
        displayProducts(data);
      },
    });
  }
  function paginationOrder(array) {
    $(".orderPages").pagination({
      dataSource: array,
      pageSize: 5,
      showGoInput: true,
      showGoButton: true,
      callback: function (data, pagination) {
        displayOrders(data);
      },
    });
  }
  $("body").on("click", ".viewItem", function () {
    console.log($(this).parent().parent().siblings().children(".items"));
    $(this).siblings(".items").toggle();
  });

  // function to get Orders from db
  function getOrders() {
    $.ajax({
      url: "/functions/operation.php",
      method: "post",
      data: { action: "getAllOrders" },
      dataType: "JSON",
    }).done((data) => {
      orders = data;
      paginationOrder(data);
    });
  }

  /**function to display Ordes */
  function displayOrders(data, limit = data.length) {
    var html = "";
    console.log(data);
    if (data) {
      for (let i = 0; i < limit; i++) {
        var itemList = "<ol class='items' style='display:none;'>";
        var items = JSON.parse(data[i].cart);
        for (let j = 0; j < items.length; j++) {
          itemList += `
        <li>${items[j].id} -  ${items[j].name} - ${items[j].price}</li>
        `;
        }
        var color =
          data[i].status == "delivered" ? "btn-success" : "btn-danger";
        data[i].status == "order dispatched" && (color = "btn-primary");
        html += `
          <tr>
          <td id='order_id'>${data[i].order_id}</td>
          <td>${data[i].user_id} </td>
          <td>
         ${data[i].quantity} 
          </td>
          <td>
         ${data[i].amount}
          </td>
          <td>
          ${data[i].date}</td>
         <td>
        <td>
        <select class='btn orderStatus ${color}' name='order_status' data-id='${data[i].order_id}' >
        <option class='${color}' name='order_status' value='${data[i].status}'>${data[i].status}</option>
        <option class='btn-danger' name='order_status' value='order placed'>order placed</option>
        <option class='btn-primary' name='order_status' value='order dispatched'>dispatched</option>
        <option class='btn-success' name='order_status' value='delivered'>delivered</option>
        <select>
        </td>
       
         <td> <span class='text-danger viewItem' style='cursor:pointer'>
        View
        </span>
         ${itemList}</ol>
       </td>
          </tr>
          
          
          `;
      }
    }
    $(".orderData").html(html);
  }

  ///////////////  user Profile /////////////////////////////////////////////////

  // function for customer profile
  function userProfile() {
    $("#admin").hide();
    $("#userProfile").show();
    $("#profileName").val(name);
    $(".profileName").html(name);
    $(".profileEmail").html(email);
    $("#profileEmail").val(email);
    $("#signout").html("Sign Out");
    $.ajax({
      url: "/functions/operation.php",
      method: "post",
      data: {
        action: "getUserDetails",
        user_id: user_id,
      },
      dataType: "JSON",
    }).done((userData) => {
      $(".profileMobile").val(userData[0].mobile);
      $(".profileAddress").val(userData[0].address);
      $(".profilePin").val(userData[0].pin);
    });
  }

  // function to save profile
  $(".profileSave").click(function () {
    console.log("clicked");

    var profileName = $("#profileName").val();
    var profileEmail = $("#profileEmail").val();
    var profileMobile = $(".profileMobile").val();
    var profileAddress = $(".profileAddress").val();
    var profilePin = $(".profilePin").val();
    if (
      profileName &&
      profileEmail &&
      profileMobile &&
      profileAddress &&
      profilePin
    ) {
      if (
        !isNaN(profileMobile) &&
        !isNaN(profilePin) &&
        !re.test(profileEmail) &&
        profileMobile.length != 10 &&
        profilePin.length != 6
      ) {
        if (!isNaN(profileMobile) && profileMobile.length != 10)
          $("#profileError").html("please provide valid mobile number");
        if (!isNaN(profilePin) && profilePin.length != 6)
          $("#profileError").html("please provide valid pin code of 6 digits");
        !re.test(profileEmail) &&
          $("#profileError").html("please provide valid email");
      } else {
        $("#profileError").html("");
        $.ajax({
          url: "/functions/operation.php",
          method: "post",
          data: {
            action: "updateUserDetail",
            name: profileName,
            email: profileEmail,
            address: profileAddress,
            mobile: profileMobile,
            pin: profilePin,
            user_id: user_id,
          },
          dataType: "JSON",
        }).done((data) => {
          userProfile();
        });
      }
    } else {
      $("#profileError").html("*Please provide all details");
    }
  });
  $("#searchOrders").on("keyup", function () {
    console.log($(this).val());
    var product, name;
    order = orders.filter((x) =>
      x.order_id.toLowerCase().includes($(this).val().toLowerCase())
    );
    user = orders.filter((x) =>
      x.user_id.toLowerCase().includes($(this).val().toLowerCase())
    );
    if (order.length > 0) {
      paginationOrder(order);
    } else if (user.length > 0) {
      paginationOrder(user);
    }
  });
  //
});
