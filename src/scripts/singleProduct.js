$(document).ready(function () {
  var name, price;
  console.log(new URLSearchParams(window.location.search).get("id"));
  $.ajax({
    url: "/functions/operation.php",
    method: "post",
    data: {
      action: "getProduct",
      sku: new URLSearchParams(window.location.search).get("id"),
    },
    dataType: "JSON",
  }).done((data) => {
    console.log(data);
    name = data[0].name;
    price = data[0].price;
    $(".productName").html(data[0].name);
    $(".price").html(`$${data[0].price}`);
    $(".dprice").html(
      `$${data[0].price - (data[0].price * data[0].discount) / 100}`
    );
    $(".sku").html(data[0].sku_no);
    $(".type").html(data[0].type);
  });

  $(".add-to-cart").click(function () {
    $.ajax({
      url: "/functions/operation.php",
      method: "post",
      data: {
        action: "add",
        id: new URLSearchParams(window.location.search).get("id"),
        name: name,
        price: price,
      },
      dataType: "JSON",
    }).done((data) => {
      console.log("added to cart");
    });
  });
});
