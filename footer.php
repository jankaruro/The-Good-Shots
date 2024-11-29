<script src="https://code.jquery.com/jquery-3.5.2.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {


        $("#supplier-toggle").click(function (e) {
            e.preventDefault();
            $("#supplier-submenu").slideToggle();
            const supplierArrow = $("#supplier-arrow");
            if (supplierArrow.hasClass("fa-chevron-right")) {
                supplierArrow.removeClass("fa-chevron-right").addClass("fa-chevron-down");
            } else {
                supplierArrow.removeClass("fa-chevron-down").addClass("fa-chevron-right");
            }
        });

        $("#reports-toggle").click(function (e) {
            e.preventDefault();
            $("#reports-submenu").slideToggle();
            const reportsArrow = $("#reports-arrow");
            if (reportsArrow.hasClass("fa-chevron-right")) {
                reportsArrow.removeClass("fa-chevron-right").addClass("fa-chevron-down");
            } else {
                reportsArrow.removeClass("fa-chevron-down").addClass("fa-chevron-right");
            }
        });
    });
</script>
</body>

</html>