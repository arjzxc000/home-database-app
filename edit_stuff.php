<?php
    require('connection.php');
    $stuff_id = $_POST['stuff_id'];
    $stuff_name = $_POST['stuff_name'];
    $stuff_amount = $_POST['stuff_amount'];
    $detail = $_POST['detail'];
    $box_id = $_POST['box_id'];
    $id_floor = $_POST['id_floor'];
    $box_name = $_POST['box_name'];
    
    $sql = "UPDATE stuff SET stuff_name = '$stuff_name',stuff_amount = '$stuff_amount',detail = '$detail' WHERE stuff_id = '$stuff_id' AND box_id = '$box_id'";
    mysqli_query($conn,$sql);
    //submit_box.php?id_floor=first&box_id=1&box_name=box2
    //ให้ส่งกลับไปที่หน้าที่มีรายละเอียดของกล่องทั้งหมด จาก submit_box.php
    Header("Location: submit_box.php?id_floor=$id_floor&box_id=$box_id&box_name=$box_name");
?>