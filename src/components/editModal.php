 <div class="modal" id="editModal">
     <div class="modal-dialog">
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h4 class="modal-title" id="userID">Edit User</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
             </div>

             <!-- Modal body -->
             <div class="modal-body">
                 <form action="/action_page.php">
                     <div class="row">
                         <label for=" user_name" class="form-label">user_name:</label>
                         <input type="text" class="form-control" id="user_name" placeholder="Enter user_name" name="user_name">
                     </div>
                     <div class="row">
                         <label for="name" class="form-label">name:</label>
                         <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                     </div>
                     <div class="row">
                         <label for="email" class="form-label">Email:</label>
                         <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                     </div>
                     <div class="row">
                         <label for="pwd" class="form-label">Password:</label>
                         <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                     </div>
                     <div class="row mt-3">
                         <select class="form-control" id="role" name="role">
                             <option value="customer" name='role'>customer</option>
                             <option value="admin" name='role'>admin</option>
                         </select>
                     </div>
                 </form>
             </div>

             <!-- Modal footer -->
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                 <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id='modalButton'>Update</button>
             </div>

         </div>
     </div>
 </div>