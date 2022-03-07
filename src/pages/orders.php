<html>
<?php
include '../components/htmlHead.php';
?>

</head>

<body>
    <?php include '../components/navbar.php'; ?>

    <div class="container-fluid">
        <h1 class="text-center text-danger mt-5">Your Orders</h1>
        <div class="table-responsive mt-4 px-5">
            <table class="table table-striped table-sm" id='userTable'>
                <thead>
                    <tr>
                        <th scope="col">Order_ID</th>

                        <th scope="col">Total Amount</th>
                        <th scope="col">quantity</th>
                        <th scope="col">DATE / TIME</th>
                        <th scope='col'>Items</th>
                    </tr>
                </thead>
                <tbody class='orderData'>

                </tbody>

            </table>


        </div>

        <?php include '../components/footer.php'; ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='../scripts/orders.js'></script>

</html>