<?php 
    session_start();
    include('../config/constants.php');
    if(!isset($_SESSION['user']))
    {
        header('location:'.SITEURL.'admin/login.php');
    }
    //echo "Deete User PAge";
    //GEtting user_id from Users.php PAge
    if(isset($_GET['user_id']))
    {
        $user_id = $_GET['user_id'];
        //Connectng Database
        $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
        
        //Selecting Database
        $db_select = mysqli_select_db($conn,DBNAME);
        
        $query = "DELETE FROM tbl_users WHERE user_id=$user_id";
        
        //Executing Query
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            //echo "Deleted Successfully";
            $_SESSION['delete_success']="User Deleted Successfully";
            header('location:'.SITEURL.'admin/users.php');
        }
        else
        {
            //echo "FAiled to Delete";
            $_SESSION['delete_fail']="FAiled to Delete User";
            header('location:'.SITEURL.'admin/users.php');
        }
    }
    
?>