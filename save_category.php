<?php include "condb.php"; ?> <!--เรียกใช้ไฟล์ติดต่อฐานข้อมูล-->
<?php
 $category_id = $_POST["category_id"];
 $category_name = $_POST["category_name"];
 $category_description = $_POST["category_description"];
 $oldcategory_id = $_GET["oldcategory_id"];

  $sql = "UPDATE categories SET 
          category_id='$category_id',
          category_name='$category_name',
          category_description='$category_description'
          WHERE category_id='$oldcategory_id'
";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
header("Location: category_list.php");
?>
