<!-- main body -->
<div class="container-fluid">
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="row">
                <?php
                for ($i = 0; $i < 20; $i++) {
                ?>
                    <div class="col ?> m-3">
                        <div class="card" style="width:200px ; height:300px">
                            <img src="product.png" class="card-img-top w-100 " alt="" />
                            <div class="card-body">
                                <h4 class="card-title text-center">product</h4>
                                <div class="row">
                                    <div class="col">
                                        <p>&#9733;&#9733;&#9733;&#9733;&#9733;</p>
                                    </div>
                                    <div class="col text-end">4.8</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-danger px-2">Add to Cart</button>
                                    <h4 class="text-danger">$50</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>