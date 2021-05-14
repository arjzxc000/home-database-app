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
        <div class="center-content">
        
        <form action='add_box_to_database.php' method='post'>
        <?php
            //เลือกชั้นออกมาจาก database
            $sql = "SELECT * FROM floor";
            $result = mysqli_query($conn,$sql);
            echo "<select class='select' name='id_floor'>";
            //เป็นการดึงข้อมูลออกมาจาก query ที่เราได้เลือกเอาไว้
            while($list = mysqli_fetch_array($result)){
                $id_floor = $list['id_floor']; //เลือก list id มาจาก floor
                $floor = $list['floor'];       //เลือก list floor มาจาก floor
                echo"<option value ='$id_floor'>$floor</option>";
                
            }
            echo"<input class='submit_button' type='submit' value='go'>";
            echo'</select>';
            
        
        ?>
        <!--กำลังทำเป็นตารางใน form เอาไว้ส่งให้ add_boxto_database.php-->
        <table align="center">
        <TR>
            <TD width="200"><FONT Face="Cloud Light" size="4" color="#FFFFFF">ชื่อกล่อง</font></TD>
            <TD><INPUT requiured class="input" TYPE="text" NAME="box_name" value=""></TD>
        </TR>
        <TR>
            <TD width="200"><FONT Face="Cloud Light" size="4" color="#FFFFFF">รายละเอียด (ที่อยู่)</font></TD>
            <TD><INPUT requiured class="input" TYPE="text" NAME="box_detail" value=""></TD>
        </TR>
        </form>
        </div>
    </div>
</body>
</html>