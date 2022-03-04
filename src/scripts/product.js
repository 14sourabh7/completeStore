$(document).ready(function () {
  //   display(data);
  console.log("producrts - ");
  $.ajax({
    url: "/functions/operation.php",
    method: "post",
    data: { action: "getProducts" },
    dataType: "JSON",
  }).done((data) => {
    displayProducts(data);
    console.log(data);
  });

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

function displayProducts(data) {
  var html = "";
  if (data)
    for (let i = 0; i < data.length; i++) {
      html += `
     <div class="col ?> m-3">
                    <div class="card" style="width:300px ; height:400px">
                        <img src="product.png" class="card-img-top w-100 " alt="" />
                        <div class="card-body">
                            <h4 class="card-title text-center">${data[i].name}</h4>
                            <div class="row">
                                <div class="col">
                                    <p>&#9733;&#9733;&#9733;&#9733;&#9733;</p>
                                </div>
                                <div class="col text-end">4.8</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger px-2 add-to-cart" data-id='${data[i].sku_no}'
                                  data-name='${data[i].name}'
                                  data-price='${data[i].price}'
                                }' >Add to Cart</button>
                                <h4 class="text-danger">$${data[i].price}</h4>
                            </div>

                        </div>
                    </div>
                </div>

    `;
    }
  $("#productsDisplay").html(html);
}
