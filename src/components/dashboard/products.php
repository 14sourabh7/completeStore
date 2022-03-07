<section id='products'>

    <div id='products' class="my-5">
        <div class="row">
            <div class="col-8">
                <h1>Product Management</h1>
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
                <a href='/pages/addNewUser.php' class="btn btn-success addNewProduct" data-bs-toggle="modal" data-bs-target="#addNewModal">Add New</a>
            </div>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-sm" id='userTable'>
                <thead>
                    <tr>
                        <th scope="col">SKU_NO</th>

                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Category</th>
                        <th scope='col'>Price</th>
                        <th scope='col'>Discount</th>

                    </tr>
                </thead>
                <tbody class='productData'>

                </tbody>
            </table>


        </div>
        <div class="productPages"></div>


</section>