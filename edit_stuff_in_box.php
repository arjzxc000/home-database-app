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
        $id_floor = $_GET['id_floor'];
        $box_id = $_GET['box_id'];
        $stuff_id = $_GET['stuff_id'];
        $box_name = $_GET['box_name'];
        $sql = "SELECT * FROM stuff WHERE id_floor = '$id_floor' AND box_id = '$box_id' AND stuff_id = '$stuff_id'";
        $result = mysqli_query($conn,$sql);
        $list = mysqli_fetch_array($result);
        $stuff_id = $list['stuff_id'];
        $stuff_name = $list['stuff_name'];
        $stuff_amount = $list['stuff_amount'];
        $id_floor = $list['id_floor'];
        $detail = $list['detail'];
        $box_id = $list['box_id'];
        ?>
        <form action = 'edit_stuff.php' method='POST'>
        <INPUT TYPE="hidden" NAME="stuff_id" value="<?php echo $stuff_id;?>">
        <INPUT TYPE="hidden" NAME="id_floor" value="<?php echo $id_floor;?>">
        <INPUT TYPE="hidden" NAME="box_id" value="<?php echo $box_id;?>">
        <INPUT TYPE="hidden" NAME="box_name" value="<?php echo $box_name;?>">
        
        <table align="center">
        <TR>
            <TD width="200"><FONT Face="Cloud Light" size="5" color="#FFFFFF">ชื่อ</font></TD>
            <TD><INPUT class="input" TYPE="text" NAME="stuff_name" value="<?php echo $stuff_name;?>"></TD>
        </TR>
        <TR>
            <TD width="200"><FONT Face="Cloud Light" size="5" color="#FFFFFF">จำนวน</font></TD>
            <TD><INPUT class="input" TYPE="text" NAME="stuff_amount" value="<?php echo $stuff_amount;?>"></TD>
        </TR>
        <TR>
            <TD width="200"><FONT Face="Cloud Light" size="5" color="#FFFFFF">รายละเอียด</font></TD>
            <TD><INPUT class="input" TYPE="text" NAME="detail" value="<?php echo $detail;?>"></TD>
        </TR>
        <tr>
        <td></td>
        <td><input class='submit_button' type='submit' value='edit'></td>
        </tr>
        </table>
        </form>
        </div>
    </div>
</body>
</html>