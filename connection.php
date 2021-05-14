<?php
    $host = '';
    $username = '';
    $password = '';
    $db = '';
    //crete connection 
    $conn = mysqli_connect($host,$username,$password,$db);
    //try
    if(!$conn){
        die('connection error'.mysqli_connect_error());
    }
?>