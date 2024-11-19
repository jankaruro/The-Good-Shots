<script>

    $(document).ready(function () {

        $('.edit_data').click(function (e) {
            e.preventDefault();
            var user_id = $(this).closest('tr').find('.user_id').text();
            /*console.log(user_id);*/



            $.ajax({
                method: "POST",
                url: "addprod.php",
                data: {
                    'click_edit_btn': true,
                    'user_id': user_id,
                },
                success: function (response) {
                    /*console.log(response);*/
                   $.each(response, function (Key, value) { 
                    $('#user_id').val(value['id']);
                    $('#first_name').val(value['first_name']);
                    $('#last_name').val(value['last_name']);
                    $('#em_ail').val(value['email']);
                    $('#ro_le').val(value['role']);
                   });

                   
                    $('#edituserdata').modal('show');
                }
            });

        })


    });
  $(document).ready(function () {

$('.edit_data').click(function (e) {
    e.preventDefault();
    var user_id = $(this).closest('tr').find('.user_id').text();
    /*console.log(user_id);*/



    $.ajax({
        method: "POST",
        url: "addcat.php",
        data: {
            'click_edit_btn': true,
            'user_id': user_id,
        },
        success: function (response) {
            /*console.log(response);*/
           $.each(response, function (Key, value) { 
            $('#user_id').val(value['id']);
            $('#name').val(value['name']);
            $('#description').val(value['description']);
          
           });

           
            $('#edituserdata').modal('show');
        }
    });

})


});
</script>