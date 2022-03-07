var products = [];
$(document).ready(function () {
  // function for search bar
  $("#searchInput").on("keyup", function () {
    console.log($(this).val());
    var product;
    product = products.filter((x) =>
      x.name.toLowerCase().includes($(this).val().toLowerCase())
    );
    pagination(product);
  });

  // function for category filters
  $(".filter").click(function () {
    var val = $(this).html();
    $.ajax({
      url: "/functions/operation.php",
      method: "post",
      data: { action: "getFilterProducts", filter: val },
      dataType: "JSON",
    }).done((data) => {
      pagination(data);
    });
  });

  // function to sort elements
  $(".sort").click(function () {
    $(this).val() == "priceDown" &&
      products.sort(function (a, b) {
        return a.price - b.price;
      });

    $(this).val() == "priceUp" &&
      products.sort(function (a, b) {
        return b.price - a.price;
      });
    pagination(products);
  });
  $.ajax({
    url: "/functions/operation.php",
    method: "post",
    data: { action: "getProducts" },
    dataType: "JSON",
  }).done((data) => {
    products = data;
    pagination(data);
  });

  // function to add products to cart
  $("body").on("click", ".add-to-cart", function () {
    $.ajax({
      url: "/functions/operation.php",
      method: "post",
      data: {
        action: "add",
        id: $(this).data("id"),
        name: $(this).data("name"),
        price: $(this).data("price"),
      },
      dataType: "JSON",
    }).done((data) => {
      console.log("added to cart");
    });
  });

  if (sessionStorage.getItem("login") == 1) {
    $("#signinBtn").html("Sign Out");
  } else {
    $("#signinBtn").html("Sign In");
  }

  $("#signinBtn").click(function () {
    sessionStorage.clear();
    if (!sessionStorage.getItem("login")) {
      location.replace("/pages/authentication.php");
    }
  });
});
function pagination(array) {
  $("#pagination").pagination({
    dataSource: array,
    pageSize: 5,
    showGoInput: true,
    showGoButton: true,
    callback: function (data, pagination) {
      displayProducts(data);
    },
  });
}

// function to display products
function displayProducts(data) {
  var html = "";
  if (data)
    for (let i = 0; i < data.length; i++) {
      html += `
     <div class="col ?> m-3 ">
                    <div class="card" style="width:300px ; height:400px">
                       <a href='/pages/singleProductPage.php?id=${
                         data[i].sku_no
                       }' class='img__wrap'>
                        <img src="product.png" class="card-img-top w-100 viewProduct" alt="" />
                        <button class=' btn fs-3 text-white fw-bold w-100 img__description'>View Product</button>
                       </a>
                        <div class="card-body">
                            <h4 class="card-title text-center" id='productName'>${
                              data[i].name
                            }</h4>
                            <div class="row">
                                <div class="col">
                                    <p>&#9733;&#9733;&#9733;&#9733;&#9733;</p>
                                </div>
                                <div class="col text-end">4.8</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger px-2 add-to-cart" data-id='${
                                  data[i].sku_no
                                }'
                                  data-name='${data[i].name}'
                                  data-price='${data[i].price}'
                                }' >Add to Cart</button>
                                <h4 class="text-danger">$${
                                  data[i].price -
                                  data[i].price * (data[i].discount / 100)
                                }</h4>
                            </div>

                        </div>
                    </div>
                </div>

    `;
    }
  $("#productsDisplay").html(html);
}
