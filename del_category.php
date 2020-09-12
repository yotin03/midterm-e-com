<?php include "condb.php"; ?>
<?php 
$category_id = $_GET['category_id'];
$sql = "DELETE FROM categories WHERE category_id ='$category_id'";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
header("Location: category_list.php");
?>