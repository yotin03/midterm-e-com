<?php include "condb.php"; ?>
<?php 
$product_id = $_GET['product_id'];
$sql = "DELETE FROM products WHERE product_id ='$product_id'";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
header("Location: product_list.php");
?>