<?php include('purchase_order/addsupplier_header.php'); ?>
<link rel="stylesheet" href="supplier.css">
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
                        <input class="form-control" placeholder="Company Name" name="companyname" required>
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
                        <label for=""><b> </b></label>
                        <input type="email" class="form-control" id="" name="" placeholder="enter email">
                    </div>


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
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="insertdataLabel">Add Supplier</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registration-form">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">{ Update Purchase Order Details | New Purchase Order }</h3>
                        </div>
                        <div class="card-body">
                            <form action="" id="po-form">
                                <input type="hidden" name="id" value="{ id }">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="supplier_id">Supplier</label>
                                        <select name="supplier_id" id="supplier_id"
                                            class="custom-select custom-select-sm rounded-0 select2">
                                            <option value="" disabled { !supplier_id ? 'selected' : '' }></option>
                                            <!-- supplier options -->
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="po_no">PO # <span class="po_err_msg text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm rounded-0" id="po_no"
                                            name="po_no" value="{ po_no }">
                                        <small><i>Leave this blank to Automatically Generate upon saving.</i></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered" id="item-list">
                                            <colgroup>
                                                <col width="5%">
                                                <col width="5%">
                                                <col width="10%">
                                                <col width="20%">
                                                <col width="30%">
                                                <col width="15%">
                                                <col width="15%">
                                            </colgroup>
                                            <thead>
                                                <tr class="bg-navy disabled">
                                                    <th class="px-1 py-1 text-center"></th>
                                                    <th class="px-1 py-1 text-center">Qty</th>
                                                    <th class="px-1 py-1 text-center">Unit</th>
                                                    <th class="px-1 py-1 text-center">Item</th>
                                                    <th class="px-1 py-1 text-center">Description</th>
                                                    <th class="px-1 py-1 text-center">Price</th>
                                                    <th class="px-1 py-1 text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- item list -->
                                            </tbody>
                                            <tfoot>
                                                <tr class="bg-lightblue">
                                                <tr>
                                                    <th class="p-1 text-right" colspan="6"><span><button
                                                                class="btn btn btn-sm btn-flat btn-primary py-0 mx-1"
                                                                type="button" id="add_row">Add Row</button></span> Sub
                                                        Total</th>
                                                    <th class="p-1 text-right" id="sub_total">0</th>
                                                </tr>
                                                <tr>
                                                    <th class="p-1 text-right" colspan="6">Discount (%)
                                                        <input type="number" step="any" name="discount_percentage"
                                                            class="border-light text-right"
                                                            value="{ discount_percentage }">
                                                    </th>
                                                    <th class="p-1"><input type="text" class="w-100 border-0 text-right"
                                                            readonly value="{ discount_amount }" name="discount_amount">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="p-1 text-right" colspan="6">Tax Inclusive (%)
                                                        <input type="number" step="any" name="tax_percentage"
                                                            class="border-light text-right" value="{ tax_percentage }">
                                                    </th>
                                                    <th class="p-1"><input type="text" class="w-100 border-0 text-right"
                                                            readonly value="{ tax_amount }" name="tax_amount"></th>
                                                </tr>
                                                <tr>
                                                    <th class="p-1 text-right" colspan="6">Total</th>
                                                    <th class="p-1 text-right" id="total">0</th>
                                                </tr>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="notes" class="control-label">Notes</label>
                                                <textarea name="notes" id="notes" cols="10" rows="4"
                                                    class="form-control rounded-0">{ notes }</textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="status" class="control-label">Status</label>
                                                <select name="status" id="status"
                                                    class="form-control form-control-sm rounded-0">
                                                    <option value="1" { status==1 ? 'selected' : '' }>Approved</option>
                                                    <option value="2" { status==2 ? 'selected' : '' }>Denied</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-flat btn-primary" form="po-form">Save</button>
                            <a class="btn btn-flat btn-default" href="?page=purchase_orders">Cancel</a>
                        </div>
                    </div>
                    <table class="d-none" id="item-clone">
                        <tr class="po-item" data-id="">
                            <td class="align-middle p-1 text-center">
                                <button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i
                                        class="fa fa-times"></i></button>
                            </td>
                            <td class="align-middle p-0 text-center">
                                <input type="number" class="text-center w-100 border-0" step="any" name="qty[]" />
                            </td>
                            <td class="align-middle p-1">
                                <input type="text" class="text-center w-100 border-0" name="unit[]" />
                            </td>
                            <td class="align-middle p-1">
                                <input type="hidden" name="item_id[]">
                                <input type="text" class="text-center w-100 border-0 item_id" required />
                            </td>
                            <td class="align-middle p-1 item-description"></td>
                            <td class="align-middle p-1">
                                <input type="number" step="any" class="text-right w-100 border-0" name="unit_price[]"
                                    value="0" />
                            </td>
                            <td class="align-middle p-1 text-right total-price">0</td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="registration" class="btn btn-primary">Save changes</button>
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

                var companyname = $('#company_name').val();
                var province = $('#province').val();
                var city = $('#city').val();
                var phonenumber = $('#phone_number').val();
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: { companyname: company_name, province: province, city: city, phonenumber: phone_number },
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

    $(function () {
        $('#registration').click(function (e) {
            e.preventDefault();

            // Check form validity
            var valid = $('#registration-form')[0].checkValidity();
            if (valid) {
                var companyname = $('#companyname').val();
                var province = $('#province').val();
                var city = $('#city').val();
                var phonenumber = $('#phonenumber').val();

                var formData = new FormData();
                formData.append('companyname', companyname);
                formData.append('province', province);
                formData.append('city', city);
                formData.append('phonenumber', phonenumber);

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
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
                // Handle case where form validation fails (optional)
                // alert('Form is not valid');
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
                    <a href="#" class="list-group-item" id="product-toggle">
                        <i class="fa-solid fa-money-bill me-3"></i>Product Management<i class="fa-solid fa-chevron-right toggle-arrow-product" id="product-arrow"></i>
                    </a>
                    <div class="submenu" id="product-submenu">
                        <a href="addproduct.php" class="sub-list-item"><p class = "txt-name-btn">Add Product</p></a>
                        <a href="addcategory.php" class="sub-list-item"><p class = "txt-name-btn">Add Category</p></a>
                    </div>
                </div>
                <a href="inventoryManage.php" class="list-group-item">
                    <i class="fas fa-shopping-cart me-3"></i>Inventory Management
                </a>
                <a href="purchase_order.php" class="list-group-item active">
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
                    <h2 class="fs-3 m-1">Purchase Order</h2>
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
        <div class="col-md-8">


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
                    <h4 class="text-center">List of Purchase Order</h4>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#insertdata">
                        Add new Supplier
                    </button>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Province</th>
                                <th scope="col">City</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $connection = mysqli_connect("localhost", "root", "", "tgs_inventory");


                            $fetch_query = "SELECT * FROM supplier";
                            $fetch_query_run = mysqli_query($connection, $fetch_query);


                            if (mysqli_num_rows($fetch_query_run) > 0) {

                                while ($row = mysqli_fetch_array($fetch_query_run)) {
                                    ?>
                                    <tr>
                                        <td class="user_id"><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['companyname']; ?></td> <!-- Corrected 'firstname' -->
                                        <td><?php echo $row['province']; ?></td> <!-- Corrected 'lastname' -->
                                        <td><?php echo $row['city']; ?></td>
                                        <td><?php echo $row['phonenumber']; ?></td>
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





<?php include('purchase_order/addsupplier_footer.php'); ?>
<?php include('viewsupplier.js'); ?>
<?php include('editsupplier.js'); ?>
<?php include('deletesupplier.js'); ?>