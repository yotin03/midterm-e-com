<?php include "condb.php"; ?> <!--เรียกใช้ไฟล์ติดต่อฐานข้อมูล-->

<?php 
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_description = $_POST["product_description"];
    $category_id = $_POST["category_id"];
    $images = $_FILES["images"]["name"];
    //เลือกรูปภาพ
    if($_FILES["images"] <> null)
    {
        
        $sql = "INSERT INTO products (product_id, product_name, product_description, category_id, images)
        VALUES ('$product_id', '$product_name', '$product_description', '$category_id', '$images')";

    $target = "images/".basename($images);
    move_uploaded_file($_FILES["images"]["tmp_name"],$target);
    }
    else 
    {
    $sql = "INSERT INTO products (product_id, product_name, product_description, category_id)
    VALUES ('$product_id', '$product_name', '$product_description', '$category_id')";
    }
    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: product_list.php");
?>

