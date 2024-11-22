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
            <label class="fs-5 mt-1 fw-bolder">Supplier Name</label>
            <input type="text" class="form-control fw-medium" name="supplier_name" placeholder="Enter Supplier Name">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Address</label>
            <input type="text" class="form-control fw-medium" name="address" placeholder="Enter Supplier Address">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Contact Person</label>
            <input type="text" class="form-control fw-medium" name="contact_person" placeholder="Enter Contact Person">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Email</label>
            <input type="email" class="form-control fw-medium" name="email" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Status</label>
            <select class="form-control fw-medium" id="status" name="status">
              <option value="active">Active </option>
              <option value="inactive">Inactive</option>
             
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="add_supplier" class="btn btn-primary fw-medium">Add User</button>
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
        <h1 class="modal-title fs-2" id="editDataLabel">Edit Inventory</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
              <input type="hidden" class="form-control fw-medium" id = "id" name = "id"> 
            </div>
        <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Supplier Name</label>
            <input type="text" class="form-control fw-medium" name="suppliername" placeholder="Enter First Name">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Address</label>
            <input type="text" class="form-control fw-medium" name="address" placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Contact Person</label>
            <input type="text" class="form-control fw-medium" name="contactperson" placeholder="Enter Contact Person">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Email</label>
            <input type="email" class="form-control fw-medium" name="email" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Status</label>
            <select class="form-control fw-medium" id="status" name="status">
              <option value="active">Active </option>
              <option value="inactive">Inactive</option>
             
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="update_supplier" class="btn btn-primary fw-medium">Update</button>
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
          <h3 class="text-center">Supplier Management</h3>
          <button type="button" class="btn btn-primary float-end fw-medium" data-bs-toggle="modal"
            data-bs-target="#addUserData">
            Add Supplier
          </button>

        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Supplier Name</th>
                <th scope="col">Address</th>
                <th scope="col">Contact person</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              <?php
              $connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

              $fetch_query = "SELECT * FROM suppliers ";
              $fetch_query_run = mysqli_query($connection, $fetch_query);

              if (mysqli_num_rows($fetch_query_run) > 0) {
                while ($row = mysqli_fetch_array($fetch_query_run)) {

                  ?>
                  <tr>
                    <td class="supplier_id"><?php echo $row['id']; ?></td>
                    <td><?php echo $row['supplier_name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['contact_person']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                      <a href="#" class="btn btn-info btn-base viewsupp">View Data</a>
                      <a href="#" class="btn btn-success btn-base editsupp">Edit Data</a>
                      <a href="" class="btn btn-danger btn-base deletesupp">Delete Data</a>
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