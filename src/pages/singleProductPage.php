<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>product page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            overflow-x: hidden;
        }

        .imgSize {
            height: 30px;
        }

        .fntSize {
            font-size: small;
        }
    </style>
</head>

<body>
    <?php include '../components/navbar.php' ?>



    <!-- navigation bar -->
    <div id="navigationBlock" class="row mt-5 pb-2 ps-5 border-bottom">
        <p class="text-secondary d-flex align-items-center">
            <a href='/'>Home</a>
            /
            <span class="text-dark fw-blod fs-6 productName"></span>
        </p>
    </div>

    <!-- Product container -->
    <div class="row">
        <div class="col p-5">
            <img src="../product.png" style='width:100%' alt="" />
        </div>
        <div class="col p-5">
            <!-- phone name -->
            <div class="row">
                <div class="col">
                    <p class="fs-1 fw-bold productName">Android Phone</p>
                </div>
            </div>

            <!-- phone price -->
            <div class="row d-flex align-items-center">
                <div class="col-2 text-muted fs-5 fw-bold price" style="text-decoration: line-through">
                    $199.00
                </div>
                <div class="col-6 fw-bold fs-4 dprice">$179.00</div>
                <div class="col-4 fntSize">
                    <span style="color: #f7d01c">
                        &#9733; &#9733; &#9733; &#9733; &#9733;</span>1(review)
                </div>
            </div>

            <!-- description -->
            <div class="row pt-5 desc">

            </div>

            <!-- buttons -->
            <div class="row mt-4">
                <div class="col-6">
                    <div class="col-4 pt-4 fw-bold">
                        <p>SKU: <span class="text-muted ps-1 sku">12</span></p>
                        <p>Category: <span class="text-primary ps-1 type">12</span></p>
                        <!-- <p>Tag: <span class="text-muted ps-1">Screen</span></p> -->
                        <button class="btn btn-secondary text-black fw-bold text-muted" style="background-color: #f2f2f2; border: none">
                            <img class="me-2" src="../node_modules/bootstrap-icons/icons/share.svg" alt="" />
                            Share
                        </button>
                    </div>
                </div>
                <div class="col-6">
                    <button class="btn btn-primary fntSize fw-bold add-to-cart" data-id='0'>
                        Add to cart
                    </button>
                </div>
            </div>

            <!-- specs -->

        </div>
        <div class="col-12">
            <div class="row d-flex justify-content-end">
                <div class="col-sm-12 col-md-6">
                    <div class="d-flex fw-bold">
                        <span class="p-2 text-primary">Description</span>
                        <span class="p-2">Reviews(1)</span>
                    </div>
                    <div class="progress" style="height: 2px">
                        <div class="progress-bar" style="width: 20%; height: 10px"></div>
                    </div>
                    <div class="mt-2">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum
                        voluptatem ab quia exercitationem iure repudiandae numquam do
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include '../components/footer.php';
    ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src=' ../scripts/singleProduct.js'></script>

</html>