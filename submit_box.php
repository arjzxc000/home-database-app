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
        <div class="header">
        <a class='active' href="index.php">Home Page</a>
        <a class='active' href="add_box.php">Add box</a> 
        <a class='active' href="logout.php">Logout</a>
        </div>
        <div class="left-content">
        <form action = "submit_box.php" method='get'> 
        <a href='index_test.php?choose=first'>กลับไปเลือกชั้น</a><br><br>
        
        <?php
            
            $id_floor = $_GET['id_floor'];
            $sql = "SELECT * FROM box WHERE id_floor = '$id_floor' order by box_name ASC";
            $result = mysqli_query($conn,$sql);
            while($list = mysqli_fetch_array($result)){
                $box_id = $list['box_id'];
                $box_name = $list['box_name'];
                $box_detail = $list['box_detail'];
                $id_floor = $list['id_floor'];
                echo"<a class='boxselected' href='submit_box.php?id_floor=$id_floor&amp;box_id=$box_id&amp;box_name=$box_name'>
                    $box_name
                    </a><br><br>";}
            
        ?>     
        
        
        </div>
        <div class="right-content">
        

        <table class="styled-table">
        <TR>
            <TD bgcolor="#009879"><FONT Face="Cloud" size="4" color="000000">ชื่อ</font></TD>
            <TD bgcolor="#009879"><FONT Face="Cloud" size="4" color="000000">จำนวน</font></TD>
            <TD bgcolor="#009879"><FONT Face="Cloud" size="4" color="000000">รายละเอียด</font></TD>
            <TD bgcolor="#009879"><FONT Face="Cloud" size="4" color="000000">delete</font></TD>
            <TD bgcolor="#009879"><FONT Face="Cloud" size="4" color="000000">edit</font></TD>
        </TR>
        <?php
            //get box_id from index page
            $box_id=$_GET['box_id'];
            $id_floor = $_GET['id_floor'];
            $box_name = $_GET['box_name'];
            echo "<a class='boxselected'>$box_name</a>";
            echo"<a class='boxselected' href='add_stuff_in_box.php?box_id=$box_id&amp;id_floor=$id_floor&amp;box_name=$box_name'>Add item</a>";
            $sql = "SELECT * FROM stuff WHERE box_id = '$box_id' AND id_floor = '$id_floor'";
            $result = mysqli_query($conn,$sql);
            
            while($list = mysqli_fetch_array($result)){
                $stuff_id = $list['stuff_id'];
                $stuff_name = $list['stuff_name'];
                $stuff_amount = $list['stuff_amount'];
                $id_floor = $list['id_floor'];
                $detail = $list['detail'];
                $box_id = $list['box_id'];
            echo "<br>
            <TR>
            <TD>$stuff_name</TD>
            <TD>$stuff_amount</TD>
            <TD>$detail</TD>
            <TD><a href='delete_stuff.php?stuff_id=$stuff_id&amp;id_floor=$id_floor&amp;box_id=$box_id&amp;box_name=$box_name'><img src='delete_button.jpg' class='edit_button'></TD>
            <TD><a href='edit_stuff_in_box.php?stuff_id=$stuff_id&amp;id_floor=$id_floor&amp;box_id=$box_id&amp;box_name=$box_name'><img src='edit_button.jpg' class='edit_button'></TD>
            </TR>
            ";
            
            }
            if(mysqli_num_rows($result)==0){
                echo 'No stuff in the box';
            }
            
        ?>
        
        </div>
    </div>
</body>
</html>