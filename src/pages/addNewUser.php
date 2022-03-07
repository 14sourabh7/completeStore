<!-- php file to display signup form -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add New User</title>
    <?php
    include '../components/htmlHead.php';
    ?>
</head>

<body>
    <?php
    include '../components/navbar.php';
    ?>

    <main class="form-signin w-75 mx-auto mt-2">
        <h1 class="text-center text-danger">Add new User</h1>
        <form action="/action_page.php">
            <div class="row">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="row">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                <p id="emailError" class='text-danger'></p>
            </div>
            <div class="row">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <div class="row">
                <label for="cnfpwd" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="cnfpwd" placeholder="Enter password" name="pswd">
            </div>

            <p id='errorMsg' class="text-danger"></p>
            <button class="btn btn-danger p-2 w-25 mt-3 submit">Submit</button>
        </form>


    </main>

    <?php
    include '../components/footer.php';
    ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='../scripts/register.js'></script>

</html>