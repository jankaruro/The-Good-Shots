<script>

    $(document).ready(function () {

        $('.view_data').click(function (e) {
            e.preventDefault();
            var user_id = $(this).closest('tr').find('.user_id').text();
           


            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_view_btn': true,
                    'user_id':user_id,
                },
                success: function (response) {
                    $('.view_item_data').html(response);
                    $('#viewitemModal').modal('show');    
                }
            });

        })

    });
  $(document).ready(function () {

$('.viewsupp').click(function (e) {
    e.preventDefault();
    var supplier_id = $(this).closest('tr').find('.supplier_id').text();
   


    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_view_supp_btn': true,
            'supplier_id':supplier_id,
        },
        success: function (response) {
            $('.view_item_data').html(response);
            $('#viewitemModal').modal('show');    
        }
    });

})

});

$(document).ready(function () {

$('.view_category').click(function (e) {
    e.preventDefault();
    var category_id = $(this).closest('tr').find('.category_id').text();
   


    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_view_category_btn': true,
            'category_id':category_id,
        },
        success: function (response) {
            $('.view_item_data').html(response);
            $('#viewitemModal').modal('show');    
        }
    });

})

});


$(document).ready(function () {

$('.view_supplier_products').click(function (e) {
    e.preventDefault();
    var supplier_product_id = $(this).closest('tr').find('.supplier_product_id').text();
   


    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_view_supplier_product_btn': true,
            'supplier_product_id':supplier_product_id,
        },
        success: function (response) {
            $('.view_item_data').html(response);
            $('#viewitemModal').modal('show');    
        }
    });

})

});

$(document).ready(function () {

$('.view_inventory').click(function (e) {
    e.preventDefault();
    var inventory_id = $(this).closest('tr').find('.inventory_id').text();
   


    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_view_inventory_btn': true,
            'inventory_id':inventory_id,
        },
        success: function (response) {
            $('.view_item_data').html(response);
            $('#viewitemModal').modal('show');    
        }
    });

})

});

$(document).ready(function () {
    $('.view_product').click(function (e) {
        e.preventDefault();
        
        var product_id = $(this).closest('tr').find('.product_id').text().trim();

        $.ajax({
            method: "POST",
            url: "code.php",
            data: {
                'click_view_product_btn': true,
                'product_id': product_id
            },
            success: function (response) {
                try {
                    const data = JSON.parse(response);
                    if (data.success) {
                        $('.view_item_data').html(data.html);
                        $('#viewitemModal').modal('show');
                    } else if (data.message) {
                        alert(data.message);
                    } else {
                        alert("An error occurred while fetching the product details. Please try again.");
                    }
                } catch (error) {
                    console.error("Error parsing JSON:", error);
                    alert("An error occurred. Please try again.");
                }
            },
            error: function () {
                alert("Failed to retrieve product details. Please try again.");
            }
        });
    })
});


</script>