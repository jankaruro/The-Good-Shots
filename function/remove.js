<script>

    $(document).ready(function () {

        $('.delete_data').click(function (e) {
            e.preventDefault();
            var user_id = $(this).closest('tr').find('.user_id').text();
          

            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_delete_btn': true,
                    'user_id':user_id,
                },
                success: function (response) {
                   
                    window.location.reload();
                      
                }
            });

        })

    });
    
    $(document).ready(function () {

$('.deletesupp').click(function (e) {
    e.preventDefault();
    var supplier_id = $(this).closest('tr').find('.supplier_id').text();
  

    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_delete_supp_btn': true,
            'supplier_id':supplier_id,
        },
        success: function (response) {
           
            window.location.reload();
              
        }
    });

})

});
$(document).ready(function () {

$('.delete_category').click(function (e) {
    e.preventDefault();
    var category_id = $(this).closest('tr').find('.category_id').text();
  

    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_delete_btn': true,
            'category_id':category_id,
        },
        success: function (response) {
           
            window.location.reload();
              
        }
    });

})

});

$(document).ready(function () {

$('.delete_supplier_products').click(function (e) {
    e.preventDefault();
    var supplier_product_id = $(this).closest('tr').find('.supplier_product_id').text();
  

    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_delete_supplier_product_btn': true,
            'supplier_product_id':supplier_product_id,
        },
        success: function (response) {
           
            window.location.reload();
              
        }
    });

})

});





$(document).ready(function () {

$('.delete_inventory').click(function (e) {
    e.preventDefault();
    var inventory_id = $(this).closest('tr').find('.inventory_id').text();
  

    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_delete_inventory_btn': true,
            'inventory_id':inventory_id,
        },
        success: function (response) {
           
            window.location.reload();
              
        }
    });

})

});

</script>