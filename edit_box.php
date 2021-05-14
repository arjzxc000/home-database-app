<?php
    require('connection.php');
    $box_id = $_POST['box_id'];
    $id_floor = $_POST['id_floor'];
    $box_name = $_POST['box_name'];
    $box_detail = $_POST['box_detail'];
    //update ค่าคืนไปที่ database
    $sql = "UPDATE box SET box_detail = '$box_detail',box_name = '$box_name' WHERE box_id = '$box_id' AND id_floor = '$id_floor'";
    //UPDATE box SET box_detail = 'อยู่ใกล้ ๆ ทีวี',box_name = 'กล่องฟ้า' WHERE box_id = '1' AND id_floor = 'first'
    mysqli_query($conn,$sql);
    header("Location: index.php?id_floor");
?>