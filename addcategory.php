<?php include('product_category/addcategory_header.php'); ?>

<!-- edit Modal -->
<div class="modal fade" id="edituserdata" tabindex="-1" aria-labelledby="edituserdataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="edituserdataLabel">Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="code.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id='user_id' name="id">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Category Name</b></label>
                        <input type="text" class="form-control" id="na_me" name="na_me"
                            placeholder="enter cat">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Description</b></label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="description">
                    </div>
                   
                    
                  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="update_data" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- edit Modal -->

<!--  -->

<!-- view Modal -->

<div class="modal fade" id="viewuserModal" tabindex="-1" aria-labelledby="viewuserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewuserModal  Label">View User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="view_user_data">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- view Modal -->

<!--  -->

<!-- insert Modal -->
<div class="modal fade" id="insertdata" tabindex="-1" aria-labelledby="insertdataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="insertdataLabel">Category Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registration-form" method="POST">
                    <div class="form-group mb-3">
                        <label for=""><b>Name</b></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="enter category"
                            required>
                    </div>
            
                    <div class="form-group mb-3">
                        <label for=""><b>Description</b></label>
                        <input type="text" class="form-control" id="desription" name="desription" placeholder="description"
                            required>
                    </div>
                
                    
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit"  name="addprod" id="registration" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- insert Modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function () {
        $('#registration').click(function (e) {
            e.preventDefault();
            var valid = $('#registration-form')[0].checkValidity();
            if (valid) {

                var name = $('#name').val();
                var desription = $('#desription').val();

                $.ajax({
                    type: 'POST',
                    url: 'process_catetgory.php',
                    data: { name: name, desription: desription},
                    success: function (data) {
                        Swal.fire({
                            title: "Successful",
                            text: "Successfully Registered",
                            icon: "success"
                        }).then(function () {
                            window.location.reload(); 
                        });
                    },
                    error: function (data) {
                        Swal.fire({
                            title: "Error",
                            text: "There were errors while saving the data",
                            icon: "error"
                        });
                    }
                });

                //alert('true');
            } else {
                //alert('false'); 
            }
        });
    });
</script>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-20">


            <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {

                echo $_SESSION['status'];
                ?>

                <?php
                unset($_SESSION['status']);

            }



            ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Category List</h4>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#insertdata">
                        Add new category
                    </button>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                               
                                <th scope="col">Name</th>
                                <th scope="col">Desription</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $connection = mysqli_connect("localhost", "root", "", "tgs_inventory");


                            $fetch_query = "SELECT * FROM category";
                            $fetch_query_run = mysqli_query($connection, $fetch_query);


                            if (mysqli_num_rows($fetch_query_run) > 0) {

                                while ($row = mysqli_fetch_array($fetch_query_run)) {
                                    ?>
                                    <tr>
                                        
                                        <td><?php echo $row['name']; ?></td> <!-- Corrected 'firstname' -->
                                        <td><?php echo $row['description']; ?></td> <!-- Corrected 'lastname' -->
                                      
                                       
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm view_data">View</a>
                                            <a href="" class="btn btn-success btn-sm edit_data">Edit</a>
                                            <a href="" class="btn btn-danger btn-sm delete_data">delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">No Record Found</td> <!-- Fix colspan to match the number of columns -->
                                </tr>
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





<?php include('product_category/addproduct_footer.php'); ?>
<?php include('product_category/viewproduct.js'); ?>
<?php include('product_category/editproduct.js'); ?>
<?php include('product_category/deleteproduct.js'); ?>

