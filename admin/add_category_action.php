<?php 
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location:http://localhost:81/phpblog/admin/login.php');
    }
    //echo "Add Category Action page";
    //Check Whether the Submit Button is Clicked or Not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Getting VAlue from Add CAtegory Form
        $category_title = $_POST['category_title'];
        $category_description = $_POST['category_description'];
        
        if(isset($_POST['is_active']))
        {
            $is_active = $_POST['is_active'];
        }
        else
        {
            $is_active = 0;
        }
        
        if(isset($_POST['include_in_menu']))
        {
            $include_in_menu = $_POST['include_in_menu'];
        }
        else
        {
            $include_in_menu = 0;
        }
        $created_at = date('Y-m-d H:i:s');
        
        //Database Connection
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        //DAtabase Selection
        $db_select = mysqli_select_db($conn,'db_phpblog') or die(mysqli_error($conn));
        
        //Query to Insert Category
        $query = "INSERT INTO tbl_categories SET 
        category_title = '$category_title',
        category_description = '$category_description',
        is_active = '$is_active',
        include_in_menu = '$include_in_menu',
        created_at = '$created_at'
        ";
        //Executing Query
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            //echo "Category Added Successfully";
            $_SESSION['add_success'] = "Category Added Successfully";
            header('location:http://localhost:81/phpblog/admin/categories.php');
        }
        else
        {
            //echo "Failed to add Category";
            $_SESSION['add_fail'] = "FAiled to Add CAtegory";
            header('location:http://localhost:81/phpblog/admin/add_category.php');
        }
        
    }
    else
    {
        //echo "Button Not Clicked";
        //Redirect to Categories Page
        header('location:http://localhost:81/phpblog/admin/categories.php');
    }
?>