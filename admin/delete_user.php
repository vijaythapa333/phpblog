<?php 
    session_start();
    //echo "Deete User PAge";
    //GEtting user_id from Users.php PAge
    if(isset($_GET['user_id']))
    {
        $user_id = $_GET['user_id'];
        //DAtabase Connect
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        
        //Database Selection
        $db_select = mysqli_select_db($conn,'db_phpblog') or die(mysqli_error($conn));
        
        $query = "DELETE FROM tbl_users WHERE user_id=$user_id";
        
        //Executing Query
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            //echo "Deleted Successfully";
            $_SESSION['delete_success']="User Deleted Successfully";
            header('location:http://localhost:81/phpblog/admin/users.php');
        }
        else
        {
            //echo "FAiled to Delete";
            $_SESSION['delete_fail']="FAiled to Delete User";
            header('location:http://localhost:81/phpblog/admin/users.php');
        }
    }
    
?>