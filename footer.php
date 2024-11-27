
<script>
    $(document).ready(function () {
        $("#product-toggle").click(function (e) {
            e.preventDefault();
            $("#product-submenu").slideToggle();
            const productArrow = $("#product-arrow");
            if (productArrow.hasClass("fa-chevron-right")) {
                productArrow.removeClass("fa-chevron-right").addClass("fa-chevron-down");
            } else {
                productArrow.removeClass("fa-chevron-down").addClass("fa-chevron-right");
            }
        });

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