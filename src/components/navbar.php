<nav class="navbar sticky-top navbar-expand-sm bg-white shadow-sm">

    <div class="container-fluid pt-3 pb-2 d-flex align-items-center">
        <a href="/" class="text-danger navbar-brand ms-5 px-5">
            <i class="fa-solid fa-shop"></i>
            <span class="text-primary ms-2 fw-bold fs-3">The</span><span class="text-primary fw-normal fs-3">Shoppers</span>
        </a>

        <div class="input-group border px-2 py-2" style="border-radius: 30px; width: 40%">
            <input type="text" class="form-control border-0" placeholder="Search" />
            <button class="btn rounded text-danger pe-4" href="#">
                <i class="fa fa-search"></i>
            </button>
        </div>

        <ul class="navbar-nav">

            <li class="nav-item px-1">
                <a class="nav-link" href="/pages/orders.php">
                    Your Orders
                </a>
            </li>

            <li class="nav-item px-1">
                <a class="nav-link" href="/pages/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            </li>

            <li class="nav-item px-1">
                <a class="nav-link" href="/pages/dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item px-1">
                <a class="btn btn-danger rounded " id='signinBtn' href="/pages/authentication.php">Sign In</a>
            </li>
        </ul>
    </div>
</nav>