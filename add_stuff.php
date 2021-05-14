<?php
    require('connection.php');
    $id_floor = $_POST['id_floor'];
    $box_id = $_POST['box_id'];
    $stuff_name = $_POST['stuff_name'];
    $stuff_amount = $_POST['stuff_amount'];
    $detail = $_POST['detail'];
    $box_name = $_POST['box_name'];
    //echo $box_name;
    $sql = "INSERT INTO stuff(stuff_name, stuff_amount,id_floor, detail,box_id)"."
    VALUES ('$stuff_name','$stuff_amount','$id_floor','$detail','$box_id')";
    
    mysqli_query($conn,$sql);
    Header("Location: submit_box.php?id_floor=$id_floor&box_id=$box_id&box_name=$box_name");
?>