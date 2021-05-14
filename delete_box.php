<?php
    require('connection.php');
    //รับค่ามาจาก edit_box_in_database.php
    $box_id = $_GET['box_id'];
    $box_name = $_GET['box_name'];
    $id_floor = $_GET['id_floor'];
    $box_detail = $_GET['box_detail'];
    echo $box_id,$box_name,$id_floor,$box_detail;
    //กำลังจะลบข้อมูล box ออกจาก database
    $sql = "DELETE FROM box WHERE box_id = '$box_id' AND id_floor = '$id_floor' AND box_name = '$box_name'";
    echo $sql;
    mysqli_query($conn,$sql);
    //กำลังจะลบข้อมูล stuff ที่เกี่ยวข้องกับ box
    $sql1 = "DELETE FROM stuff WHERE box_id = '$box_id' AND id_floor = '$id_floor'";
    echo $sql1;
    mysqli_query($conn,$sql1);
    Header('Location: index.php')
?>