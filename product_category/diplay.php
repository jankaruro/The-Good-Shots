<?php
// Include the database connection file (assuming it's in the same directory)
require_once 'connection.php';

// Query to fetch products from database
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Display the product list
    ?>
    <div class="product-list">
        <?php
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card">
                <div class="image">
                    <img src="Images/<?php echo $row['image']; ?>" alt="">
                </div>
                <span class="name-order"><?php echo $row['name']; ?></span>
                <span class="price-order">P<?php echo $row['price']; ?></span>
                <div class="button">
                     <button type="button" class="Add">Order</button>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
} else {
    echo "No products found";
}


?>