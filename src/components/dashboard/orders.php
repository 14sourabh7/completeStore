<section id='orders'>

    <div id='orders' class="my-5">
        <div class="row">
            <div class="col-8">
                <h1>Order Management</h1>
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
                <!-- <a href='/pages/addNewUser.php' class="btn btn-success addNewProduct" data-bs-toggle="modal" data-bs-target="#addNewModal">Add New</a> -->
            </div>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-sm" id='orderTable'>
                <thead>
                    <tr>
                        <th scope="col">Order Id</th>

                        <th scope="col">User Id</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Amount</th>
                        <th scope='col'>Date / Time</th>
                        <th></th>
                        <th scope='col'>Status</th>

                    </tr>
                </thead>
                <tbody class='orderData'>

                </tbody>
            </table>
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </div>



</section>