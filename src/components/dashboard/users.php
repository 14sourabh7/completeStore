 <section id='users'>
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
         <div class="userPages"></div>
 </section>