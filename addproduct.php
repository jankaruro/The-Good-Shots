<?php include('product_category/addproduct_header.php'); ?>

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
                        <label for=""><b>First Name</b></label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="enter name">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Last Name</b></label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            placeholder="enter name">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Email Address</b></label>
                        <input type="email" class="form-control" id="em_ail" name="em_ail" placeholder="enter email">
                    </div>

                    <div class="form-group">
                        <label for=""><b>Role</b></label>
                        <select class="form-control" id="ro_le" name="ro_le">
                            <option value="">-- Select Role --</option>
                            <option value="superadmin">Superadmin</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
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
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';  // Show the preview image
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<!-- insert Modal -->
<div class="modal fade" id="insertdata" tabindex="-1" aria-labelledby="insertdataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="insertdataLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registration-form" method="POST">
                    <div class="form-group mb-3">
                        <label for=""><b>Product Name</b></label>
                        <input type="text" class="form-control" id="productname" name="productname"
                            placeholder="enter product name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Image</b></label>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"
                            onchange="previewImage(event)"> <br><br>

                        <!-- Preview Area -->
                        <div id="imagePreviewContainer">
                            <img id="imagePreview" src="" alt="Image Preview" style="max-width: 300px; display: none;">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Price</b></label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="enter price"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Category</b></label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">-- Select Category --</option>
                            <?php
                            // Connect to the database
                            include('product_category/connection.php');

                            // Retrieve categories from the database
                            $stmt = $conn->prepare("SELECT name FROM category");
                            $stmt->execute();
                            $result = $stmt->fetchAll();

                            // Check if there are any categories
                            if (count($result) > 0) {
                                // Output the categories
                                foreach ($result as $row) {
                                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No categories found</option>";
                            }

                            // Close the database connection
                            $conn = null;
                            ?>
                        </select>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="addprod" id="registration" class="btn btn-primary">Save changes</button>
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
                var productname = $('#productname').val();
                var image = $('#image')[0].files[0]; 
                var price = $('#price').val();
                var category = $('#category').val();

                var formData = new FormData();
                formData.append('productname', productname);
                formData.append('image', image);
                formData.append('price', price);
                formData.append('category', category);

                $.ajax({
                    type: 'POST',
                    url: 'product_category/process.php',
                    data: formData,
                    processData: false,
                    contentType: false,
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
            } else {
            }
        });
    });
</script>

<div class="d-flex content">
        <div id="sidebar" class="sidebar-color">
            <div class="sidebar-heading">
                <img src="Images/Logo.jpg" alt="Bootstrap" class="logo">The Good Shots
            </div>
            <div class="list-group list-group-flush mt-0">
                <a href="dashboard.php" class="list-group-item">
                    <i class="fas fa-tachometer-alt me-3"></i>Dashboard
                </a>
                <a href="adduser.php" class="list-group-item">
                    <i class="fas fa-project-diagram me-3"></i>User Management
                </a>
                <div class="product-dropdown">
                    <a href="#" class="list-group-item active" id="product-toggle">
                        <i class="fa-solid fa-money-bill me-3"></i>Product Management<i class="fa-solid fa-chevron-down toggle-arrow-product" id="product-arrow"></i>
                    </a>
                    <div class="product-submenu" id="product-submenu">
                        <a href="addproduct.php" class="sub-list-item active"><p class = "txt-name-btn">Add Product</p></a>
                        <a href="addcategory.php" class="sub-list-item"><p class = "txt-name-btn">Add Category</p></a>
                    </div>
                </div>
                <a href="inventoryManage.php" class="list-group-item">
                    <i class="fas fa-shopping-cart me-3"></i>Inventory Management
                </a>
                <a href="purchase_order.php" class="list-group-item">
                    <i class="fa-solid fa-money-bill me-3"></i>Purchase Order
                </a>
                <div class="supplier-dropdown">
                    <a href="#" class="list-group-item" id="supplier-toggle">
                        <i class="fa-solid fa-money-bill me-3"></i>Supplier<i class="fa-solid fa-chevron-right toggle-arrow" id="supplier-arrow"></i>
                    </a>
                    <div class="submenu" id="supplier-submenu">
                        <a href="addsupplier.php" class="sub-list-item"><p class = "txt-name-btn">Add Supplier</p></a>
                        <a href="addsupplier_product.php" class="sub-list-item"><p class = "txt-name-btn">Suppliers Product</p></a>
                    </div>
                </div>
                <a href="purchase_order.php" class="list-group-item">
                    <i class="fa-solid fa-truck me-3"></i>Delivery
                </a>
                <div class="reports-dropdown">
                    <a href="#" class="list-group-item" id="reports-toggle">
                        <i class="fa-solid fa-money-bill me-3"></i>Reports<i class="fa-solid fa-chevron-right toggle-arrow" id="reports-arrow"></i>
                    </a>
                    <div class="submenu" id="reports-submenu">
                        <a href="" class="sub-list-item"><p class = "txt-name-btn">Weekly</p></a>
                        <a href="" class="sub-list-item"><p class = "txt-name-btn">Monthly</p></a>
                        <a href="" class="sub-list-item"><p class = "txt-name-btn">Yearly</p></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-2 dashboard-nav">
                <div class="d-flex align-items-center">
                    <h2 class="fs-3 m-1">Add Product</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                    <a class="nav-link fw-bold fs-5 cashier-link" href="order.php" style="color: #343a40; font-weight: 500; font-size: 12px;">
                            <i class="fa-solid fa-cash-register"></i>
                            Food & Orders
                        </a>
                        <a class="nav-link fw-bold fs-5 notification-link" href="#" style="color: #343a40; font-weight: 500; font-size: 12px;">
                            <i class="fa-solid fa-bell"></i>
                            Notification
                        </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold fs-5 admin-link" href="#" style="color: #343a40; font-weight: 500; font-size: 12px;" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-circle"></i>
                                Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">


            <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {

                echo $_SESSION['status'];
                ?>

                <?php
                unset($_SESSION['status']);

            }



            ?>
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="text-center">PRODUCT LIST</h4>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#insertdata">
                        Add Product
                    </button>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Image</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $connection = mysqli_connect("localhost", "root", "", "tgs_inventory");


                            $fetch_query = "SELECT * FROM product";
                            $fetch_query_run = mysqli_query($connection, $fetch_query);


                            if (mysqli_num_rows($fetch_query_run) > 0) {

                                while ($row = mysqli_fetch_array($fetch_query_run)) {
                                    ?>
                                    <tr>
                                        <td class="user_id"><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['price']; ?></td>
                                        <td><?php echo $row['category']; ?></td>
                                        <td> <img src="img/<?php echo $row["image"]; ?>" width=200
                                                title="<?php echo $row['image']; ?>"> </td>
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
                                    <td colspan="5">No Record Found</td>
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



<script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>


<?php include('product_category/addproduct_footer.php'); ?>
<?php include('product_category/viewproduct.js'); ?>
<?php include('product_category/editproduct.js'); ?>
<?php include('product_category/deleteproduct.js'); ?>

