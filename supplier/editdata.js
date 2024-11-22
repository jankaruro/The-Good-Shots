<script>

    $(document).ready(function () {

        $('.edit_data').click(function (e) {
            e.preventDefault();
            var id = $(this).closest('tr').find('.id').text();



            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_edit_btn': true,
                    'id': id,
                },
                success: function (response) {
                    

                    $.each(response, function (Key, value) {
                        
                        $('#id').val(value['id']);
                        $('#itemName').val(value['Item_Name']);
                        $('#quantity').val(value['Quantity']);
                        $('#grams').val(value['grams_per_unit']);
                        $('#expiry').val(value['Expiry_Date']);

                    });

                    $('#editData').modal('show');
                }
            });

        })

    });

</script>