<?php 
    if(isset($_POST['submit']))
    {
        //Connectng Database
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        
        
        //Selecting Database
        $db_select = mysqli_select_db($conn,'db_phpblog');
        
        
        //Getting Values from UI
        echo $full_name = $_POST['full_name'];
        echo $username = $_POST['username'];
        echo $email = $_POST['email'];
        echo $password = $_POST['password'];
    }
?>