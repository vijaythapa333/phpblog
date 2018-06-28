<?php 
    session_start();
    //Getting GET value from URL
    if(isset($_GET['category_id']))
    {
        //echo "Value Passed";
        //Get the Value from URL
        $category_id = $_GET['category_id'];
        //Database Connect
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        
        //Database SElection
        $db_select = mysqli_select_db($conn,'db_phpblog') or die(mysqli_error($conn));
        
        //Query to GEt al the VAlues
        $query = "SELECT * FROM tbl_categories WHERE category_id=$category_id";
        
        //Execute Query
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            //Getting Data from DAtabase
            $row = mysqli_fetch_assoc($res);
            //print_r($row);
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $category_description = $row['category_description'];
            $include_in_menu = $row['include_in_menu'];
            $is_active = $row['is_active'];
        }
    }
    else
    {
        
        //echo "Value Not Passed";
        //REdrect to User Page
        header('location:http://localhost:81/phpblog/admin/categories.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel for Our Blog</title>
        
        <link rel="stylesheet" type="text/css" href="http://localhost:81/phpblog/assets/css/style.css" />
    </head>
    
    <body>
    
    <!-- Menu Starts From Here -->
        <nav>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="users.php">Users</a>
                </li>
                <li>
                    <a href="categories.php">Categories</a>
                </li>
                <li>
                    <a href="blogs.php">Blogs</a>
                </li>
            </ul>
        </nav>
    <!-- Menu Ends From Here -->
        
    <!-- Main Content Starts Here -->
    <section class="main">
        <h1>Update Category Page</h1>
        
        <!-- inserting Category Details -->
        
        <form method="post" action="update_category_action.php">
            <table>
                <tr>
                    <td>Category Title</td>
                    <td><input type="text" name="category_title" value="<?php echo $category_title; ?>" /></td>
                </tr>
                
                <tr>
                    <td>Category Description</td>
                    <td><textarea name="category_description"><?php echo $category_description; ?></textarea></td>
                </tr>
                
                
                <tr>
                    <td>Is Active?</td>
                    <td>
                        <input <?php if($is_active == 1){echo "checked='checked'";} ?> type="radio" name="is_active" value="1" /> Yes
                        <input <?php if($is_active == 0){echo "checked='checked'";} ?> type="radio" name="is_active" value="0" /> No
                    </td>
                </tr>
                
                <tr>
                    <td>Include In Menu?</td>
                    <td>
                        <input <?php if($include_in_menu == 1){echo "checked='checked'";} ?> type="radio" name="include_in_menu" value="1" /> Yes
                        <input <?php if($include_in_menu == 0){echo "checked='checked'";} ?> type="radio" name="include_in_menu" value="0" /> No
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="category_id" value="<?php echo $category_id; ?>" />
                        <input type="submit" name="submit" value="Update Category" />
                    </td>
                </tr>
            </table>
        </form>
        <!-- inserting User Details Ends -->
    </section>
    <!-- Main Content Starts Here -->
        
    <!-- Footer Starts Here -->
    <footer>
        &copy; 2018, PHP BLOG.
    </footer>
    <!-- Footer Starts Here -->
    
    </body>
</html>