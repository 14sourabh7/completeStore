<!DOCTYPE html>
<html lang="en">

<head>
    <title>Authentication</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    include '../components/navbar.php';
    ?>

    <main class="form-signin">
        <form style="width: 50%;" class="mx-auto mt-5">

            <h1 class="h3 mt-3 fw-normal text-center">Please sign in</h1>

            <div class="form-floating mt-3 w-75 mx-auto">
                <input type="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                <p id='errorEmail' class="text-danger"></p>
            </div>
            <div class="form-floating mt-5 w-75 mx-auto">
                <input type="password" class="form-control" id="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
                <p id='errorPass' class="text-danger"></p>
            </div>

            <br>
            <a href='#' class="w-100   btn btn-lg btn-danger" type="submit" id='signin'>Sign in</a>

            <a href="/pages/register.php" class="text-center">Not a user? Sign Up now</a>

        </form>



    </main>

    <?php
    include '../components/footer.php';
    ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='../scripts/authentication.js'></script>

</html>