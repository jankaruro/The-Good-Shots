<script>

    $(document).ready(function () {

        $('.edit_data').click(function (e) {
            e.preventDefault();
            var inventory_id = $(this).closest('tr').find('.inventory_id').text();



            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_edit_btn': true,
                    'inventory_id': inventory_id,
                },
                success: function (response) {
                    

                    $.each(response, function (Key, value) {
                        
                        $('#itemID').val(value['ID']);
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