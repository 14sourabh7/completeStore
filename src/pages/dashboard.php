<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a href="/" class="text-danger navbar-brand ms-5 px-5">
            <i class="fa-solid fa-shop"></i>
            <span class="text-primary ms-2 fw-bold fs-3">The</span><span class="text-primary fw-normal fs-3">Shoppers</span>
        </a>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h2 class="text-white py-2">
            Admin Dashboard
        </h2>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row sticky-top p-3 text-center bg-white">
            <div class="col">
                <a class="btn btn-primary" href="#user">User Management</a>
            </div>
            <div class="col">
                <a class="btn btn-danger" href="#product">Product Management</a>
            </div>
            <div class="col">
                <a class="btn btn-success" href="#order">Order Management</a>
            </div>
        </div>
        <div class="row">
            <main class="col px-5">
                <section id=user>
                    <div id='users' class="my-5">
                        <div class="row">
                            <div class="col-8">
                                <h1>User Management</h1>
                            </div>
                            <div class="col-4 ">
                                <button class="btn border">share</button>
                                <button class="btn border">export</button>
                            </div>
                            <div class="col-8 mx-auto">
                                <input id='searchInput' class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary viewAll" data-list='users'>View All</button>
                                <button class="btn btn-success addNewUser" data-list='users' data-bs-toggle="modal" data-bs-target="#addNewModal">Add New</button>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table table-striped table-sm" id='userTable'>
                                <thead>
                                    <tr>
                                        <th scope="col">user_ID</th>
                                        <th scope="col">user_name</th>
                                        <th scope="col">password</th>
                                        <th scope="col">name</th>
                                        <th scope="col">email</th>
                                        <th scope='col'>role</th>
                                        <th scope='col'></th>
                                        <th scope='col'></th>
                                    </tr>
                                </thead>
                                <tbody class='userData'>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <hr>
                <section id=product>
                    <div id='products' class="my-5">
                        <div class="row">
                            <div class="col-8">
                                <h1>Product Management</h1>
                            </div>
                            <div class="col-4 ">
                                <button class="btn border">share</button>
                                <button class="btn border">export</button>
                            </div>
                            <div class="col-8 mx-auto">
                                <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary viewAll" data-list='products'>View All</button>
                                <button class="btn btn-success addNewProduct" data-list='products' data-bs-toggle="modal" data-bs-target="#addNewModal">Add New</button>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">SKU No.</th>
                                        <th scope="col">name</th>
                                        <th scope="col">brand</th>
                                        <th scope="col">type</th>
                                        <th scope="col">price</th>
                                        <th scope='col'>discount</th>
                                        <th scope='col'>sell price</th>
                                        <th scope='col'></th>
                                        <th scope='col'></th>
                                    </tr>
                                </thead>
                                <tbody class='productData'>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <hr>

                <section id=order>
                    <div id='orders' class="my-5">
                        <div class="row">
                            <div class="col-8">
                                <h1>Order Management</h1>
                            </div>
                            <div class="col-4 ">
                                <button class="btn border">share</button>
                                <button class="btn border">export</button>
                            </div>
                            <div class="col-8 mx-auto">
                                <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary viewAll" data-list='orders'>View All</button>
                                <!-- <button class="btn btn-success" data-list='products'>Add New</button> -->
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">order_id</th>
                                        <th scope="col">user_id</th>
                                        <th scope="col">user_email</th>
                                        <th scope="col">quantity</th>
                                        <th scope="col">total</th>
                                        <th scope='col'>Status</th>
                                        <th scope='col'></th>
                                    </tr>
                                </thead>
                                <tbody class='orderData'>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>


                <?php
                include '../components/editModal.php';
                include '../components/addNewModal.php';
                ?>
            </main>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='../scripts/dashboard.js'></script>

</html>