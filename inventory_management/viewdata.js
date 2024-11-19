<script>

    $(document).ready(function () {

        $('.view_data').click(function (e) {
            e.preventDefault();
            var inventory_id = $(this).closest('tr').find('.inventory_id').text();
           


            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_view_btn': true,
                    'inventory_id':inventory_id,
                },
                success: function (response) {
                    $('.view_item_data').html(response);
                    $('#viewitemModal').modal('show');    
                }
            });

        })

    });

</script>