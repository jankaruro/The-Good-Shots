<?php
// Assume you have a database connection and a query to retrieve the 10 products
$product_list = array();
while ($row = mysqli_fetch_assoc($result)) {
    $product_list[] = array(
        'image' => $row['image'],
        'name' => $row['name'],
        'price' => $row['price']
    );
}

// Generate the HTML code for each product
$html = '';
foreach ($product_list as $product) {
    $html .= '<div class="card">';
    $html .= '<div class="image"><img src="Images/' . $product['image'] . '" alt=""></div>';
    $html .= '<span class="name-order">' . $product['name'] . '</span>';
    $html .= '<span class="price-order">' . $product['price'] . '</span>';
    $html .= '<div class="button"><button type="button" class="Add">Order</button></div>';
    $html .= '</div>';
}

echo $html;
?>