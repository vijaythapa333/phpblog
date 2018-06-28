<?php 
    session_start();
    //echo "Deete User PAge";
    //GEtting user_id from Users.php PAge
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];
        //DAtabase Connect
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        
        //Database Selection
        $db_select = mysqli_select_db($conn,'db_phpblog') or die(mysqli_error($conn));
        
        $query = "DELETE FROM tbl_categories WHERE category_id=$category_id";
        
        //Executing Query
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            //echo "Deleted Successfully";
            $_SESSION['delete_success']="Category Deleted Successfully";
            header('location:http://localhost:81/phpblog/admin/categories.php');
        }
        else
        {
            //echo "FAiled to Delete";
            $_SESSION['delete_fail']="Failed to Delete Category";
            header('location:http://localhost:81/phpblog/admin/categories.php');
        }
    }
    else
    {
        echo "Error";
    }
    
?>