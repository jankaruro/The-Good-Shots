<script>

    $(document).ready(function () {

        $('.view_data').click(function (e) {
            e.preventDefault();
            var id = $(this).closest('tr').find('.id').text();
           


            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_view_btn': true,
                    'id':id,
                },
                success: function (response) {
                    $('.view_item_data').html(response);
                    $('#viewitemModal').modal('show');    
                }
            });

        })

    });

</script>