<?php
    
    require('connection.php');
    /*session_start(); //เปิด session เพื่อดูว่ามี user login เข้ามาไหม
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>44/77 Database</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header"><form action='search.php' method='post'>
        <a class='active' href="index.php">Home Page</a>
        <a class='active' href="add_box.php">Add box</a>
        <a class='active' href="logout.php">Logout</a>
        
        <input class=search_input name='search' placeholder='Search' value="<?php
            //ถ้า search ไว้ก่อนอยู่แล้วจะตั้งให้ที่ search_input มีค่าเป็น search
            if(isset($_POST['search'])){
                $search = mysqli_real_escape_string($conn,$_POST['search']); echo $search;}?>">
        </form>
        </div>
        <div class="center-content">
        
        <form action = 'add_stuff.php' method='POST'>
        <table class="styled-table">
        <TR>
            <TD bgcolor="#009879"><FONT Face="Cloud" size="4" color="000000">ชื่อ</font></TD>
            <TD bgcolor="#009879"><FONT Face="Cloud" size="4" color="000000">จำนวน</font></TD>
            <TD bgcolor="#009879"><FONT Face="Cloud" size="4" color="000000">รายละเอียดของ</font></TD>
            <TD bgcolor="#009879"><FONT Face="Cloud" size="4" color="000000">กล่อง</font></TD>
            <TD bgcolor="#009879"><FONT Face="Cloud" size="4" color="000000">รายละเอียดกล่อง</font></TD>
        </TR>
        <?php
            if(isset($_POST['search'])){
                $search = mysqli_real_escape_string($conn,$_POST['search']);
                //เลือกตารางข้อมูลมาจาก 
                $sql = "SELECT * FROM stuff WHERE stuff_name LIKE '%$search%' OR stuff_amount LIKE '%$search%' OR detail LIKE '%$search%'";
                $result = mysqli_query($conn,$sql);
                //echo $sql;
                while($list = mysqli_fetch_array($result)){
                    $stuff_name = $list['stuff_name'];
                    $stuff_amount = $list['stuff_amount'];
                    $detail = $list['detail'];
                    $box_id = $list['box_id'];
                    //echo $box_id;
                    $sql1 = "SELECT * FROM box WHERE box_id='$box_id'";
                    
                    $result1 = mysqli_query($conn,$sql1);
                    while($list1 = mysqli_fetch_array($result1)){
                        $box_detail = $list1['box_detail'];
                    echo "<br>
                    <TR>
                    <TD>$stuff_name</TD>
                    <TD>$stuff_amount</TD>
                    <TD>$detail</TD>
                    <TD>$box_id</TD>
                    <TD>$box_detail</TD>";
                    }
                    
                }
                if(mysqli_num_rows($result)==0){
                    echo 'No stuff match your result';
                }
            }
            
        ?>
        </table>
        </form>
        </div>
    </div>
</body>
</html>