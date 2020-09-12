<?php include "condb.php"; ?> <!--เรียกใช้ไฟล์ติดต่อฐานข้อมูล-->
<?php
 $product_id = $_POST["product_id"];
 $product_name = $_POST["product_name"];
 $product_description = $_POST["product_description"];
 $category_id = $_POST ["category_id"];
 $images = $_FILES["images"]["name"];
 $oldproduct_id = $_GET["oldproduct_id"];
 
 $target = "images/".basename($images);
 move_uploaded_file($_FILES["images"]["tmp_name"],$target);
  $sql = "UPDATE products SET 
          product_id='$product_id',
          product_name='$product_name',
          product_description='$product_description',
          images='$images',
          category_id='$category_id'
          WHERE product_id='$oldproduct_id'
";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
header("Location: product_list.php");
?>
