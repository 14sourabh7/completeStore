<html>

<Head>
    <?php
    include '../components/htmlHead.php';
    ?>
    <title>Cart Page</title>
</head>

<body>
    <?php include '../components/navbar.php'; ?>

    <div class="container-fluid">
        <h1 class="text-center text-danger mt-5">Your Cart</h1>
        <div class="table-responsive mt-4 px-5">
            <table class="table table-striped table-sm" id='userTable'>
                <thead>
                    <tr>
                        <th scope="col">product_ID</th>
                        <th scope="col">product_name</th>
                        <th scope="col">price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">total</th>
                        <th scope='col'></th>
                    </tr>
                </thead>
                <tbody class='cartData'>

                </tbody>

            </table>

            <div class="row">
                <a class="btn btn-danger checkOut"> CHECK OUT</a>
            </div>
        </div>

        <?php include '../components/footer.php'; ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='../scripts/cart.js'></script>

</html>