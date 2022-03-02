<html>
<?php
include '../components/htmlHead.php';
?>

</head>

<body>
    <?php include '../components/navbar.php'; ?>

    <div class="container-fluid text-center mt-5">
        <h1 class="text-success">Your Order has been placed.</h1>
        <h2 class="my-3">Thank you for shopping with us.</h2>
        <h3>Track your order with order ID - <a href='#' class='order_id text-success'>######</a></h3>
        <a href="/" class="btn btn-danger">
            Continue Shopping
        </a>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='../scripts/cart.js'></script>

</html>