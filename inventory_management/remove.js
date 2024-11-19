<script>

    $(document).ready(function () {

        $('.delete_data').click(function (e) {
            e.preventDefault();
            var inventory_id = $(this).closest('tr').find('.inventory_id').text();
          

            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_delete_btn': true,
                    'inventory_id':inventory_id,
                },
                success: function (response) {
                   
                    window.location.reload();
                      
                }
            });

        })

    });

</script>