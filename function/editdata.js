<script>

    $(document).ready(function () {

        $('.edit_data').click(function (e) {
            e.preventDefault();
            var user_id = $(this).closest('tr').find('.user_id').text();



            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_edit_btn': true,
                    'user_id': user_id,
                },
                success: function (response) {
                    

                    $.each(response, function (Key, value) {
                        $('#id').val(value['id']);
                        $('[name="firstname"]').val(value['first_name']);
                        $('[name="lastname"]').val(value['last_name']);
                        $('[name="email"]').val(value['email']);
                        $('[name="password"]').val(value['password']);
                        $('[name="role"]').val(value['role']);
                    });
                    $('#editData').modal('show');
                }
            });

        })

    });



$(document).ready(function () {

$('.editsupp').click(function (e) {
    e.preventDefault();
    var supplier_id = $(this).closest('tr').find('.supplier_id').text();



    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_edit_supp_btn': true,
            'supplier_id': supplier_id,
        },
        success: function (response) {
            

            $.each(response, function (Key, value) {
                $('#id').val(value['id']);
                $('[name="suppliername"]').val(value['supplier_name']);
                $('[name="address"]').val(value['address']);
                $('[name="contactperson"]').val(value['contact_person']);
                $('[name="email"]').val(value['email']);
                $('[name="status"]').val(value['status']);
            });
            $('#editData').modal('show');
        }
    });

})

});

$(document).ready(function () {

$('.edit_category').click(function (e) {
    e.preventDefault();
    var category_id = $(this).closest('tr').find('.category_id').text();



    $.ajax({
        method: "POST",
        url: "code.php",
        data: {
            'click_edit_category_btn': true,
            'category_id': category_id,
        },
        success: function (response) {
            

            $.each(response, function (Key, value) {
                $('#id').val(value['id']);
                $('[name="name"]').val(value['name']);
                $('[name="description"]').val(value['description']);
              
            });
            $('#editData').modal('show');
        }
    });

})

});

</script>