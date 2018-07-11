<?php 
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location:http://localhost:81/phpblog/admin/login.php');
    }
    //echo "Deete User PAge";
    //GEtting user_id from Users.php PAge
    if(isset($_GET['blog_id']))
    {
        $blog_id = $_GET['blog_id'];
        //DAtabase Connect
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        
        //Database Selection
        $db_select = mysqli_select_db($conn,'db_phpblog') or die(mysqli_error($conn));
        
        $query = "DELETE FROM tbl_blogs WHERE blog_id=$blog_id";
        
        //Executing Query
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            //echo "Deleted Successfully";
            $_SESSION['delete_success']="Blog Deleted Successfully";
            header('location:http://localhost:81/phpblog/admin/blogs.php');
        }
        else
        {
            //echo "FAiled to Delete";
            $_SESSION['delete_fail']="Failed to Delete Blog";
            header('location:http://localhost:81/phpblog/admin/blogs.php');
        }
    }
    else
    {
        echo "Error";
    }
    
?>