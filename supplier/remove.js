<script>

    $(document).ready(function () {

        $('.delete_data').click(function (e) {
            e.preventDefault();
            var id = $(this).closest('tr').find('.id').text();
          

            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_delete_btn': true,
                    'id':id,
                },
                success: function (response) {
                   
                    window.location.reload();
                      
                }
            });

        })

    });

</script>