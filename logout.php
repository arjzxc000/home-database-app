<?php
session_start(); // เปิด
session_destroy(); // close session
header("Location: login.php ");	
?>