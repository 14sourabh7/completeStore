<!-- Php file to display dashboard -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <?php
    include '../components/headDash.php'
    ?>
</head>

<body>
    <?php

    include '../components/dashboardHeader.php';
    include '../components/dashboard/sidebar.php';

    echo ' <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="admin"> ';

    include '../components/dashboard/users.php';
    include '../components/dashboard/products.php';
    include '../components/dashboard/orders.php';
    echo ' </main>     </div>';
    include '../components/dashboard/userProfile.php';
    include '../components/addNewModal.php';
    include '../components/footer.php';
    ?>
</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src='../scripts/userDashboard.js'></script>

</html>