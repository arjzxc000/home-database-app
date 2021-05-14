<?php
    
    require('connection.php');
    session_start(); //เปิด session เพื่อดูว่ามี user login เข้ามาไหม
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }
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
        <form action='search.php' method='post'>
        <a class='active' href="index.php">Home Page</a>
        <a class='active' href="add_box.php">Add box</a>
        <a class='active' href="logout.php">Logout</a>
        <!--กำลังจะส่ง search ไปให้ search.php-->
        <input class=search_input name='search' placeholder='Search'>
        </form>
        </div>
        <div class="left-content">
        <form action = "index.php" method='get'> 
        <?php
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
        </form>
        
        
        <?php
            if(isset($_GET['id_floor'])){
                $id_floor = $_GET['id_floor'];
        ?>
        <?php        
                //เลือกชั้น 1
                if($id_floor =='first'){
                    $sql = "SELECT * FROM box WHERE id_floor = '$id_floor' ORDER BY box_name";
                    $result = mysqli_query($conn,$sql);
                    //ค่อย ๆ echo กล่องออกมาให้ทั้งหมด
                    while($list = mysqli_fetch_array($result)){
                        $box_id = $list['box_id'];
                        $box_name = $list['box_name'];
                        $box_detail = $list['box_detail'];
                        $id_floor = $list['id_floor'];
                        echo"<br><a href='submit_box.php?id_floor=$id_floor&amp;box_id=$box_id&amp;box_name=$box_name'><button class=submit_button>$box_name</button></a>";
                        echo"<a href='edit_box_in_database.php?id_floor=$id_floor&amp;box_id=$box_id&amp;box_name=$box_name&amp;box_detail=$box_detail'><img src='edit_button.jpg' class='edit_button'><br>";
                    }
                }
                //ชั้นที่ 2
                if($id_floor=='second'){
                    $sql = "SELECT * FROM box WHERE id_floor = '$id_floor' ORDER BY box_name";
                    $result = mysqli_query($conn,$sql);
                    //ค่อย ๆ echo box ออกมา
                    while($list = mysqli_fetch_array($result)){
                        $box_id = $list['box_id'];
                        $box_name = $list['box_name'];
                        $box_detail = $list['box_detail'];
                        $id_floor = $list['id_floor'];
                        echo"<br><a href='submit_box.php?id_floor=$id_floor&amp;box_id=$box_id&amp;box_name=$box_name'><button class='submit_button'>$box_name</button></a>";
                        echo"<a href='edit_box_in_database.php?id_floor=$id_floor&amp;box_id=$box_id&amp;box_name=$box_name&amp;box_detail=$box_detail'><img src='edit_button.jpg' class='edit_button'><br>";
                    }
                }
            }
            
            else{
                echo 'Please select floor';
            }
        ?>
        </div>
        <div class="right-content">
        
        </div>
    </div>

</body>
</html>