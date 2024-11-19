<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tgs_inventory';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $productname = $_POST['productname'];
  $price = $_POST['price'];
  $category = $_POST['category'];

  if($_FILES["image"]["error"] == 4){
    echo "<script>alert('Image Does Not Exist');</script>";
  } else {
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo "<script>alert('Invalid Image Extension');</script>";
    } else if($fileSize > 1000000){
      echo "<script>alert('Image Size Is Too Large');</script>";
    } else {
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      $uploadFolder = 'img/';
      if (!is_dir($uploadFolder)) {
        mkdir($uploadFolder, 0777, true);
      }

      if (move_uploaded_file($tmpName, $uploadFolder . $newImageName)) {
        $stmt = $conn->prepare("INSERT INTO product (product_name, image, price, category) VALUES (:productname, :image, :price, :category)");
        $stmt->bindParam(':productname', $productname);
        $stmt->bindParam(':image', $newImageName);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);
        $stmt->execute();

        echo "<script>alert('Successfully Added'); document.location.href = 'addproduct.php';</script>";
      } else {
        echo "<script>alert('Failed to upload image');</script>";
      }
    }
  }
}
?>