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
$product_id = $_GET["product_id"];

$sql = "SELECT * FROM products WHERE product_id='$product_id'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $row = mysqli_fetch_assoc($result);
  
}
$sql2 = "SELECT * FROM categories";
$result2 = mysqli_query($conn, $sql2); 

if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    //$row = mysqli_fetch_assoc($result);
    
  }
?>

<center>

    <h2>แก้ไขสินค้า</h2>
    <!--ฟอร์มรับข้อมูล และส่งข้อมูลไปที่ product_insert.php โดยใช้ เมดธอด post-->
    <form action="save_product.php?oldproduct_id=<?php echo $row["product_id"];?>" method="post" enctype="multipart/form-data">
        <label for="product_id" >รหัสสินค้า :</label>
        <input type="text" name="product_id" value="<?php echo $row["product_id"];?>"><br>
        <br>
        <label for="product_name">ชื่อสินค้า :</label>
        <input type="text" name="product_name" value="<?php echo $row["product_name"];?>"><br>
        <br>
        <label for="product_description">รายละเอียด :</label>
        <textarea name="product_description" cols="23" rows="5"placeholder="description"required=""><?php echo $row["product_description"];?></textarea>
        <br>
        <label for="product_name">รูปภาพ :</label>
        <input type="file" name="images"><br><br>
        <center><img src="images/<?php echo $row["images"]; ?>" alt="" width="100" height="100" ></center>
        <br>
        <label for="category_id" >ประเภท :</label>
        <select name="category_id">
        <option value="">please select category</option>
        <?php while($row2 = mysqli_fetch_assoc($result2)) { ?>
            <option value="<?php echo $row2["category_id"]; ?>"<?php if($row['category_id']==$row2['category_id']) { echo "selected";}?>><?php echo $row2["category_name"]; ?></option>
            <?php  } ?>
</select>

        <br><br>
        <button type="submit">Edit</button>
        <a href="category_list.php"><button>ย้อนกลับ</button></a>
    </form>

    
<br>
<footer>
<p>116230505087-1 นายโยธิน ตั้งชนะชัยพงษ์ สสค.62-B</p></footer>
        
</body>
</html>