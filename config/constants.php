<?php 
    define('LOCALHOST','localhost');
    define('USERNAME','root');
    define('PASSWORD','');
    define('DBNAME','db_asmtblog');
    define('SITEURL','http://localhost:81/asmtblog/');
    
    //Database Connection
    $conn = mysqli_connect(LOCALHOST, USERNAME, PASSWORD) or die(mysqli_error());
    //Database Selection
    $db_select = mysqli_select_db($conn, DBNAME) or die(mysqli_error($conn));
?>