<?php
    require_once('connection.php');
    $id_floor = $_POST['id_floor'];
    $box_name = $_POST['box_name'];
    $box_detail = $_POST['box_detail'];
    //add box เพิ่มเข้าไปที่ database
    $sql = "INSERT INTO box(box_name,box_detail,id_floor) VALUES ('$box_name','$box_detail','$id_floor')";
    
    mysqli_query($conn,$sql);
    header("Location: index.php");

?>