<script>

    $(document).ready(function () {

        $('.delete_data').click(function (e) {
            e.preventDefault();
            var user_id = $(this).closest('tr').find('.user_id').text();
            /* console.log('hello');*/


            $.ajax({
                method: "POST",
                url: "addprod.php",
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

$('.delete_data').click(function (e) {
    e.preventDefault();
    var user_id = $(this).closest('tr').find('.user_id').text();
    /* console.log('hello');*/


    $.ajax({
        method: "POST",
        url: "addcat.php",
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
    

</script>