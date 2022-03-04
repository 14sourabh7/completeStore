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
    include '../components/dashboard/sidebar.php';
    echo ' <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">';
    include '../components/dashboard/users.php';
    include '../components/dashboard/products.php';
    echo ' </main>    </div>';
    include '../components/addNewModal.php';
    include '../components/footer.php';
    ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='../scripts/userDashboard.js'></script>

</html>