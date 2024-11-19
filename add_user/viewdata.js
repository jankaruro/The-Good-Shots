<script>

    $(document).ready(function () {

        $('.view_data').click(function (e) {
            e.preventDefault();
            var user_id = $(this).closest('tr').find('.user_id').text();
            /* console.log('hello');*/


            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_view_btn': true,
                    'user_id':user_id,
                },
                success: function (response) {
                    /*console.log(response);*/
                    $('.view_user_data').html(response);
                    $('#viewuserModal').modal('show');    
                }
            });

        })

    });

</script>