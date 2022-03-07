<html>
<?php
include '../components/htmlHead.php';
?>

</head>

<body>
    <?php include '../components/navbar.php'; ?>

    <div class="container-fluid text-center mt-5">
        <div class="row">
            <div class="col-8">
                <h3>Your Products</h3>
                <table class="table table-striped table-sm" id='userTable'>
                    <thead>
                        <tr>
                            <th scope="col">product_ID</th>
                            <th scope="col">product_name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">total</th>
                        </tr>
                    </thead>
                    <tbody class='cartData'>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <h3 class="mt-5">Shipping Details</h3>
                <label for="mobile ">
                    Name
                    <input type='text' class="name m-2" />
                </label>
                <label for="mobile">
                    Mobile

                    <input type='number' class="mobile m-2" />
                </label>
                <label for="email">
                    email

                    <input type email class="email m-2" disabled>
                </label>

                <label for="address">
                    Shipping Address

                    <input type='text' class="address m-2">
                </label>
                <label for="pin">
                    Pincode
                    <input type='number' class="pin m-2">
                </label>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h2>Payment Details</h2>
                <label for="cardNo">
                    Card No <input type="text" class="m-2 cardNo" placeholder="enter your card no">
                </label>
                <label for="cardName">
                    Name <input type="text" class="m-2 cardName" placeholder="Name as on card">
                </label>
                <label for="cvv">
                    Security Code <input type="text" class="m-2 cvv" placeholder="Enter your secret code">
                </label>
                <label for="expiry">
                    Expiry Date <input type="text" class="m-2 expDate" placeholder="Enter date of expiry">
                </label>
                <br>
                <input type="button" class="btn btn-danger pay w-50" value='Place Order'>
            </div>

        </div>

    </div>


    <?php include '../components/footer.php'; ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='../scripts/checkout.js'></script>

</html>