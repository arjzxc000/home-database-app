<?php
    session_start();
    
        if(isset($_POST['username'])){
            require_once('connection.php'); //connection
            //รับค่า username, password
            $username = $_POST['username'];
            $password = $_POST['password'];
            //select username
            $sql = "SELECT * FROM user WHERE username = '$username' ";
            $result=mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            echo $row['username'];
            echo $row['password'];
            
            if($row['username'] = '$username' and $row['password'] = '$password'){
                $_SESSION['username'] = $username;
                header('Location: index.php');
            }
        }

?>