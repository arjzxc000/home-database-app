<?php
    require('connection.php');
    //รับค่ามาจาก submit_box.php
    $stuff_id = $_GET['stuff_id'];
    $id_floor = $_GET['id_floor'];
    $box_id = $_GET['box_id'];
    $box_name = $_GET['box_name'];
    //กำลังจะลบข้อมูล
    $sql = "DELETE FROM stuff WHERE stuff_id = '$stuff_id' AND id_floor = '$id_floor'";
    mysqli_query($conn,$sql);
    
    Header("Location: submit_box.php?id_floor=$id_floor&box_id=$box_id&box_name=$box_name.php")
?>