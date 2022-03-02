var data = [{ name: "product", price: 1000, quantity: 1 }];

$(document).ready(function () {
  display(data);
});
function display(data) {
  var html = "";
  var grandTotal = 0;

  if (data)
    for (let i = 0; i < data.length; i++) {
      console.log("calligng display");
      var total = data[i].quantity * data[i].price;
      grandTotal += total;
      html += `
        <tr class='p-3'>
            <td>${data[i].name}</td>
            <td>${data[i].price}</td>
            <td>
            <a class='btn'><button class='btn fw-bold' data-id='${i}' data-op='decrease'>-</button></a>
            ${data[i].quantity}
              <a class='btn'><button class='btn fw-bold' data-id='${i}' data-op='increase'>+</button></a>
            </td>
            <td>$${total}</td>
            <td><a class="btn btn-light " data-id='${i}' data-op='delete'>delete</a></td>
                </tr>
      `;
    }

  html += `
       <tr>
       <td></td>
       <td></td>
       <td>Grand Total - </td>
       <td>$${grandTotal}</td>
        <td><a class='empty'>
        <button class='btn btn-success' data-op='empty'>EMPTY CART</button>
        </a></td></tr> 
    `;
  $(".cartData").html(html);
}
