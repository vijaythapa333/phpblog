<?php 
    session_start();
    include('../config/constants.php');
    if(!isset($_SESSION['user']))
    {
        header('location:'.SITEURL.'admin/login.php');
    }
    //echo "Deete User PAge";
    //GEtting user_id from Users.php PAge
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];
        //Connectng Database
        $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
        
        //Selecting Database
        $db_select = mysqli_select_db($conn,DBNAME);
        
        $query = "DELETE FROM tbl_categories WHERE category_id=$category_id";
        
        //Executing Query
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            //echo "Deleted Successfully";
            $_SESSION['delete_success']="Category Deleted Successfully";
            header('location:'.SITEURL.'admin/categories.php');
        }
        else
        {
            //echo "FAiled to Delete";
            $_SESSION['delete_fail']="Failed to Delete Category";
            header('location:'.SITEURL.'admin/categories.php');
        }
    }
    else
    {
        echo "Error";
    }
    
?>