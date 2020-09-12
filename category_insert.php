<?php include "condb.php"; ?>
<?php 
 $category_id = $_POST["category_id"];
 $category_name = $_POST["category_name"];
 $category_description = $_POST["category_description"];
 $img = $_POST["img"];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["img"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

 $sql = "INSERT INTO categories (category_id, category_name, img, category_description)
VALUES ('$category_id', '$category_name', '$img','$category_description')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
header("Location: category_list.php");
?>