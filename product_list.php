<?php include "condb.php"; ?> <!--เรียกใช้ไฟล์ติดต่อฐานข้อมูล-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'title.php' ?>
</head>
<body>
<center>
<?php
// Create connection
$conn2 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn2) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql2 = "SELECT * FROM categories";
$result2 = mysqli_query($conn2, $sql2);
if (mysqli_num_rows($result2) > 0) {
}
    
?> 
    <h2>เพิ่มสินค้า</h2>
    <!--ฟอร์มรับข้อมูล และส่งข้อมูลไปที่ product_insert.php โดยใช้ เมดธอด post-->
    <form action="product_insert.php" method="post" enctype="multipart/form-data">
        <label for="product_id" >รหัสสินค้า :</label>
        <input type="text" name="product_id" placeholder="p000"required=""><br>
        <br>
        <label for="product_name">ชื่อสินค้า :</label>
        <input type="text" name="product_name" placeholder="name"ชื่อสินค้า=""><br>
        <br>
        <label for="product_description">รายละเอียด :</label>
        <textarea name="product_description" id="" cols="23" rows="5"placeholder="description"required=""></textarea>
        <br>
        <label for="product_name">รูปภาพ :</label>
        <input type="file" name="images"><br>
        <label for="category_id" >ประเภท :</label>
        <select name="category_id">
        <option value="">please select category</option>
    <?php while($row2 = mysqli_fetch_assoc($result2)) { ?>
            <option value="<?php echo $row2["category_id"]; ?>"><?php echo $row2["category_name"]; ?></option>
            <?php  } ?>
</select>

        <br><br>
        <button type="submit">insert</button>
    </form>

    <hr>
        <h2>ตารางแสดงข้อมูลสินค้า</h2>
        <a href="category_list.php"><button>เพิ่มประเภท</button></a> 
        <br><br>
    <!--ตารางแสดงข้อมูล-->
<form action="search_product.php" method="post">
<input type="search" name="keyword">
<input type="submit" value="search">
</form>
<br>
        <table border=1>    
        <!--ส่วนหัวตาราง--> 
            <thead>
                <tr>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>รายละเอียด</th>
                    <th>รหัสประเภท</th>
                    <th>ชื่อประเภท</th>
                    <th>รูปภาพ</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
    <!--เรียกข้อมูลออกมาแสดง-->
    <?php 
    $sql = "SELECT * FROM products INNER JOIN categories on products.category_id = categories.category_id";
    $result = mysqli_query($conn, $sql);
    ?>

    <?php if (mysqli_num_rows($result) > 0) { ?>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
            
            <tbody align=center>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row["product_name"]; ?></td>
                    <td><?php echo $row["product_description"]; ?></td>
                    <td><?php echo $row["category_id"]; ?></td>
                    <td><?php echo $row["category_name"]; ?></td>
                    <td>
                    <?php if($row["images"] <> null) {?>
                    <img src="images/<?php echo $row["images"]; ?>" alt="" width="100" height="100" >
                    <?php } ?>
                    </td>
                   
                    <td><a href='edit_product.php?product_id=<?php echo $row["product_id"];?>'><button>แก้ไข</button></a></td>
                    <td><a href='del_product.php?product_id=<?php echo $row["product_id"];?>'><button>ลบ</button></a></td>
                </tr>
            </tbody>
    
        <?php } ?>
    <?php } 
    else {
        echo "0 results";
      }
    ?>
</table>

<?php  mysqli_close($conn); ?>
<br>
<footer>
<p>116230505087-1 นายโยธิน ตั้งชนะชัยพงษ์ สสค.62-B</p></footer>
        
</body>
</html>