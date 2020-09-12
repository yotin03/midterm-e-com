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
    <h2>เพิ่มประเภท</h2>
    <!--ฟอร์มรับข้อมูล และส่งข้อมูลไปที่ category_insert.php โดยใช้ เมดธอด post-->
    <form action="category_insert.php" method="post">
        <label for="category_id" >รหัสประเภท :</label>
        <input type="text" name="category_id" placeholder="C000"required=""><br>
        <br>
        <label for="category_name">ชื่อประเภท :</label>
        <input type="text" name="category_name" placeholder="ชื่อ"required=""><br>
        <br>
        <label for="category_description">รายละเอียด :</label>
        <input type="text" name="category_description" placeholder="รายละเอียด"required=""><br>
        <br>
        <button type="submit">insert</button>
    </form>
    <hr>
        <h2>ตารางแสดงข้อมูลประเภท</h2>
    <a href="product_list.php"><button>เพิ่มสินค้า</button></a> 
    <br><br>
    <!--ตารางแสดงข้อมูล-->
<form action="search_category.php" method="post">
<input type="search" name="keyword">
<input type="submit" value="search">
<br><br>
</form>
        <table border=1>    
        <!--ส่วนหัวตาราง--> 
            <thead>
                <tr>
                    <th>รหัสประเภท</th>
                    <th>ชื่อประเภท</th>
                    <th>รายละเอียด</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
    <!--เรียกข้อมูลออกมาแสดง-->
    <?php 
    $sql = "SELECT category_id, category_name, category_description FROM categories";
    $result = mysqli_query($conn, $sql);
    ?>

    <?php if (mysqli_num_rows($result) > 0) { ?>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
            
            <tbody>
                <tr>
                    <td><?php echo $row["category_id"]; ?></td>
                    <td><?php echo $row["category_name"]; ?></td>
                    <td><?php echo $row["category_description"]; ?></td>
                    <td><a href='edit_category.php?category_id=<?php echo $row["category_id"];?>'><button>แก้ไข</button></a></td>
                    <td><a href='del_category.php?category_id=<?php echo $row["category_id"];?>'><button>ลบ</button></a></td>
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