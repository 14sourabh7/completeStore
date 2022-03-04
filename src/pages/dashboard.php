<!-- Php file to display dashboard -->
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

    <?php
    include '../components/dashboardHeader.php';
    ?>

    <div class="container-fluid">
        <div class="row" id='admin'>
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <!--   <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Products
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Customers
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers"></span>
                                Integrations
                            </a>
                        </li> -->
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div id='users' class="my-5">
                    <div class="row">
                        <div class="col-8">
                            <h1>User Management</h1>
                        </div>
                        <!-- <div class="col-4 ">
                            <button class="btn border">share</button>
                            <button class="btn border">export</button>
                        </div> -->
                        <!-- <div class="col-8 mx-auto">
                            <input id='searchInput' class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
                    </div> -->
                        <div class="col-4">
                            <!-- <button class="btn btn-primary viewAll" data-list='users'>View All</button> -->
                            <a href='/pages/addNewUser.php' class="btn btn-success addNewUser">Add New</a>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped table-sm" id='userTable'>
                            <thead>
                                <tr>
                                    <th scope="col">user_ID</th>

                                    <th scope="col">password</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope='col'>role</th>
                                    <th scope='col'>Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class='userData'>

                            </tbody>
                        </table>
                    </div>
            </main>
        </div>


        <div id="user">
            <h1>Thanks for Visit.</h1>
            <div class="row">
                <div class="col-6">
                    Name-
                </div>
                <div class="col-6" id='name'>
                </div>
                <div class="row">
                    <div class="col-6">
                        Email-
                    </div>
                    <div class="col-6" id='email'>
                    </div>
                    <a href="/pages/editDetails.php" class="btn btn-warning">edit details</a>
                </div>
            </div>
        </div>
        <?php include '../components/footer.php'; ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='../scripts/userDashboard.js'></script>

</html>