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
</script>