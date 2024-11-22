<?php
session_start();
include('header.php'); ?>

<!--Add-->
<!--Add User-->
<div class="modal fade" id="addUserData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="addUserDataLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-2" id="addUser DataLabel">Adding New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">First Name</label>
            <input type="text" class="form-control fw-medium" name="first_name" placeholder="Enter First Name">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Last Name</label>
            <input type="text" class="form-control fw-medium" name="last_name" placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Email</label>
            <input type="email" class="form-control fw-medium" name="email" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Password</label>
            <input type="password" class="form-control fw-medium" name="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Role</label>
            <select class="form-control fw-medium" id="role" name="role">
              <option value="user">User </option>
              <option value="admin">Admin</option>
              <option value="superadmin">Super Admin</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="save_user" class="btn btn-primary fw-medium">Add User</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!---->
<!--view-->
<div class="modal fade" id="viewitemModal" tabindex="-1" aria-labelledby="viewitemModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="viewitemModalLabel">View Item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="view_item_data">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!---->
<!--edit-->
<div class="modal fade" id="editData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="editDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-2" id="editDataLabel">Edit Users</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
              <input type="text" class="form-control fw-medium" id = "id" name = "id"> 
            </div>
          



        <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">First Name</label>
            <input type="text" class="form-control fw-medium" name="firstname" placeholder="Enter First Name">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Last Name</label>
            <input type="text" class="form-control fw-medium" name="lastname" placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Email</label>
            <input type="email" class="form-control fw-medium" name="email" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Password</label>
            <input type="password" class="form-control fw-medium" name="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Role</label>
            <select class="form-control fw-medium" id="role" name="role">
              <option value="user">User </option>
              <option value="admin">Admin</option>
              <option value="superadmin">Super Admin</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="update_data" class="btn btn-primary fw-medium">Update Item</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!---->


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-8 col-lg-20">

      <?php
      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php echo $_SESSION['status']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
          const alert = document.querySelector('.alert');
          setTimeout(() => {
            alert.style.display = 'none';
          }, 3000);
        </script>
        <?php
        unset($_SESSION['status']);
      }

      ?>
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">User Management</h3>
          <button type="button" class="btn btn-primary float-end fw-medium" data-bs-toggle="modal"
            data-bs-target="#addUserData">
            Add New User
          </button>

        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              <?php
              $connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

              $fetch_query = "SELECT * FROM users ";
              $fetch_query_run = mysqli_query($connection, $fetch_query);

              if (mysqli_num_rows($fetch_query_run) > 0) {
                while ($row = mysqli_fetch_array($fetch_query_run)) {

                  ?>
                  <tr>
                    <td class="user_id"><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td>
                      <a href="#" class="btn btn-info btn-base view_data">View Data</a>
                      <a href="#" class="btn btn-success btn-base edit_data">Edit Data</a>
                      <a href="" class="btn btn-danger btn-base delete_data">Delete Data</a>
                    </td>
                  </tr>
                  <?php

                }
              } else {
                ?>
                <tr colspan="5"> No Record Found </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include('footer.php'); ?>
<?php include('function/viewdata.js'); ?>
<?php include('function/editdata.js'); ?>
<?php include('function/remove.js'); ?>