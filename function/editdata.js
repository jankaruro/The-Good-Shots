<script>

    $(document).ready(function () {

        $('.edit_data').click(function (e) {
            e.preventDefault();
            var user_id = $(this).closest('tr').find('.user_id').text();



            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_edit_btn': true,
                    'user_id': user_id,
                },
                success: function (response) {
                    

                    $.each(response, function (Key, value) {
                        $('#id').val(value['id']);
                        $('[name="firstname"]').val(value['first_name']);
                        $('[name="lastname"]').val(value['last_name']);
                        $('[name="email"]').val(value['email']);
                        $('[name="password"]').val(value['password']);
                        $('[name="role"]').val(value['role']);
                    });
                    $('#editData').modal('show');
                }
            });

        })

    });



$(document).ready(function () {

$('.editsupp').click(function (e) {
    e.preventDefault();
    var supplier_id = $(this).closest('tr').find('.supplier_id').text();



    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_edit_supp_btn': true,
            'supplier_id': supplier_id,
        },
        success: function (response) {
            

            $.each(response, function (Key, value) {
                $('#id').val(value['id']);
                $('[name="suppliername"]').val(value['supplier_name']);
                $('[name="address"]').val(value['address']);
                $('[name="contactperson"]').val(value['contact_person']);
                $('[name="email"]').val(value['email']);
                $('[name="status"]').val(value['status']);
            });
            $('#editData').modal('show');
        }
    });

})

});

$(document).ready(function () {

$('.edit_category').click(function (e) {
    e.preventDefault();
    var category_id = $(this).closest('tr').find('.category_id').text();



    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_edit_category_btn': true,
            'category_id': category_id,
        },
        success: function (response) {
            

            $.each(response, function (Key, value) {
                $('#id').val(value['id']);
                $('[name="name"]').val(value['name']);
                $('[name="description"]').val(value['description']);
              
            });
            $('#editData').modal('show');
        }
    });

})

});


$(document).ready(function () {

$('.edit_supplier_products').click(function (e) {
    e.preventDefault();
    var supplier_product_id = $(this).closest('tr').find('.supplier_product_id').text();



    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_edit_supplier_products_btn': true,
            'supplier_product_id': supplier_product_id,
        },
        success: function (response) {
            

            $.each(response, function (Key, value) {
                $('#id').val(value['id']);
                $('[name="supplier"]').val(value['supplier']);
                $('[name="product_name"]').val(value['product_name']);
                $('[name="price"]').val(value['price']);
                $('[name="category"]').val(value['category']);
              
            });
            $('#editData').modal('show');
        }
    });

})

});



$(document).ready(function () {

$('.edit_inventory').click(function (e) {
    e.preventDefault();
    var inventory_id = $(this).closest('tr').find('.inventory_id').text();



    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_edit_inventory_btn': true,
            'inventory_id': inventory_id,
        },
        success: function (response) {
            

            $.each(response, function (Key, value) {
                $('#id').val(value['id']);
                $('[name="supplier"]').val(value['supplier']);
                $('[name="product_name"]').val(value['product_name']);
                $('[name="package_quantity"]').val(value['package_quantity']);
                $('[name="measurement_per_package"]').val(value['measurement_per_package']);
                $('[name="total_measurement"]').val(value['total_measurement']);
                $('[name="unit"]').val(value['unit']);
                $('[name="Expiry_Date"]').val(value['Expiry_Date']);
                
              
            });
            $('#editData').modal('show');
        }
    });

})

});
$(document).ready(function () {
    $('.edit_product').click(function (e) {
        e.preventDefault();
        
        var product_id = $(this).closest('tr').find('.product_id').text().trim();

        $.ajax({
            method: "POST",
            url: "code.php",
            data: {
                'click_edit_product_btn': true,
                'product_id': product_id
            },
            success: function (response) {
                try {
                    const data = JSON.parse(response);
                    if (data.message) {
                        alert(data.message);
                    } else if (data.length > 0) {
                        $('#id').val(data[0].id);
                        $('[name="product_name"]').val(data[0].product_name);
                        $('[name="price"]').val(data[0].price);
                        $('[name="category"]').val(data[0].category);
                        $('#currentImage').attr('src', 'uploaded_images/' + data[0].image);
                        $('#editData').modal('show');
                    } else {
                        alert('No data found.');
                    }
                } catch (error) {
                    console.error("Error parsing JSON:", error);
                    alert('An error occurred. Please try again.');
                }
            },
            error: function () {
                alert('Failed to fetch product data. Please try again.');
            }
        });
    })
});

</script>