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
        <?php
        $box_id = $_GET['box_id'];
        $box_name = $_GET['box_name'];
        $id_floor = $_GET['id_floor'];
        $box_detail = $_GET['box_detail'];

        ?>
        <form action = 'edit_box.php' method='POST'>
        <INPUT TYPE="hidden" NAME="id_floor" value="<?php echo $id_floor;?>">
        <INPUT TYPE="hidden" NAME="box_id" value="<?php echo $box_id;?>">
        
        <table align="center">
        <TR>
            <TD width="200"><FONT Face="Cloud Light" size="5" color="#FFFFFF">ชื่อ</font></TD>
            <TD><INPUT class="input" TYPE="text" NAME="box_name" value="<?php echo $box_name;?>"></TD>
        </TR>
        <TR>
            <TD width="200"><FONT Face="Cloud Light" size="5" color="#FFFFFF">รายละเอียด</font></TD>
            <TD><INPUT class="input" TYPE="text" NAME="box_detail" value="<?php echo $box_detail;?>"></TD>
        </TR>
        <tr>
        <td></td>
        <td><input class='submit_button' type='submit' value='edit'></td>
        </tr>
        </table>
        </form>
        <br>
        <?php
            echo "<a class='delete_button' href='delete_box.php?id_floor=$id_floor&amp;box_id=$box_id&amp;box_name=$box_name&amp;box_detail=$box_detail'>delete box</a>"
        ?>
        
        
        </form>
        </div>
    </div>
</body>
</html>