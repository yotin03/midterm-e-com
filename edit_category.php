<?php include "condb.php"; ?> <!--เรียกใช้ไฟล์ติดต่อฐานข้อมูล-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'title.php' ?>
</head>
<body>
    <?php 
    $category_id = $_GET['category_id'];

    $sql = "SELECT * FROM categories WHERE category_id ='$category_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        
      }   
      ?>
      <center>
    <h2>แก้ไขประเภท</h2>
        <form action="save_category.php?oldcategory_id=<?php echo $row["category_id"];?>" method="post">
        <label for="category_id" >รหัสประเภท :</label>
        <input type="text" name="category_id" value="<?php echo $row["category_id"];?>"><br>
        <br>
        <label for="category_name">ชื่อประเภท :</label>
        <input type="text" name="category_name" value="<?php echo $row["category_name"];?>"><br>
        <br>
        <label for="category_description">รายละเอียด :</label>
        <input type="text" name="category_description" value="<?php echo $row["category_description"];?>"><br>
        <br>
        <button type="submit">Edit</button>
        <a href="category_list.php"><button>ย้อนกลับ</button></a>
    </form>
<?php
mysqli_close($conn);
?>
</body>
</html>
